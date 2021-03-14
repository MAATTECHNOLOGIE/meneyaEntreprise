<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\succursale_has_clients;
use App\Model\clients;
use App\Model\stock_principales;
use App\Model\vente_principales;
use App\Model\produits_has_vente_principales; 
// use App\Model\produits;
// use App\Model\versement;
use DB;
use Schema;
use Auth;


session_start();


class GestionVentePrincipalController extends Controller
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



    //Vente principales
      public function venteP()
        {
                    //Recup Clients $ prospects de la principales 
                $clt = DB::table('succursale_has_clients')
                    ->join('clients','clients.id','=','succursale_has_clients.clients_id')
                    ->select('clients.*', 'clients.id as clientId')
                    ->where('succursale_has_clients.succursale_id','=',1)
                    ->orderBy('id','desc')->get();
            return view('pages/principale/vente_P/venteP')->with('Clt',$clt);
        }
    


    //Enregistrement d'un produit dns le panier
      public function savePrdAchatP(Request $request)
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
                    $_SESSION["achatP"][] = $item_array;
                  }
              else{

                $item_array = array(
                     'qte'      => $request->quantite,
                     'prix'     => $request->prix,
                     'article'     => $request->article,
                 );

                //Création de session
                 $_SESSION["achatP"][] = $item_array;

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

    

    //Supression de la vente en session
      public function delAchat()
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
      public function delPrdAchat(Request $request)
        {
          $nbr =(int)$request->idPrd; //conversion de la variable en entier
          unset($_SESSION['achatP'][$nbr]);
          // dd(count($_SESSION['achatP']));
          return response()->json();

        }

    //Supression d'un produit dune vente deja enregistrer
      public function delPrdVnt(Request $request)
        {
          $vente= vente_principales::find($request->idVnt);
          $prd= produits_has_vente_principales::find($request->idPrd);

          //Soustraction du montant du prd  et upd de la vnt
            $prixVntPrd = $prd->prixvente * $prd->qte;
            $coutAchaPrd = getPrd($prd->produits_id)->produitPrixFour * $prd->qte;
            $vente->cout_achat_total = $vente->cout_achat_total- $coutAchaPrd;
            $vente->prix_vente_total = $vente->prix_vente_total - $prixVntPrd;

            $vente->mg_benef_brute = $vente->prix_vente_total - $vente->cout_achat_total;
            $vente->mg_benef_rel = $vente->prix_vente_total - ($vente->cout_achat_total + $vente->charge);
            $vente->qte = $vente->qte- $prd->qte;

          //Verification du type de vente ( 0 => facture pro //  1 => vente)
            if ($vente->typevente==1) 
            {
              # Actualisation du stock principale
                $prdStck = stock_principales::where('produits_id','=',$prd->produits_id)->first();
               
                $prdStck->stock_Qte = $prdStck->stock_Qte + $prd->qte;
                $prdStck->save();
            }

 
            $vente->save();
            
            $prd->delete();

            return response()->json();
        }      

    //Liste des produits de la vente en session
      public function lPrdAchat()
          {
             return view('pages/principale/vente_P/lPrdAchat'); 
          }

    //Recuperation des prds
      public function ajaxRecupPrdP( Request $request)
        {
            // selection des produits du stock de la succursales 
            $produits = DB::table('stock_principales')
                ->join('produits', 'produits.id', '=', 'stock_principales.produits_id')
                ->select('produits.*','produits.id as prdId','stock_principales.stock_Qte as qte')
                ->where('stock_Qte','>=',1)
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
                            qteInStck="'.isInSession('achatP','article',$produit->prdId,$produit->qte).'" >
                      '.$produit->produitLibele.'</option>';
                      }
                    }
                    else
                    {
                       $outputDetail.=' <option>Stock Vide</option>';
                    }
                             

              return $outputDetail;

        }


    //Enregistrer un achat 
      public function saveAchat(Request $request)
          {

                  if (!empty($_SESSION['achatP']))
                      {
                          //Generation du matricule de la commande
                          $matricule = $_SESSION["libelleCmd"]; 
                          // dd($matricule);
                          //insertion de la vente
                          $arrivage = vente_principales::create([
                                      'NumVente'=> $matricule,
                                      'clients_id' => $_SESSION['clientId'],
                                      'dateV' => $request->dateV,
                                      'charge' => setDefault($request->charge,0),
                                      'description_charge' => setDefault($request->chargeLibelle,"livraison"),
                                      'typevente' => setDefault($request->type,"0"),
                                    ]);
                                  $prix_vente_total = 0;
                                  $qte = 0;
                                  $cout_achat_total = 0;
                          foreach ($_SESSION['achatP'] as $key => $value)
                              {

                                 $arrayPrdArriv = ["prixvente" => $value['prix'],
                                                      "qte" => $value['qte'],
                                              "vente_principales_id"  => $arrivage->id,
                                              "produits_id"  =>$value['article'],
                                              "tva" => getPrd($value['article'])->tva,
                                                  ];
                                      //Cumul des valeur pour les totaux
                                        $prix_vente_total += $value['prix']*$value['qte'];
                                        $cout_achat_total += getPrd($value['article'])->produitPrixFour*$value['qte'];
                                        $qte += $value['qte'];

                                      //Enregistrement du produits vendu
                                      produits_has_vente_principales::create($arrayPrdArriv);

                                      //Verification du type d'operation
                                      // '0 => facture proformat / 1 => Vente'
                                      if($request->type == '1')
                                      {

                                        //Creation ou mise a jour du stock de ce produit
                                          $produits = stock_principales::firstOrCreate(
                                          ['produits_id' => $value['article']],
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
            return $this->delAchat();
          }


    //Mis a jour d'un achat
      public function updAchat(Request $request)
          {
            $vente= vente_principales::find($request->idVnt);
              $vente->charge = $request->charge;
              $vente->description_charge = $request->chargeLibelle;
              $vente->typevente = $request->type;
              $vente->dateV = $request->dateV;
              $vente->mg_benef_rel = $vente->prix_vente_total - ($vente->cout_achat_total + $request->charge);
              $vente->save();
                //Recuperation des produits vendu
                $prdVnts = produits_has_vente_principales::where('vente_principales_id','=',$vente->id)->get();
                          //insertion de la vente
                          foreach ($prdVnts as $key => $value)
                              {
                                     //Verification du type d'operation
                                      // '0 => facture proformat / 1 => Vente'
                                      if($request->type == '1')
                                      {

                                        //Creation ou mise a jour du stock de ce produit
                                          $produits = stock_principales::firstOrCreate(
                                          ['produits_id' => $value['produits_id']],
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
                                            //Declenchement d'alert
                                          }

                                            $produits->save();                                      
                                      }


                              }



            return response()->json();
          }

    //Validation d'une facture proformat
      public function validVnt(Request $request)
          {
            $vente= vente_principales::find($request->idVnt);
            $vente->typevente = 1;    // '0 => facture proformat / 1 => Vente'
            $vente->save();
                //Recuperation des produits vendu
                $prdVnts = produits_has_vente_principales::where('vente_principales_id','=',$vente->id)->get();
                          //insertion de la vente
                          foreach ($prdVnts as $key => $value)
                              {
                                   
                                      //Creation ou mise a jour du stock de ce produit
                                          $produits = stock_principales::firstOrCreate(
                                          ['produits_id' => $value['produits_id']],
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
                                            //Declenchement d'alert
                                          }

                                            $produits->save();                                      
                                    


                              }



            return response()->json();
          }
  // Generation Recu de vente 

    //Impression reçu d'une vente
    public function recuVntP(Request $request)
    {

            $vente = vente_principales::where('id','=',$request->NumVente)->get()->first();
            $cltNom = getClient($vente->clients_id);
             $prdVnt = DB::table('produits_has_vente_principales')
            ->join('produits', 'produits.id', '=', 'produits_has_vente_principales.produits_id')
            ->select('produits.*', 'produits_has_vente_principales.*')
            ->where('vente_principales_id','=',$vente->id)
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


    //Liste des ventes principale
      public function lventeP()
        {
            $ventes= vente_principales::where('typevente','=','1')
                                ->orderBy('id','desc')->get();
            // dd($ventes);
            return view('pages/principale/vente_P/lventeP')
                    ->with('ventes',$ventes);
        }

    //Liste des facture proformat 
      public function lfactuProP()
        {
            $ventes= vente_principales::where('typevente','=','0')
                                ->orderBy('id','desc')->get();
            // dd($ventes);
            return view('pages/principale/vente_P/lfactuProP')
                    ->with('ventes',$ventes);
        }


    //Detail d'une vente de la principale
      public function ajaxDetailVntP(Request $request)
      {
        $vente= vente_principales::find($request->NumVente);

             $OpTion = DB::table('produits_has_vente_principales')
            ->join('produits', 'produits.id', '=', 'produits_has_vente_principales.produits_id')
            ->select('produits.*', 'produits_has_vente_principales.*')
            ->where('vente_principales_id','=',$request->NumVente)
            ->get();

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
                          <td class="text-center">'.$OpTion[$i]->prixvente.'</td>
                          <td class="text-center">'.$OpTion[$i]->qte.'</td>
                          <td class=" text-right">'.$OpTion[$i]->prixvente * $OpTion[$i]->qte .'</td>
                        </tr>';
                        $total += $OpTion[$i]->prixvente * $OpTion[$i]->qte; 
                     }
                $output.='
                      </tbody>
                    </table>
                  </div>
                  <div class="row no-gutters justify-content-end">
                    <div class="col-auto">
                      <table class="table table-sm table-borderless fs--1 text-right">';
                    $total = $total+$vente->charge;
                    $output.='
                        <tr class="">
                          <th class="text-900 ">Charge:</th>
                          <td class="font-weight-semi-bold">'.$vente->charge.'</td>
                        </tr>
                        <tr class="text-danger">
                          <th class="text-900 text-danger">Total TTC:</th>
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


  //supression vente de la pricipales
    public function delVntP(Request $request)
        {
             // produits_has_vente_principales::where('vente_principales_id', '=', $request->idVente)->delete();
             vente_principales::where('id','=',$request->idVente)->delete();

            return response()->json();
        }


  //supression vente de la pricipales
    public function delAllVntP(Request $request)
        {
             // produits_has_vente_principales::where('vente_principales_id', '=', $request->idVente)->delete();
             vente_principales::where('typevente','=',$request->typevente)->delete();

            return response()->json();
        }


  //Edition d'une vente 
      public function editVntP(Request $request)
      {
        $vente= vente_principales::find($request->idV);
        $clt = getClient($request->idClt);

             $prd = DB::table('produits_has_vente_principales')
            ->join('produits', 'produits.id', '=', 'produits_has_vente_principales.produits_id')
            ->select('produits.*', 'produits_has_vente_principales.*')
            ->where('vente_principales_id','=',$request->idV)
            ->get();
            return view('pages/principale/vente_P/editVntP')->with('vente',$vente)
                                                            ->with('clt',$clt)
                                                            ->with('prd',$prd);
      }
  
  //Stock de la principal
      public function stockP()
      {
            $produits_stock = stock_principales::all();
            return view('pages/principale/stock_P/stockP')->with('stockProduits',$produits_stock);
      }

}
