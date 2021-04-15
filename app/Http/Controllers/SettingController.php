<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Model\settings;
use App\User;
use Auth;


class SettingController extends Controller
{

    public function __construct()
        {
            $this->middleware('auth');
        }

    public function setting()
    {

        return view('pages.dash.setting');
    }
    //Modif user info
	    public function updUser(Request $request)
		    {
		    	// $validator = $this->validator($request->all())->validate();

		        $valeur= array(
		                       
		                        'name'=>$request->name,
		                        'email'=> $request->email
		                        );

		       $user= user::where('id','=',Auth::id())->update($valeur);
		    	return response()->json();
		    }
    //Update taxe 
	    public function updTaxe(Request $request)
		    {

          //modif taxe devise
            if (isset($request->deviseId)) 
            {
            $taxe = settings::where('cle','=','devise')->first()
                    ->update(['valeur'=> $request->deviseId]);

                
            }

		    	//modif taxe douane
			    	if (isset($request->txDouane)) 
			    	{
						$taxe = settings::where('cle','=','dedouanement')->first()
										->update(['valeur'=> $request->txDouane]);

			    			
			    	}
		    	//modif taxe annexe
			    	if (isset($request->txAnexe)) 
			    	{
						$taxe = settings::where('cle','=','fraisAnnexe')->first()
										->update(['valeur'=> $request->txAnexe]);	
			    	}
			    //modif taxe portuaaire
			    	if (isset($request->txPort)) 
			    	{
			    		$taxe = settings::where('cle','=','taxePort')->first()
										->update(['valeur'=> $request->txPort]);
			    	}	
			    //modif marge vente
			    	if (isset($request->txMarge)) 
			    	{
			    		$taxe = settings::where('cle','=','margeVente')->first()
										->update(['valeur'=> $request->txMarge]);
			    	}	

		    	return response()->json();
		    }

	//Update Alert $ Mobile money
	    public function updAlert(Request $request)
		    {

          //Modif paiement Mobile Option           
            if (isset($request->mobileMoney)) 
            {
                $request->mobileMoney = 1;
            }
            else
            {
              $request->mobileMoney = 0;
            }

            $taxe = settings::where('cle','=','mobileMoney')->first()
                    ->update(['valeur'=> $request->mobileMoney]);     

		    	//modif alert numero
			    	if (!empty($request->alertTel)) 
			    	{
						$taxe = settings::where('cle','=','alertTel')->first()
										->update(['valeur'=> $request->alertTel]);

			    			
			    	}
		    	//modif alert Mail 
			    	if (!empty($request->alertMail)) 
			    	{
						$taxe = settings::where('cle','=','alertMail')->first()
										->update(['valeur'=> $request->alertMail]);	
			    	}
			    //modif seuil produit
			    	if (!empty($request->seuilPrd)) 
			    	{
			    		$taxe = settings::where('cle','=','seuilPrd')->first()
										->update(['valeur'=> $request->seuilPrd]);
			    	}	
			    //modif marge vente
			    	if (isset($request->etatAlert)) 
			    	{
			    		$taxe = settings::where('cle','=','etatAlert')->first()
										->update(['valeur'=> $request->etatAlert]);
			    	}	
		    	return response()->json();
		    }

    public function lSetting(Request $request)
    {
    	$output = '<table class="table table-borderless fs--1 mb-0">
                        <tr class="border-bottom">
                          <th class="pl-0 pt-0 text-left">
                          Etat alerte
                          </th>
                          <th class="pr-0 text-right pt-0">
                              <div class="badge badge-pill badge-soft-success fs--2">'.getAlertEtat().'
                                <span class="fas fa-check ml-1" data-fa-transform="shrink-2"></span>
                              </div>
                          </th>
                        </tr>
                        <tr class="border-bottom">
                          <th class="pl-0 pt-0 text-left">
                          Mail Alerté
                          </th>
                          <th class="pr-0 text-right pt-0">
                              <div class="fs--2">
                                '.getAlertMail() .'
                            
                              </div>
                          </th>
                        </tr>
                        <tr class="border-bottom">
                          <th class="pl-0 pt-0 text-left">
                          Numero Alerté
                          </th>
                          <th class="pr-0 text-right pt-0">
                              <div class=" fs--2">
                                '.getAlertTel() .'
                            
                              </div>
                          </th>
                        </tr>
                        <tr class="border-bottom">
                          <th class="pl-0 pt-0 text-left">
                          Seuil d\'alert
                          </th>
                          <th class="pr-0 text-right pt-0">
                              <div class=" fs--2">
                                '.getSeuil().' articles
                            
                              </div>
                          </th>
                        </tr>
                        <tr class="border-bottom">
                          <th class="pl-0 pt-0 text-left">
                          Taxe de dedouanement
                          </th>
                          <th class="pr-0 text-right pt-0">
                              <div class="badge badge-pill badge-soft-warning fs--2">
                                '.getTxDouane() .' %
                            
                              </div>
                          </th>
                        </tr>
                        <tr class="border-bottom">
                          <th class="pl-0 pt-0 text-left">
                          Taxe de Portuaire
                          </th>
                          <th class="pr-0 text-right pt-0">
                              <div class="badge badge-pill badge-soft-warning fs--2">
                                '.getTxPort().' %
                            
                              </div>
                          </th>
                        </tr>
                        <tr class="border-bottom">
                          <th class="pl-0 pt-0 text-left">
                          Marge de Vente
                          </th>
                          <th class="pr-0 text-right pt-0">
                              <div class="badge badge-pill badge-soft-warning fs--2">
                                '.getMgvente() .' %
                            
                              </div>
                          </th>
                        </tr>
                    </table> ';
    	return $output;
    }





}
