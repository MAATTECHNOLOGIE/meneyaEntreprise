<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Model\clients;
use App\Model\succursale_has_clients;
use App\Model\ventes_succursale;
use App\User;
use Hash;
use Auth;
use DB;
use Schema;

class GestionClient extends Controller
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




    // fonction de validation

        protected function validator(array $data)
            {
                return Validator::make($data, [
                    'name'        => 'required|min:5',
                    'contact'     => 'required|min:8',
                    'date'       => 'required',
                ]);
            
            }

    //Ajout d'un client
      public function AddClt(Request $request)
          {
            //Recuperation de l'entite (succursales /principale)
              if(getUserRole(Auth::id())->roleId == 1) 
                {
                  //Role 1 => Administrateur
                  //le client appartien a la principal

                  $succursale_id = 1;
                }
                else                      
                {
                  //Role autre que admin => Gestionnaire
                  $suc = succursale::find('user_id','=',Auth::id());
                  $succursale_id =$suc->id;       

                }


           $validator = $this->validator($request->all())->validate();
           $client = ['nom'=> $request->name,'contact'=> $request->contact,'lieu'=>$request->lieu,'date'=>$request->date,'statutClt'=>0];
           $clt = clients::create($client);
           // dd($clt->id);
           succursale_has_clients::create(['clients_id'=>$clt->id,'succursale_id'=>$succursale_id]);

              return response()->json();
          }


    // //Affiche liste des client de succ

    //     public function s_Client()
    //         {

    //                 //Recup Clients de  la succursale 
    //             $clts = DB::table('client_entites')
    //                 ->join('clients','clients.id','=','client_entites.client_id')
    //                 ->select('clients.*', 'clients.id as clientId')
    //                 ->where('client_entites.succursale_id','=',Auth::user()->succursale_id)
    //                 ->get();  
    //             return view('pages.succursale.vente.s_Client')->with('clts',$clts);
    //         }
    // //Requete ajax de validation d'ajout de client
    


    // //Recup liste des achat d'un client
    //     public function listAchatClt(Request $request)
    //     {
    //         $listeAch = ventes_succursale::where('succursale_id','=',Auth::user()->succursale_id)
    //                                     ->where('client_id','=',$request->idClt)->get();
    //         // Détails de la vente 
    //             $total= 0;
    //          $output ='';
    //          $output.='
    //             <div class="table-responsive fs--1">
    //                 <table class="table table-striped border-bottom">
    //                   <thead class="bg-200 text-900">
    //                     <tr>
    //                       <th class="border-0">Client</th>
    //                       <th class="border-0 text-center">Coût </th>
    //                       <th class="border-0 text-center">Qté Prd</th>
    //                       <th class="border-0 text-right">Date</th>
    //                     </tr>
    //                   </thead>
    //                   <tbody>';
    //                 for ($i=0; $i < count($listeAch) ; $i++){
    //                  $output.='
    //                     <tr>
    //                       <td class="align-middle">'.getClient($listeAch[$i]->client_id)->nom.'</td>
    //                       <td class="text-center">'.$listeAch[$i]->prix.'</td>
    //                       <td class="text-center">'.$listeAch[$i]->qte.'</td>
    //                       <td class=" text-right">'.$listeAch[$i]->dateV.'</td>
    //                     </tr>';
    //                     $total += $listeAch[$i]->prix; 
    //                  }
    //             $output.='
    //                   </tbody>
    //                 </table>
    //               </div>
    //               <div class="row no-gutters justify-content-end">
    //                 <div class="col-auto">
    //                   <table class="table table-sm table-borderless fs--1 text-right">';
    //                 // $total = 0;  
    //                 // for ($i=0; $i < count($listeAch) ; $i++){  
    //                 //     $total = $total+$listeAch[$i]->montant;
    //                 //  }
    //                 $output.='
    //                     <tr class="text-danger">
    //                       <th class="text-900 text-danger">Total(Fcfa):</th>
    //                       <td class="font-weight-semi-bold">'.$total.'</td>
    //                     </tr>';
    //                 $output.='    
    //                   </table>
    //                 </div>
    //               </div>
    //          ';
    //          // dd($output);
    //          return $output;


    //     }
    
    // //Suprimer un client et ses ventes
    //     public function delClt(Request $request)
    //     {
    //         // Suppression de la vente
    //         Schema::disableForeignKeyConstraints();

    //          ventes_succursale::where('client_id','=',$request->idClt)->delete();
    //          clientEntite::where('client_id','=',$request->idClt)->delete();
    //          clients::where('id','=',$request->idClt)->delete();

    //         Schema::enableForeignKeyConstraints();

    //         return response()->json();
    //     }

   
}
