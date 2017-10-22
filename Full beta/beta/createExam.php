<?php
  session_start();
  
  $str_json = file_get_contents('php://input');
  
  $arrayJSON= json_decode(stripslashes($str_json), true);
  
  
  $url = 'https://web.njit.edu/~as2487/cs490/beta/createExam.php';
  
   print_r($arrayJSON);
  
 
  //Initiate cURL.
  $ch = curl_init($url);
   
  //Encode the array into JSON.
  $jsonDataEncoded = json_encode($tr_json);
 
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