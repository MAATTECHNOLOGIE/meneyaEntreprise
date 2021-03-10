<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ventes_succursales;
use App\Model\produits_has_ventes_succursales;
use App\Model\stock_succursales;
// use App\Model\produits_has_ventes_succursales;



use Auth;
use Schema;
use DB;
session_start();

class s_VenteController extends Controller
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




    // Toutes les ventes de succu
        public function s_Vente(Request $request)
        {
            // lecture de toute les vente de la succursale
          if(!isset($request->type)){$request->type =1;}
            switch ($request->type) {
              case 0:
                $type= 0;
                $typeName ='Factures proformat';
                break;
              case 2:
                $type= 2;
                $typeName ='Ventes Non Soldées';
                break;
              default:
                $type= 1;
                $typeName ='Mes Ventes Soldées';
                break;
            }

            $ventes = ventes_succursales::where('typevente','=',$type)
                        ->where('succursale_id','=',userHasSucc(Auth::id())->id)
                        ->orderBy('id','desc')->get();
            return view('pages.succursale.vente.s_Vente')->withVentes($ventes)
                                                        ->withTypevente($typeName);
        }


    //Formulaire d'Ajout de vente 
        public function Addvente()
        {

                //Recup Clients de  la succursale 
                     
                $clt = DB::table('succursale_has_clients')
                    ->join('clients','clients.id','=','succursale_has_clients.clients_id')
                    ->select('clients.*', 'clients.id as clientId')
                    ->where('succursale_has_clients.succursale_id','=',userHasSucc(Auth::id())->id)
                    ->orderBy('id','desc')->get();

            return view('pages.succursale.vente.addVente')->with('Clt',$clt);
        }

    //Recuperation des prds
      public function ajaxRecupPrdSuc( Request $request)
        {
          
            // selection des produits du stock de la succursales 
            $produits = DB::table('stock_succursales')
                ->join('produits', 'produits.id', '=', 'stock_succursales.produits_id')
                ->select('produits.*','produits.id as prdId','stock_succursales.stock_Qte as qte')
                ->where('stock_succursales.succursale_id','=',userHasSucc(Auth::id())->id)
                ->where('stock_succursales.stock_Qte','>=',1)
                ->get();
                // dd($produits);
                $outputDetail = "";
                    if (count($produits)!= 0) 
                    {
                       $outputDetail.=' <option value="choix">-- Articles --</option>';
                      foreach($produits as $produit)
                      {
                        $outputDetail.=' <option 
                            prixPrd="'.$produit->produitPrix.'" 
                            prixFour="'.$produit->produitPrixFour.'"
                            prixFourFormat="'.formatPrice($produit->produitPrixFour).'"
                            value="'.$produit->prdId.'" 
                            qteInStck="'.$produit->qte.'" >
                      '.$produit->produitLibele.'</option>';
                      }
                    }
                    else
                    {
                       $outputDetail.=' <option>Stock Vide</option>';
                    }
                             

              return $outputDetail;

        }

    //Enregistrement d'un produit dns le panier
      public function savePrdAchatSuc(Request $request)
        {
            // Ajax validation et retour
            // $validator = $this->validator($request->all())->validate();
            //Generation de clé unique
            $idProduit = $request->article.rand(0,10000);
            //Verification de la quantite du produit en stock
            //Création des panier 
             if (isset($_SESSION['achatP'])) 
                 {
                    $count = count($_SESSION["achatP"]);
                    $item_array = array(
                     'qte'      => $request->quantite,
                     'prix'     => $request->prix,
                     'article'     => $request->article,
                     );
                    $_SESSION["achatP"][$count] = $item_array;
                  }
              else{

                $item_array = array(
                     'qte'      => $request->quantite,
                     'prix'     => $request->prix,
                     'article'     => $request->article,
                 );

                //Création de session
                 $_SESSION["achatP"][0] = $item_array;

                  }

                  //Enregistrement de l'id client session

            if (empty($_SESSION["clientId"])) 
                    {
                       $_SESSION["clientId"] = $request->clientId;
                       $_SESSION["clientNom"] = trim($request->clientNom);
                    }
                    
            $_SESSION["libelleCmd"] = "VNT#".date("d/m/y")."#".rand(0,100); 
                   return response()->json();
           }



    //Liste des produits de la vente en session
      public function lPrdAchat()
          {
             return view('pages/succursale/vente/lPrdAchat'); 
          }


    //Supression de la vente en session
      public function delAchatSuc()
        {
            unset($_SESSION['achatP']);
            unset($_SESSION['clientId']);
            unset($_SESSION['clientNom']);

            if(isset($_SESSION['idVente']))
            {
                return $_SESSION['idVente'];
            }
            else
            {
              return response()->json();
            }

        }

    //Supression d'un produit de la  vente en session
      public function delPrdAchatSuc(Request $request)
        {
          $nbr =(int)$request->idPrd; //conversion de la variable en entier
          unset($_SESSION['achatP'][$nbr]);
          return response()->json();

        }


    //Enregistrer un achat 
      public function saveAchatSuc(Request $request)
          {
                $suc =userHasSucc(Auth::id());
                  if (!empty($_SESSION['achatP']))
                      {
                          //Generation du matricule de la commande
                          $matricule = $_SESSION["libelleCmd"]; 
                          // dd($matricule);
                          //insertion de la vente
                          $arrivage = ventes_succursales::create([
                                      'NumVente'=> $matricule,
                                      'clients_id' => $_SESSION['clientId'],
                                      'dateV' => $request->dateV,
                                      'charge' => setDefault($request->charge,0),
                                      'description_charge' => setDefault($request->chargeLibelle,"livraison"),
                                      'typevente' => setDefault($request->type,"0"),
                                      'succursale_id' =>$suc->id,
                                    ]);
                                  $prix_vente_total = 0;
                                  $qte = 0;
                                  $cout_achat_total = 0;
                          foreach ($_SESSION['achatP'] as $key => $value)
                              {

                                 $arrayPrdArriv = ["prixvente" => $value['prix'],
                                                      "qte" => $value['qte'],
                                              "ventes_succursales_id"  => $arrivage->id,
                                              "produits_id"  =>$value['article'],
                                              "tva" => getPrd($value['article'])->tva,
                                                  ];
                                      //Cumul des valeur pour les totaux
                                        $prix_vente_total += $value['prix']*$value['qte'];
                                        $cout_achat_total += getPrd($value['article'])->produitPrixFour*$value['qte'];
                                        $qte += $value['qte'];

                                      //Enregistrement du produits vendu
                                      produits_has_ventes_succursales::create($arrayPrdArriv);

                                      //Verification du type d'operation
                                      // '0 => facture proformat / 1 => Vente'
                                      if($request->type == '1')
                                      {

                                        //Creation ou mise a jour du stock de ce produit
                                          $produits = stock_succursales::firstOrCreate(
                                          ['produits_id' => $value['article'],'succursale_id' =>$suc->id ],
                                          ['stock_Qte' => 0 ]);
                                          if( $produits->stock_Qte >= $value['qte'])
                                          {
                                            $produits->stock_Qte = $produits->stock_Qte - $value['qte'];

                                            //Compare le stock restant au seuil d'alert
                                              if ($produits->stock_Qte <= getPrd($value['article'])->seuilAlert ) 
                                              {
                                                  //Déclenchement d'alert

                                              }
                                          }
                                          else
                                          {
                                            $produits->stock_Qte = 0;
                                            //Declenchement d'alert
                                          }

                                            $produits->save();                                      
                                      }


                              }

                        $arrivage->qte = $qte;
                        $arrivage->cout_achat_total = $cout_achat_total;
                        $arrivage->prix_vente_total = $prix_vente_total;
                        $arrivage->mg_benef_brute = $prix_vente_total - $cout_achat_total;
                        $arrivage->mg_benef_rel = $prix_vente_total - ($cout_achat_total + $arrivage->charge);
                        $arrivage->save();
                      }
              $_SESSION['idVente'] = $arrivage->id;
            return $this->delAchatSuc();
          }


      //Impression reçu d'une vente
    public function recuVntSuc(Request $request)
    {

            $vente = ventes_succursales::find($request->NumVente);
            $cltNom = getClient($vente->clients_id);
             $prdVnt = DB::table('produits_has_ventes_succursales')
            ->join('produits', 'produits.id', '=', 'produits_has_ventes_succursales.produits_id')
            ->select('produits.*', 'produits_has_ventes_succursales.*')
            ->where('ventes_succursales_id','=',$vente->id)
            ->get();
                  //Variable contenant la somme total investir
                  $somTotal = 0;

            $output ='
              <div class="row justify-content-between align-items-center">
                <div class="col">
                  <h6 class="text-500">Facture à </h6>
                  <h5>'.$cltNom->nom.'</h5>
                  <p class="fs--1">'.$cltNom->nom.'<br></p>
                  <p class="fs--1">
                   <a href="tel:'.$cltNom->contact.'">'.$cltNom->contact.'</a>
                  </p>
                </div>
                <div class="col-sm-auto ml-auto">
                  <div class="table-responsive">
                    <table class="table table-sm table-borderless fs--1">
                      <tbody>
                        <tr>
                          <th class="text-sm-right">N° de commande:</th>
                          <td>'.$vente->NumVente.'</td>
                        </tr>
                        <!--<tr>
                          <th class="text-sm-right">Order Number:</th>
                          <td>AD20294</td>
                        </tr>-->
                        <tr>
                          <th class="text-sm-right">Date de la facture:</th>
                          <td>'.$vente->dateV.'</td>
                        </tr>
                        <!--<tr>
                          <th class="text-sm-right">Paiement dû:</th>
                          <td>Dès réception</td>
                        </tr>-->
                        <tr class="alert-success font-weight-bold">
                          <th class="text-sm-right">Montant dû:</th>
                          <td>'.$vente->prix_vente_total.' '.getMyDevise().'</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


              <div class="table-responsive fs--1">
                <table class="table table-striped border-bottom">
                  <thead class="bg-200 text-900">
                    <tr>
                      <th class="border-0">Produit</th>
                      <th class="border-0 text-center">Qte</th>
                      <th class="border-0 text-center">Prix de vente/ unité</th>
                      <th class="border-0 text-center">TVA /unité</th>
                      <th class="border-0 text-right">Montant Total</th>
                    </tr>
                  </thead>
                  <tbody >';
            for ($i=0; $i < count($prdVnt) ; $i++){
              $output .='<tr>
                      <td class="align-middle">
                        <h6 class="mb-0 text-nowrap"> 
                        '.$prdVnt[$i]->produitLibele.' </h6>
                      </td>
                      <td class="align-middle text-center">
                       '.$prdVnt[$i]->qte.' 
                        ('.$prdVnt[$i]->unite_mesure.')</td>
                      <td class="align-middle text-center">
                       '.$prdVnt[$i]->prixvente.' '.getMyDevise().'</td>
                      <td class="align-middle text-center">
                       '.$prdVnt[$i]->tva.' '.getMyDevise().'</td>
                      <td class="align-middle text-right">
                       '.$prdVnt[$i]->qte * $prdVnt[$i]->prixvente.' '.getMyDevise().'
                      </td>
                    </tr>';
                     $somTotal += $prdVnt[$i]->prixvente * $prdVnt[$i]->qte;
                  }

      // Calcul de la charges liées à la sorties
           if ($vente->charge!=null) {$charges = $vente->charge;}
           else{$charges = 0;}



      // Calcul du montant total TTC
         $tva = 0;
         $ttc = $tva+$charges+$somTotal;

          $output .='</tbody>
                </table>
              </div>
              <div class="row no-gutters justify-content-end">
                <div class="col-auto">
                  <table class="table table-sm table-borderless fs--1 text-right">
                    
                    <tr>
                      <th class="text-900">Sous-total:</th>
                      <td class="font-weight-semi-bold">
                        '.$somTotal.' '.getMyDevise().'
                       </td>
                    </tr>

                    <tr>

                      <th class="text-900">Autres:</th>
                      <td class="font-weight-semi-bold">'.
                       $charges.' '.getMyDevise().'
                      </td>
                    </tr>

                    <!--<tr>
                      <th class="text-900">tva 
                      ('.$tva.'%) : </th>
                      <td class="font-weight-semi-bold">
                        '.$tva .' 
                        '.getMyDevise().'
                       </td>
                    </tr>-->

                    
                   
                    <tr class="border-top text-danger">
                      <th class="text-900">Montant TTC:</th>
                      <td class="font-weight-semi-bold text-danger"> '.$ttc.' '.getMyDevise().'</td>
                    </tr>
                  </table>
                </div>
              </div>';

              return $output;

            
  }

    //Validation d'une facture proformat
      public function validVntSuc(Request $request)
          {
            $vente= ventes_succursales::find($request->idVnt);
            $vente->typevente = 1;    // '0 => facture proformat / 1 => Vente'
            $vente->save();
                //Recuperation des produits vendu
                $prdVnts = produits_has_ventes_succursales::where('ventes_succursales_id','=',$vente->id)->get();
                          //insertion de la vente
                          foreach ($prdVnts as $key => $value)
                              {
                                   
                                      //Creation ou mise a jour du stock de ce produit
                                          $produits = stock_succursales::firstOrCreate(
                                          ['produits_id' => $value['article'],'succursale_id' =>$suc->id ],
                                          ['stock_Qte' => 0 ]);
                                          if( $produits->stock_Qte >= $value['qte'])
                                          {
                                            $produits->stock_Qte = $produits->stock_Qte - $value['qte'];

                                            //Compare le stock restant au seuil d'alert
                                              if ($produits->stock_Qte <= getPrd($value['produits_id'])->seuilAlert ) 
                                              {
                                                  //Déclenchement d'alert

                                              }
                                          }
                                          else
                                          {
                                            $produits->stock_Qte = 0;
                                            //Déclenchement d'alert
                                          }

                                            $produits->save();                                      
                                    


                              }



            return response()->json();
          }






































    //Liste Produit de la vente
        public function listPrdV(Request $request)
        {

            $idV = (int)$request->idVente;

            // Lecture des sorties-opérations-opérateurs
             $OpTion = DB::table('produits_has_ventes_succursales')
                ->join('produits','produits.id','=','produits_has_ventes_succursales.produits_id')
                ->select('produits.*', 'produits_has_ventes_succursales.*')
                ->where('produits_has_ventes_succursales.vente_succursale_id','=',$idV)
                ->get();

            // Détails de la vente 
                $total= 0;
             $output ='';
             $output.='
                <div class="table-responsive fs--1">
                    <table class="table table-striped border-bottom">
                      <thead class="bg-200 text-900">
                        <tr>
                          <th class="border-0">Article</th>
                          <th class="border-0 text-center">Prix de vente </th>
                          <th class="border-0 text-center">Qté</th>
                          <th class="border-0 text-right">Prix Net(Fcfa)</th>
                        </tr>
                      </thead>
                      <tbody>';
                    for ($i=0; $i < count($OpTion) ; $i++){
                     $output.='
                        <tr>
                          <td class="align-middle">'.$OpTion[$i]->produitLibele.'</td>
                          <td class="text-center">'.$OpTion[$i]->prix.'</td>
                          <td class="text-center">'.$OpTion[$i]->qte.'</td>
                          <td class=" text-right">'.$OpTion[$i]->prix * $OpTion[$i]->qte .'</td>
                        </tr>';
                        $total += $OpTion[$i]->prix * $OpTion[$i]->qte; 
                     }
                $output.='
                      </tbody>
                    </table>
                  </div>
                  <div class="row no-gutters justify-content-end">
                    <div class="col-auto">
                      <table class="table table-sm table-borderless fs--1 text-right">';
                    // $total = 0;  
                    // for ($i=0; $i < count($OpTion) ; $i++){  
                    //     $total = $total+$OpTion[$i]->montant;
                    //  }
                    $output.='
                        <tr class="text-danger">
                          <th class="text-900 text-danger">Total(Fcfa):</th>
                          <td class="font-weight-semi-bold">'.$total.'</td>
                        </tr>';
                    $output.='    
                      </table>
                    </div>
                  </div>
             ';
             // dd($output);
             return $output;
        }

    //Suprimer vente de la sucu
        public function delVente(Request $request)
        {
            // Suppression de la vente
            Schema::disableForeignKeyConstraints();

             produits_has_ventes_succursale::where('vente_succursale_id', '=', $request->idV)->delete();
             ventes_succursale::where('id','=',$request->idV)->delete();

            Schema::enableForeignKeyConstraints();

            return response()->json();
        }



    //Enregistrement des produits de la vente en cour
        public function savePrdV(Request $request)
            {
                // Ajax validation et retour
                // $validator = $this->validator($request->all())->validate();
                //Generation de clé unique
        
                $idProduit = $request->article.rand(0,10000);
                //Verification de la quantite du produit en stock

                //Création des panier 
                 if (isset($_SESSION['achatP'])) 
                     {
                        $count = count($_SESSION["achatP"]);
                        $item_array = array(
                         'qte'      => $request->quantite,
                         'prix'     => $request->prix,
                         'article'     => $request->article,
                         'idArticle'     => $request->idArticle,
                         );
                        $_SESSION["achatP"][$count] = $item_array;
                      }
                  else
                    {

                        $item_array = array(
                             'qte'      => $request->quantite,
                             'prix'     => $request->prix,
                             'article'     => $request->article,
                             'idArticle'     => $request->idArticle,

                         );

                        //Création de session
                            $_SESSION["achatP"][0] = $item_array;
                    }

                if (empty($_SESSION["client_id"])) 
                        {

                           $_SESSION["client_id"] = $request->succursaleNom; //id du client
                        }
                        
                    $_SESSION["libelleCmd"] = "VENTE#".date("d/m/y")."#".rand(0,100); 
                       

                return response()->json();
            }

    //Show Liste produit de la vente
        public function showPrdL()
            {
               return view('pages/succursale/vente/listePrdV'); 
            }


    //Delete la commande 
        public function delCmd()
        {

            unset($_SESSION['achatP']);
            unset($_SESSION['client_id']);
            unset($_SESSION["libelleCmd"]);
            return response()->json();

        }

    //Delete produit de la commande
        public function delPrdCmd(Request $request)
            {
                $nbr =(int)$request->NumArt; //conversion en entier
                unset($_SESSION['achatP'][$nbr]);
                return response()->json();
            }






}



