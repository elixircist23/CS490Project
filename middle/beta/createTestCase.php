<?php
  /*
Kb295 - middle - createTestCase.php
Kevin Butryn
*/
  
  $str_json = file_get_contents('php://input');
  
  $arrayJSON= json_decode($str_json, true);
  
  echo $arrayJSON;  

  $url = 'https://web.njit.edu/~as2487/cs490/beta/createTestCase.php';  
 
  //Initiate cURL.
  $ch = curl_init($url);
   
  //Encode the array into JSON.
  $jsonDataEncoded = json_encode($arrayJSON);
 
  //echo sizeof($arrayJSON);
   
  //Tell cURL that we want to send a POST request.
  
  curl_setopt($ch, CURLOPT_POST, 1);
  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   
  //Attach our encoded JSON string to the POST fields.
  curl_setopt($ch, CURLOPT_POSTFIELDS,   $jsonDataEncoded);
   
  //Set the content type to application/json
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
   
  //Execute the request
  $result = curl_exec($ch);
  echo $result;
?>
