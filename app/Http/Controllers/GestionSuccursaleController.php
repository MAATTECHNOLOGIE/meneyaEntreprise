<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\succursale;
use App\Model\ressources_hums;
use App\Model\stock_succursales;
use App\Model\produits;
use App\Model\ventes_succursales;
use App\Model\role_has_user;

use App\User;
use Hash;
use Validator;
use Schema;
use Auth;
use DB;



class GestionSuccursaleController extends Controller
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

    public function stockSuc(Request $request)
        {

            $stockSuccursale = stock_succursales::where('succursale_id',"=",$request->idSuc)->get();
            $succursale_info = succursale::where('id','=',$request->idSuc)->first();
            return view('pages/succursale/s_Stock')->withStockSuccursales($stockSuccursale)->withSuccursaleInfo($succursale_info);
        }




    // Page Ajout de succursale
        public function addSuc()
        {
            $succursales = succursale::where('id','>',1)->get();
            $users = User::all();
            return view('pages/succursale/addSuc')->withSuccursales($succursales)->withUsers($users);
        }

    //Validation du formulaire ajout succursale
        protected function validator(array $data)
            {
                return Validator::make($data, [
                    'name'      => 'required|min:5',
                    'gerant'    => 'required',
                    'telephone' => 'required',
                    'date'      => 'required',
                    'localite'  => 'required'

                ]);
            }


    //Enregistrement de la succursale
        function saveSuc(Request $request)
        {
            $validator = $this->validator($request->all())->validate();

                        role_has_user::create(['roles_id' =>2,'user_id'=>$request->gerant]);
                        
                        //MATRICULE Succursales
                                $countSuc = succursale::count() + 1;
                                $mat = 'SC00'.$countSuc;

                        $valeur = array(
                        'succursaleLibelle'         => $request->name,
                        'succursalContact'          => $request->telephone,
                        'datesucu'                    => $request->date,
                        'succursalLieu'             => $request->localite,
                        'succursaleMat'             =>$mat,
                        "user_id"                   =>$request->gerant,);

                     succursale::create($valeur);
                    return response()->json();

        } 

    //MIs a jour  de la succursale
        function UpdSuc(Request $request)
        {
            $validator = $this->validator($request->all())->validate();

                        role_has_user::create(['roles_id' =>2,'user_id'=>$request->gerant]);
                        

                        $valeur = array(
                        'succursaleLibelle'         => $request->name,
                        'succursalContact'          => $request->telephone,
                        'datesucu'                    => $request->date,
                        'succursalLieu'             => $request->localite,
                        "user_id"                   =>$request->gerant,);

                     succursale::where('id','=',$request->idSuc)->update($valeur);
                    return response()->json();

        }

        public function listSuc()
        {

            $succursales = succursale::where('id','>',1)->get();

            return view('pages/succursale/listSuc')->withSuccursales($succursales);
        }


    //supression suc
    function delSuc(Request $request)
    {

        succursale::where("id",'=',$request->idSuc)->delete();

        return response()->json();
    }


    // public function statistiqueSuccursale()
    // {
    //     return view('pages/principale/gestionSuccursale/statistiqueSuccursale');
    // }










    
    // // ROUTE DE DASHBOARD D'UNE SUCCURSALES 

    // public function dashSucu(Request $request)
    // {
    //     // lecture de toute les infrmations de la succursale
    //     $suc = DB::table('succursales')
    //         ->join('users', 'users.succursale_id', '=', 'succursales.id')
    //         ->join('ressources_hums', 'ressources_hums.id', '=', 'users.ressourcesHum_id')
    //         ->select('users.*', 'ressources_hums.*', 'succursales.*')
    //         ->where('succursales.id','=',Auth::user()->succursale_id)
    //         ->get()->first();
  

    //     $stock = stock_succursale::where('succursale_id','=',Auth::user()->succursale_id)->get();
    //     return view('pages/succursale/dash/dashSucu')->withStockSuccursales($stock)->withSucInfo($suc);
    // }


   
}
