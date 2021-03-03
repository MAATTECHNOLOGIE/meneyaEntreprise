<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\Model\clients;
use App\Model\sms;
use App\Model\interesse;
use App\Model\sms_has_interesse;


class p_CampMarkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    // Formulaire pour créer une campagne marketing
    public function CampgNew()
    {
        //Sender
         $setting = DB::table('settings')->where('cle','=','sender')->get();
         for ($i=0; $i < count($setting); $i++) { 
           $sender = $setting[$i]->valeur;
         }

         return view('pages.principale.marketing.p_campNew')
                ->with('sender',$sender);
    }

    // Envoie de SMS
    public function smsPro(Request $request)
    {
        // Récupération des données
         $lien = env('FILE_STORAGE_LINK_OFFLINE');
         $sender  = $request->sender;
         $photo   = $request->file('photo');
         $titre   = $request->titre;
         $prix    = $request->prix;
         $prixold = $request->prixold;
         $liv     = $request->liv;
         $descrp  = $request->descrp;
         $smsPr   = $request->smsPr;
         $date = date('d/m/Y');

        // Traitement des données
         $path = $photo->store('Product','public');
         $photoF = $lien.$path;

        // Save dans la table sms
         $data = ['datesms'=>$date,
                  'titre'  =>$titre,
                  'descrpt'=>$descrp,
                  'prix'   =>$prix,
                  'prixold'=>$prixold,
                  'liv'    =>$liv,
                  'msg'    =>$smsPr,
                  'img'    =>$photoF,
                 ];
         $product = sms::create($data);
         $idProduct = $product->id;

        // Liens de partages
         $shareLink = env('APP_URL').'/camp?id='.$idProduct;
         $MsgF = $smsPr.'.cliquez sur '.$shareLink." pour voir";

        // Lecture des numéros clients et envoie du message
         $clients = clients::all();
         for ($i=0; $i < count($clients); $i++) { 
            $tel = $clients[$i]->contact;
            Sendsms($MsgF,$tel,$sender);

         }

        // Rédirection
         return redirect('/dashboard');


    }

    // Formulaire pour l'historique des campagnes
    public function CampgList()
    {
        $smsAll = sms::all();
        $shareL = '/camp?id=';
        return view('pages.principale.marketing.p_campList')
                ->with('smsL',$smsAll)
                ->with('shareL',$shareL);
    }

    // Fonction d'envoie de SMS unique
    public function sendUniqSMS(Request $request)
    {
        // Filtrer le messages
         $nvMsg = str_replace('à','a', $request->msg);
         $nvMsg = str_replace('á','a', $nvMsg);
         $nvMsg = str_replace('â','a', $nvMsg);
         $nvMsg = str_replace('ç','c', $nvMsg);
         $nvMsg = str_replace('è','e', $nvMsg);
         $nvMsg = str_replace('é','e', $nvMsg);
         $nvMsg = str_replace('ê','e', $nvMsg);
         $nvMsg = str_replace('ë','e', $nvMsg);
         $nvMsg = str_replace('ù','u', $nvMsg);
         $nvMsg = str_replace('ù','u', $nvMsg);
         $nvMsg = str_replace('ü','u', $nvMsg);
         $nvMsg = str_replace('û','u', $nvMsg);
         $nvMsg = str_replace('ô','o', $nvMsg);
         $nvMsg = str_replace('î','i', $nvMsg);

         $curl = curl_init();
         $datas = [
            "email"=>"kouame.ngues123@gmail.com",
            "secret"=>"j7XAYrsp0IXhV@ddZ8ORdZFMRZro*xcDGXkVJDVG",
            "message"=>$nvMsg,
            "receiver"=>$request->telPrf.$request->phone,
            "sender"=>'Meneya',
            "cltmsgid"=>"1"
         ];
         curl_setopt_array($curl, array(
           CURLOPT_URL => "www.letexto.com/sendCampaign",
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_ENCODING => "",
           CURLOPT_MAXREDIRS => 10,
           CURLOPT_TIMEOUT => 0,
           CURLOPT_FOLLOWLOCATION => true,
           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
           CURLOPT_CUSTOMREQUEST => "POST",
           CURLOPT_POSTFIELDS =>json_encode($datas),
           CURLOPT_HTTPHEADER => array(
             "Content-Type: application/json",
            ),
         ));
         $response = curl_exec($curl);
         curl_close($curl);
         echo $response;

        // Enregistrer un message
         $codesms = rand(5,100).'sms';
         $dataP  = [ 'codeSMS'  => $codesms,
                     'msg'      => $request->msg,
                     'dateSend' => date("d/m/yy")
                   ];
          sms::create($dataP);

    }

    // Campagne marketing SMS Groupée aux clients
    public function sendNSMS(Request $request)
    {
        // Réception des données
         $smsPn = $request->smsPn;
         $sender = $request->sender;

        // Filtre des clients
         $clients = DB::table('clients')->where('statutClt', '1')->get();
         for ($i=0; $i < count($clients) ; $i++) { 
             Sendsms($smsPn,$clients[$i]->contact,$sender);
         }

    }

    // Vider l'historique sms
    public function emptySMS(Request $request)
    {
      sms_has_interesse::where('sms_id','=',$request->idsms)->delete();
      sms::where('id','=',$request->idsms)->delete();
    }

    // Livrer une commande
    public function ComdLiv(Request $request)
    {
        // Réception des données
         $smsId   = $request->SMSID;
         $interID = $request->idInters;
         $etat    = 1;
        // Traitemente des données
         sms_has_interesse::where('sms_id','=',$smsId)
                        ->where('interesse_id','=',$interID)
                        ->update(['etat'=>$etat]);
         echo "Commandes livrées avec succès";
    }

    // Supprimer toutes les commandes
    public function p_DelCdAll(Request $request)
    {
        // Réception des données
         $action = $request->action;
         $new = 0;
         $livr = 1;
        // Traitement des données
         if ($action=='new') {
            sms_has_interesse::where('etat','=',$new)->delete();
         }else{
            sms_has_interesse::where('etat','=',$livr)->delete();
         }
         echo "Supprimer avec succès";
    }

    // Détails d'une commande
     public function comdShow(Request $request)
     {
         
        // Réception des données
         $idInters = $request->idInters;
         $SMSID    = $request->SMSID;

        // Traitement des données
         $comd = DB::table('sms_has_interesses')
                ->join('sms','sms_has_interesses.sms_id','=','sms.id')
                ->join('interesses','sms_has_interesses.interesse_id','=','interesses.id')
                ->select('sms.*','interesses.*','sms_has_interesses.*','sms.id as SMSID','interesses.id as InterID')
                ->where('sms.id','=',$SMSID)
                ->where('interesses.id','=',$idInters)
                ->get();
               // dd($comd);
        // Résultat du traitement
         foreach ($comd as $value) {
            if ($value->liv==null) {
                $liv = 0;
            }else{
                $liv= $value->liv;
            }
           echo '
           <div class="row">
                
                <div class="col-lg-12">
                    <h5>Produit: '.$value->titre.'</h5>

                    <a class="fs--1 mb-2 d-block text-warning" href="#!"><b>
                    Code commande: '.$value->code.'</b></a>

                    <a class="fs--1 mb-2 d-block text-dark" href="#!">
                    Qte commandé: '.$value->qte.'</a>

                    <a class="fs--1 mb-2 d-block text-dark" href="#!">
                    Prix promo: '.$value->prix.' '.getMyDevise().'</a>

                    <a class="fs--1 mb-2 d-block text-dark" href="#!">
                    Prix ancien:<del class="mr-1"> '.$value->prixold.' '.getMyDevise().'</del>
                    </a>
                    
                    
                    <a class="fs--1 mb-2 d-block text-dark" href="#!">
                     Livraison: '.$liv.' '.getMyDevise().'</a>

                    <a class="fs--1 mb-2 d-block text-dark" href="#!">
                    Montant: '.$value->montant.' '.getMyDevise().'</a>

                    <p class="fs--1">'.$value->descrpt.'</p>
                    --------------------------------------------------
                </div>
              </div>
            ';
         }


     }

    // Suppression d'une nouvelle commande
    public function ComdDel(Request $request)
    {
        // Réception des données
         $smsId   = $request->SMSID;
         $interID = $request->idInters;
        // Traitement des données
         sms_has_interesse::where('interesse_id','=',$interID ,'AND','sms_id','=',$smsId)->delete();
         echo "Supprimer avec succès";
    }

    // Nouvelle des commandes
    public function CommdNew()
    {
        $comd = DB::table('sms_has_interesses')
                ->join('sms','sms_has_interesses.sms_id','=','sms.id')
                ->join('interesses','sms_has_interesses.interesse_id','=','interesses.id')
                ->select('sms.*','interesses.*','sms_has_interesses.*','sms.id as SMSID','interesses.id as InterID')
                ->where('sms_has_interesses.etat','=',0)
                ->get();
        $nbt = count($comd);
        return view('pages.principale.marketing.commd')
               ->with('comd',$comd)
               ->with('nbt',$nbt);
    }

    // Commandes livrées
    public function CommdLvr()
    {
        $comd = DB::table('sms_has_interesses')
                ->join('sms','sms_has_interesses.sms_id','=','sms.id')
                ->join('interesses','sms_has_interesses.interesse_id','=','interesses.id')
                ->select('sms.*','interesses.*','sms_has_interesses.*','sms.id as SMSID','interesses.id as InterID')
                ->where('sms_has_interesses.etat','=',1)
                ->get();
        $nbt = count($comd);
        return view('pages.principale.marketing.commLivr')
               ->with('comd',$comd)
               ->with('nbt',$nbt);
       
    }



    

}
