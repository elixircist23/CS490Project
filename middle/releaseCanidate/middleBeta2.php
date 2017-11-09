<?php

/*
Kb295 - middle - middleBeta.php
Kevin Butryn
Grades user answers and stores test case results and exam result
*/





/*
This function Retrieves information from the php file 
Located at the URL in the backend
Returns data in decoded JSON array
*/

function getData($url)
{
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
  curl_setopt($ch, CURLOPT_POST, 1);
  
  $result = curl_exec($ch);
	curl_close($ch);
  $data = (array)json_decode($result, true);
  return $data;
}

/*
This function posts data to the back end
sends data in form of JSON array
*/
function postData($url,$data) 
{
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
  $result = curl_exec($ch);
  curl_close($ch);
}

/*
This Function take in an userAnswer
input: test_case delimited by ,
*/

function runAnswer($script,$input,$function)
{  
  $code = $script;
  $MAX_LINES = 1000;
  $cmd = 'python ';
  $testString = "\rprint ".$function."(".$input.")";
  $code = $code . $testString;
   
  $codeFile = tempnam("/tmp", "examQuestionCode");
  $errorFile = tempnam("/tmp", "examQuestionError");
  
  $codeHandle = fopen($codeFile,'w') or die("Unable to open file!");
	fwrite($codeHandle, $code);
	fclose($codeHandle);
 
  $cmd .= "$codeFile 2> $errorFile";
  $result = exec($cmd);
  $errorLines = file_get_contents($errorFile);
  
 	unlink($codeFile);
  unlink($errorFile);
 
  if(filesize($errorFile) == 0)
  {
  return $result;
  }
  else
  {
  return null;
  }
}

 // Function that takes in a question
 // and finds the function name specified. 
function getFunctionName($questionBody)
{
$string = preg_split('/named/',$questionBody);
$string = $string[1];
$words = explode(' ',trim($string));
return $words[0];
}


  // declare variables
	$exam_id = $_GET["id"];
  $total_Scores=[];
  $total_weight = 0;
  $questions_graded = [];
  echo "GRADING: exam_id = ".$exam_id;
  
  $url = "https://web.njit.edu/~as2487/cs490/beta/getUserAnswersByExamId.php?id=" . $exam_id;
  $all_userAnswers = getData($url);
  $num_Answers = count($all_userAnswers);
 
       
  // gets all user answers for exam
  for ($x = 0; $x < $num_Answers; $x++){
  
    $userAnswer = $all_userAnswers[$x];  
        $answer_id = $userAnswer['answer_id'];
        $question_id = $userAnswer['question_id'];
        $answer_body = $userAnswer['answer_body'];
        $username = $userAnswer['username'];
    
    // gets question weight and body
    $url3 = "https://web.njit.edu/~as2487/cs490/beta/getQuestionById.php?id=" . $question_id;
    $questionInfo = getData($url3);
    $info = $questionInfo[0];
          $question_weight = $info['question_weight'];
          $question_body = $info['question_body'];
          
    $num_testsCorrect = 0;
    $userScore = 0;
    
    
	if (array_key_exists($question_id, $questions_graded))
      {
      
      }
      else
      {
       $total_weight += $question_weight;
	$questions_graded[$question_id]=$question_id;
      }

    $url2 = "https://web.njit.edu/~as2487/cs490/beta/getTestCaseByQuestionId.php?id=" . $question_id;
    $all_testCases = getData($url2);
    $num_testCases = count($all_testCases);
    
    // gets all test cases for question
    for ($y = 0; $y < $num_testCases; $y++){
      
      $testCase = $all_testCases[$y];
          $test_case_id = $testCase['test_case_id'];
          $test_question_id = $testCase['question_id'];
          $test_case = $testCase['test_case'];
          $test_case_answer = $testCase['test_case_answer'];
          
      $answer_Result = "";
      $test_case_result = "false";
            
      
      $function = getFunctionName($question_body);
      $answer_Result = runAnswer($answer_body, $test_case, $function);
      
      //checks if answer is correct
      if ($answer_Result == $test_case_answer) // remove newline characters?
      {
      $num_testsCorrect++;
      $test_case_result = "true";
      $test_case_weight = $question_weight / $num_testCases; 
      }
        
        $returnArray = array(
					'username' => $username,
					'test_case_id' => $test_case_id,
					'question_id' => $question_id,
					'answer_id' => $answer_id,
					'test_case_result' => $test_case_result,
          'test_case_weight' => $test_case_weight, //////////////////////////////////////// Double check what back end looks for
					'exam_id' => $exam_id,
          
          );   
      $returnArray = json_encode($returnArray);
      $url4 = "https://web.njit.edu/~as2487/cs490/beta/storeResult.php";
      postData($url4,$returnArray); 
      
                   
      } // end of test cases loop
     
      $userScore = $question_weight * ($num_testsCorrect/$num_testCases);
      
      //Adds the answer score to the users total.
      if (array_key_exists($username, $total_Scores))
      {
      $total_Scores[$username] += $userScore;
      }
      else
      {
       $total_Scores[$username] = $userScore;
      }
      
  } // end of answers loop
  
  // sets exam grade for every user who took exam
  foreach (array_keys($total_Scores) as $key )
  {
	$grade = ($total_Scores[$key]/$total_weight)*100;
 	 $returnArray1 = array(
					'username' => $key,
					'grade' => $grade,
					'exam_id' => $exam_id,
          ); 
		
	 $returnArray1 = json_encode($returnArray1);          
          $url5 = "https://web.njit.edu/~as2487/cs490/beta/storeUserGrade.php";
          postData($url5,$returnArray1);
  
          }

  
?>
