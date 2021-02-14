<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\clients;
use App\Model\besoins;
use App\Model\clients_has_besoins;
use App\Model\sms_prospect;
use App\Model\prospects_has_sms;
use Validator;
use DB;

class p_prospController extends Controller
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

    public function p_prospNew()
    {
        return view('pages.principale.Prospects.new');
    }

    public function p_prospStat()
    {
        return view('pages.principale.Prospects.stats');
    }

    public function p_prstBesoin()
    {
        $BespL = DB::table('besoins')->latest()->get();
        return view('pages.principale.Prospects.besoins')->with('BespL',$BespL);
    }

    public function p_DelPB(Request $request){
        besoins::where('id','=',$request->idP)->delete();
    }

    public function p_PrUpdB(Request $request){
        // Lecture des besoins en fonction de l'id
         $BesOL = besoins::where('id','=',$request->idp)->get();
         $output = '';
         for ($i=0; $i < count($BesOL) ; $i++){
            $output.='
                <div class="form-group">
                 <label for="name">Nom</label>
                 <input class="form-control" id="nom" type="text" 
                 value="'.$BesOL[$i]->nom.'">
                </div>
                <input type="hidden" id="IdOp" value="'.$BesOL[$i]->id.'">
            ';
          }
          return $output;
    }

    public function prosBUp(Request $request)
    {
     $besoins = besoins::find($request->IdP)->update(['nom'  => $request->nom]);
    }

    public function p_besAdd(Request $request)
    {
     $codeB = rand().'bes';
     $dataB = ['nom'=>$request->besN,'Code'=>$codeB];
     besoins::create($dataB);
    }

    // Analyse statistique des besoins
    public function statBes(Request $request)
    {
        $dateBP  = $request->dateS;
        $periode = explode(" to ", $dateBP);
        $debut   = $periode[0];
        $fin     = $periode[1];
       /* dd($debut);*/
        /*dd($fin);*/

        // Selection distincte
        $re = DB::table('clients_has_besoins')
                ->whereBetween('dateD', [$debut, $fin])
                ->get();
        
        $besSta = $re->unique(['besoins_id']);
        // Nombre de besoins
        $nb = $re->countBy('besoins_id');
        // Ordre décroissant
        $besOrd = $nb->sortDesc();
        $output ='';
        $output.='<div class="card-deck">';
        $bes = $besOrd->keys();
        // Les trois premiers produits les plus demandés
         $output.='<div class="card-deck">';
            $bes = $besOrd->keys();
            /*for ($i=0; $i <3 ; $i++) 
            { 
              $id = (int)$bes[$i];
              $dataBes = besoins::find($id);
              $output.='
                    <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
                      <div class="bg-holder bg-card" 
                       style="background-image:url(assets/img/illustrations/corner-1.png);">
                      </div>
                      <div class="card-body position-relative">
                        <h6>'.$dataBes->nom.'<span class="badge badge-soft-warning rounded-capsule ml-2">60%</span></h6>
                        <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-warning">'.$besOrd[$bes[$i]].'Pers</div>
                        <a class="font-weight-semi-bold fs--1 text-nowrap ReSMS" href="#!" id="'.$dataBes->id.'">Relance SMS
                         <span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span>
                        </a>
                      </div>
                    </div>
                ';
            }*/
           $output.='</div>';
           $output.='
            <div class="col-lg-12 pl-lg-2 mb-3">
              <div class="card h-lg-100 overflow-hidden">
                <div class="card-body p-0">
                  <table class="table table-dashboard mb-0 table-borderless fs--1">
                    <thead class="bg-light">
                      <tr class="text-900">
                        <th>Autres produits demandés</th>
                        <th class="text-right">Nb prospects</th>
                        <th class="pr-card text-right ReSMS" style="width: 8rem">Relance SMS</th>
                      </tr>
                    </thead>
                    <tbody>';
            for ($i=0; $i < count($besOrd) ; $i++) 
            { 
                $id = (int)$bes[$i];
                $dataBes = besoins::find($id);

                $output.='
                    <tr class="border-bottom border-200">
                        <td>
                          <div class="media align-items-center position-relative">
                          <img class="rounded border border-200" src="assets/img/illustrations/falcon.png" width="60" alt="" />
                            <div class="media-body ml-3">
                              <h6 class="mb-1 font-weight-semi-bold">
                              <a class="text-dark stretched-link" href="#!">
                               '.$dataBes->nom.'</a></h6>
                              <p class="font-weight-semi-bold mb-0 text-500">Attirer</p>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-right font-weight-semi-bold">
                         '.$besOrd[$bes[$i]].'
                        </td>
                        <td class="align-middle pr-card">
                          <a class="font-weight-semi-bold fs--1 text-nowrap ReSMS" href="#!" id="'.$dataBes->id.'">Relance SMS
                          <span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
                        </td>
                    </tr>
                ';
            }
            $output.='
                    </tbody>
                  </table>
                </div>
                <div class="card-footer bg-light py-2">
                </div>
              </div>
            </div>';

        
         return $output;

    }

    // Analyse statistiques Relance SMS
     public function ReProsSMS(Request $request){
        
        // Réception des données
         $IdBesP = $request->IdBesP;
         $msg    = $request->msg;
         $SendID = $request->SendID;
         $DatePB = $request->DatePB;

        // Traitement des données
         $periode = explode(" to ", $DatePB);
         $debut   = $periode[0];
         $fin     = $periode[1];

        // Jointure prospect-besoins propsects
         $prospL = DB::table('prospe_besoins')
            ->join('prospects','prospects.id','=','prospe_besoins.codProsp')
            ->select('prospects.*', 'prospects.tel', 'prospects.nom')
            ->where('prospe_besoins.CodBesoins','=',$IdBesP)
            ->whereBetween('dateD', [$debut, $fin])
            ->get();

         for ($i=0; $i < count($prospL) ; $i++) { 
             $this->sendSMS($msg,$prospL[$i]->tel,$SendID);
         }
        
     }  

    public function p_RelSMS(Request $request)
    {

        // Jointure prospect_sms - prospect
         /*$prospL = DB::table('prospects_has_sms')
            ->join('prospects','prospects.id','=','prospects_has_sms.prospects_idprospects')
            ->join('sms_prospect','sms_prospect.id','=','prospects_has_sms.SMS_idSMS')
            ->select('prospects.*', 'prospects.tel', 'prospects.nom')
            ->get();*/

        return view('pages.principale.Prospects.relSMS');
    }

     
    protected function ControlData(array $data)
    {
        //Control  des données envoyées
        return Validator::make($data,['phone' => 'required']);
    }

    public function p_AddPros(Request $request)
    {
        // Validation
         $validation = $this->ControlData($request->all())->validate();

        //Ajout
          $stat = 0;
          $lieu = 'lieu';
          $matP   = rand(5,1000).'PR';
          $dataP  = ['nom'      => $request->nom,
                     'contact'  => $request->pref.$request->phone,
                     'date'     => date("d/m/yy"),
                     'mail'     => $request->email,
                     'statutClt'=> $stat,
                     'lieu'     => $lieu,
                     'CodeMat'  => $matP
                   ];

          clients::create($dataP);


        // Retour json
         return response()->json(); 
    }

    public function p_prospL(Request $request)
    {
        $prospL = DB::table('clients')->where('statutClt','=',0)->latest()->get();
        $BesExs  = besoins::all();
        //dd($prospL);
        return view('pages.principale.Prospects.list')->with('prospL',$prospL)
                                                      ->with('BesExs',$BesExs);
    }

    public function p_DelP(Request $request)
    {
        clients::where('id','=',$request->idP)->delete();
        clients_has_besoins::where('clients_id','=',$request->idP)->delete();
    }

    public function p_PrUpd(Request $request)
    {
        // Lecture des opérateurs en fonction de l'id
         $prosL = clients::where('id','=',$request->idp)->get();
         $output = '';

         for ($i=0; $i < count($prosL) ; $i++){
            $output.='
                <div class="form-group">
                 <label for="name">Nom</label>
                 <input class="form-control" id="nom" type="text" 
                 value="'.$prosL[$i]->nom.'">
                </div>

                <div class="form-group">
                 <label for="name">Téléphone</label>
                 <input class="form-control" id="phone" type="number" 
                 value="'.$prosL[$i]->contact.'">
                </div>

                <div class="form-group">
                 <label for="name">Email</label>
                 <input class="form-control" id="email" type="email" 
                 value="'.$prosL[$i]->mail.'">
                </div>
                <input type="hidden" id="IdOp" value="'.$prosL[$i]->id.'">
            ';
         }
         return $output;
    }

    public function prosUp(Request $request)
    {
       clients::where('id','=',$request->IdP)
              ->update(['nom'     => $request->nom,
                        'contact' => $request->phone,
                        'mail'    => $request->email ]);
    }

    public function p_PrBes(Request $request){

        //Lecture des besoins du prospects
         $BesL = DB::table('clients_has_besoins')
            ->join('besoins', 'besoins.id', '=', 'clients_has_besoins.besoins_id')
            ->select('besoins.*')
            ->where('clients_has_besoins.clients_id','=',$request->idp)
            ->get();
        
        $output='';

        for ($i=0; $i < count($BesL) ; $i++) {

           
            $output.='
             <li class="list-group-item d-flex justify-content-between align-items-center">'.$BesL[$i]->nom.'</li>
            ';
        }

        $output.='<input type="hidden" id="Idprosp" value="'.$request->idp.'"/>';

        return $output;
    }

    public function p_besoL(Request $request)
    {
        $NewBes = $request->besN;
        $AncBes = $request->besAc;
        $IdPors = $request->Idpro;

        if ($NewBes!='' && $AncBes!='no') {
        
            // Enregistrer le nouveau
             $codeB = rand().'bes';
             $dataB = ['nom'=>$NewBes,'code'=>$codeB,'details'=>'besoins clients','image'=>'image'];
             $idB = besoins::create($dataB);

            // Besoins-Prospect
             $dataPB = ['clients_id'=>$IdPors,'besoins_id'=>$idB->id,'dateD'=> date('d/m/yy')];
             clients_has_besoins::create($dataPB);

            // Lecture Besoins-Prospect
             $BesL = DB::table('clients_has_besoins')
                    ->join('besoins', 'besoins.id', '=', 'clients_has_besoins.besoins_id')
                    ->select('besoins.*')
                    ->where('clients_has_besoins.clients_id','=',$request->Idpro)
                    ->get();
             $output='';
             for ($i=0; $i < count($BesL) ; $i++) {
              $output.='<li class="list-group-item d-flex justify-content-between align-items-center">'.$BesL[$i]->nom.'</li>
              ';
             }
             $output.='
               <input type="hidden" id="Idprosp" value="'.$request->Idpro.'"/>';

             return $output;
            }

            if ($NewBes=='' && $AncBes!='') {
                // Besoins-Prospect
                 $dataPB = ['clients_id'  =>$request->Idpro,
                            'besoins_id'  =>$AncBes,
                            'dateD' => date('d/m/yy')
                           ];
                 clients_has_besoins::create($dataPB);

                // Lecture Besoins-Prospect
                  $BesL = DB::table('clients_has_besoins')
                    ->join('besoins', 'besoins.id', '=', 'clients_has_besoins.besoins_id')
                    ->select('besoins.*')
                    ->where('clients_has_besoins.clients_id','=',$request->Idpro)
                    ->get();
                  $output='';
                    for ($i=0; $i < count($BesL) ; $i++) {
                     $output.='<li class="list-group-item d-flex justify-content-between align-items-center">'.$BesL[$i]->nom.'</li>';
                    }
                 $output.='<input type="hidden" id="Idprosp" value="'.$request->Idpro.'"/>';
                 return $output;
            }
    }

    // Send SMS
    public function ProsSMS(Request $request)
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

         $pros  = clients::find($request->IPros);
         $curl = curl_init();
         $datas = [
            "email"=>"kouame.ngues123@gmail.com",
            "secret"=>"j7XAYrsp0IXhV@ddZ8ORdZFMRZro*xcDGXkVJDVG",
            "message"=>$nvMsg,
            "receiver"=>$pros->contact,
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
    }

    



    // SEND SMS
    
    


}
