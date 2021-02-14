<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\Model\clients;
use App\Model\sms;


class p_CampMarkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

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
        return view('pages.principale.marketing.p_campNew');
    }

    // Formulaire pour l'historique des campagnes
    public function CampgList()
    {
        $sms  = sms::all();
        //dd($sms->msg);
        return view('pages.principale.marketing.p_campList')->with('sms',$sms);
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
                     'dateSend' => date("d/m/yy"),
                   ];
          sms::create($dataP);

    }

    // Campagne marketing SMS Groupée aux clients
    public function sendNSMS(Request $request)
    {
        // Réception des données
         $smsPn = $request->smsPn;

        // Filtre des clients
         $clients = DB::table('clients')->where('statutClt', '1')->get();
         foreach ($clients as $client) {
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
              "receiver"=>$client->contact,
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
             //dd($response);
         }

        // Enregistrer un nouveau message
         $codesms = rand(5,100).'sms';
         $dataP  = [ 'codeSMS'  => $codesms,
                     'msg'      => $request->smsPn,
                     'dateSend' => date("d/m/yy"),
                   ];
          sms::create($dataP);

    }

    // Vider l'historique sms
    public function emptySMS(Request $request)
    {
        DB::table('sms')->delete();   
    }

    

}
