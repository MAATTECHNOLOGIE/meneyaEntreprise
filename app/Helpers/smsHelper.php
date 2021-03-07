<?php

use App\Model\produits;

if(!function_exists('Sendsms'))
{
  function Sendsms($msg,$tel,$sender)
  {
    // Filtrer le messages
         $nvMsg = str_replace('à','a', $msg);
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
            "secret"=>"H97p0ZwvhpZBriJfWqJCb5iMuupodaibo@5veXbt",
            "message"=>$nvMsg,
            "receiver"=>$tel,
            "sender"=>$sender,
            "cltmsgid"=>"1"
         ];
         /*$response = $tel.'/';*/
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
         return $response;  
  }
}