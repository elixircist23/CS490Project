<?php
  /*
Kb295 - middle - createQuestion.php
Kevin Butryn
*/
  $str_json = file_get_contents('php://input');
  
  $arrayJSON= json_decode(stripslashes($str_json), true);
  $data = array(
    'question_body'  => $arrayJSON[question_body],
    'question_weight' => $arrayJSON[question_weight],
    'question_difficulty' => $arrayJSON[question_difficulty],
    'question_topic' => $arrayJSON[question_topic],
);
  //API Url
  $url = 'https://web.njit.edu/~as2487/cs490/beta/createQuestion.php';
   
  //Initiate cURL.
  $ch = curl_init($url);
   
  //Encode the array into JSON.
  $jsonDataEncoded = json_encode($data);
   
  //Tell cURL that we want to send a POST request.
  curl_setopt($ch, CURLOPT_POST, 1);
  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   
  //Attach our encoded JSON string to the POST fields.
  curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
   
  //Set the content type to application/json
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
   
  //Execute the request
  $result = curl_exec($ch);
  echo $result;
?>
