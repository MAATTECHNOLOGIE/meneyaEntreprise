<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\categorie;
use App\Model\produits;
use DB;
use Validator;

class produitsControl extends Controller
{

    public function __construct()

    {

        $this->middleware('auth');

    }

	/*--------------
	   PRODUITS
	----------------*/

	//ajout de produits 
	    public function addPrd (Request $request)
	        {

      		//Generation de code Prduit
      		  	$id = produits::max('id') + 1;
	          	$mat = "Prd".$id.'#0'.rand(0,10);


	    $validator = $this->validAddProd($request->all())->validate();
	    if ($request->categorie  == 'new') 
	    {
			$request->categorie = 1;     	
	    } 
		$request->codePrd = setDefault($request->codePrd , $mat );
		$request->alertLevel = setDefault($request->alertLevel , getSeuil() );
		$request->unite = setDefault($request->unite , 'ND' );
		
	            //calcul prix produit
	            $valeur = array(
	                "produitMat"=>$request->codePrd,
	                'produitLibele'=>$request->libelleProd,
	                'produitPrix'=>$request->prixPrd,
	                'produitPrixFour'=>$request->coutAchat,
	                "description" =>$request->libelleProd,
	                "categorie_id" =>$request->categorie,
	                "unite_mesure" =>$request->unite,
	                "seuilAlert" =>$request->alertLevel,
	            );
	            if(!empty($request->idPrd))
	            {
	            produits::where('id','=',$request->idPrd)->update($valeur);
	            }
	            else
	            {
	            $prd = produits::create($valeur);
	            }

	            return response()->json();


	        }

	//Validation du form Ajout Prd
	    protected function validAddProd(array $data)
	        {
	            return Validator::make($data, [
	                'libelleProd' => 'required|min:3',
	                'prixPrd' => 'required',
	                'coutAchat' => 'required',
	            ]);
	        }

	//Calcul Prix de vente  automatiquement

	    public function calPrixAuto(Request $request)
	    {
	    	$prix = getPrixAuto($request->prix);
	    	return $prix;

	    }

	//Supression produits 
	    public function delPrd(Request $request)
	    {
	    	produits::where('id','=', $request->idProduit)->delete();

	    	return response()->json();
	    }





















	/*--------------
	   CATEGORIE
	----------------*/

    //Liste des categorie
    	public function lCateg()
    	{
    		$categorie = categorie::all();
	        if(count($categorie) >= 1)
	        {
	        	 $i =0;
	             $output ='<div class="table-responsive mt-4 fs--1">
	                <table class="table table-striped border-bottom">
	                  <thead>
	                    <tr class="bg-primary text-white">
	                     
	                      <th class="border-0 text-center">N°</th>
	                      <th class="border-0 text-center">Titre </th>
	                      <th class="border-0 text-center">Nbre Articles</th>

	                    </tr>
	                  </thead>
	                  <tbody>';
	                  foreach ($categorie as $catgo) 
	                  {
	                  	$i +=1;
	                  $output.='<tr>
	                      <td class="align-middle">
	                        <h6 class="mb-0 text-nowrap">'.$i.'</h6>
	                        
	                        </td>
                      		<td class="align-middle text-center h6">'.$catgo->libelle.'</td>
	                      <td class="align-middle text-center h6">'.getCatgoEle($catgo->id)->count().'</td>
	                    </tr>';   
	                  }


	                  $output.='</tbody>
	                </table>
	              </div>';
	        }
	        else
		        {
		            $output= '<h2 class="text-warning text-center">Aucune catégorie enregistré</h2>';
		        }

		        return $output;
    	}

    //Trier produit par categorie donne
    	public function prdByCatg(Request $request)
    	{

           $produits = DB::table('categories')
                  ->join('produits','produits.categorie_id','=','categories.id')
                  ->select('produits.*','categories.*', 'produits.id as prdId')
                  ->where('produits.categorie_id','=',$request->idCat)
                  ->orderBy('produits.id','desc')->get();
                 
                  // dd($produits);
           return view('pages/principale/approvision/prdByCatg')->with('produits',$produits)->with('idCat',$request->idCat);
    	}

    //Ajouter une categorie de produit
    	public function addCatgo(Request $request)
    	{
			$this->validAddCatgo($request->all())->validate();
			$cat = ['libelle' => $request->newCatgo];
    		$catgo = categorie::create($cat);
            $output ='<option class="categorie" value="'.$catgo->id.'">'.$catgo->libelle.'</option>';
           return $output;
    	}

            
    protected function validAddCatgo(array $data)
        {
            return Validator::make($data, [
                'newCatgo' => 'required|min:4',
            ]);
        }






}
