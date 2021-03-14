<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\credits;

use App\Model\produits;
use App\Model\versement;

use Auth;
use Schema;
use DB;


class s_CreditController extends Controller
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

    //Ajouter une creance succursale
      public function s_addCrd(Request $request)
        {
          $info =  ['creditDate' =>$request->dateCrd,'creditMontant' =>$request->montantCrd,'creditStatut' =>'en cours', 'client_id' =>$request->client_id,'creditEcheance' =>$request->dateEch,'succursale_id' =>Auth::user()->succursale_id];
          credit::create($info);
          return response()->json();
        }

    //Liste credit succursale 
        public function s_credits(Request $request)
            {
              $suc = userHasSucc(Auth::id());
              $credits = credits::where('succursale_id','=',$suc->id)->get();
                    //Recup Clients de  la succursale 
                $Clt = DB::table('client_entites')
                    ->join('clients','clients.id','=','client_entites.client_id')
                    ->select('clients.*', 'clients.id as clientId')
                    ->where('client_entites.succursale_id','=',Auth::user()->succursale_id)
                    ->get(); 
              return view('pages.succursale.vente.s_credit')->with('crds',$credits)->with('Clt',$Clt);

            }
    //Payement credit succursale 
        public function s_payCrd(Request $request)
            {

              $idCredit= (int)$request->idCrd;

              $info = ['montantPaye' =>$request->montant,'datePaiement' =>$request->date,'typePaiement' => $request->typePaiement,'credit_id'=>$idCredit];

              $credit = credit::find($idCredit);


             $totalPaye =  getSommeCrdPaye($idCredit) + $request->montant;
              $histCr = creditHistorique::create($info);

                  if($totalPaye >= $credit->creditMontant )
                      {
                         
                          $credit->creditStatut = 'Soldée';
                          $credit->save();
                      }
             
              return response()->json();

            }

    //Historique de mes credits
            public function histCrd(Request $request)
              {
                 $idCrd = (int)$request->idCrd;
                  $hists = creditHistorique::where('credit_id','=',$idCrd)->get();

                  if(count($hists) >= 1)
                  {
                       $output ='<table class="table table-striped border-bottom">
                            <thead>
                              <tr class="bg-primary text-white">
                               
                                <th class="border-0 text-center">Date</th>
                                <th class="border-0 text-center">Montant</th>
                                <th class="border-0 text-center">Type paiement</th>

                              </tr>
                            </thead>
                            <tbody>';
                            foreach ($hists as $hist) 
                            {
                            $output.='<tr>
                                <td class="align-middle text-center">'.$hist->datePaiement.'</td>
                                <td class="align-middle text-center">'.number_format($hist->montantPaye,0,',','. ').' FCFA</td>
                                <td class="align-middle text-center">'.$hist->typePaiement.'</td>
                              </tr>';   
                            }

                            $output.='</tbody>
                          </table>';
                  }
                  else
                  {
                      $output= '<h2 class="text-warning text-center">Aucun paiement fait pour cette echeance</h2>';
                  }
                 


                  return $output;

              }

            
    //Suprimer une creance
      public function delCrd(Request $request)

      {

          
          creditHistorique::where('credit_id','=',$request->idCrd)->delete();

            credit::where('id','=',$request->idCrd)->delete();
            return response()->json();

            // fournisseur::where('id','=',$request->IdF)->delete();


      }





}



