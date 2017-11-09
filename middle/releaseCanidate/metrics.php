<?php
  /*
Kb295 - middle - login.php
Kevin Butryn
*/

// function to curl data from backend passing url with input 
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

// start of script

 $id = $_GET["id"];
 
 
 // variable decleration
 $max_grade = -999;
 $min_grade = 1000;
 $avg_grade = 0;
 $exam_grade = 0;
 $question_data = [];
 
 // url to get array of exams
 $url = $id; ///////////////////////////////////////////////get url
 $all_exam_results = getData($url);
 
 $num_exams = count($all_exam_results);
    
  // iterate through every exam
  for ($x = 0; $x < $num_exams; $x++){
  
    // get data from exam
      $user_exam = $all_exam_results[$x];  
      // example output//////////////////////////////////////////////////////////////////////////
        $exam_grade = $user_exam['grade'];
        $exam_user = $user_exam['user'];
        
        
     // look for new max   
      if ($max_grade < $exam_grade)
      {
        $max_grade = $exam_grade;
      }
     // look for new min
      if ($min_grade > $exam_grade)
      {
        $min_grade = $exam_grade;
      }
      
      $total_grades += $exam_grade;
      
      
      
      //url to get array of questions
      $url = $exam_user,$id; ///////////////////////////////////////////////get url 
      // need to make new endpoint to get grade of quesiton(takes quesiton id and username)
      
      $question_results = getData($url);
      
      $num_questions = count($question_results);
      
      // iterate through every qeustion
      for ($y = 0; $y < $num_qustions; $y++)
      {
        $question = $question_results[$y];
          $question_grade = $question['grade'];
          $question_id = $question['id'];
          
          //add question grade to question_data[]
      }
      
    }
    
    //iterate over question_data[] and divide by num_exams, then again by question_weight to get percentage
    // save in same array
    
 $avg_grade = ($total_grades/ $num_exams);
 
 $returnArray = array(
					'max_grade' => $max_grade,
					'min_grade' => $min_grade,
					'avg_grade' => $avg_grade,
          'tot_exams' => $num_exams,
          'question_data' => $question_data;
)					
 
 $returnArray = json_encode($returnArray);
	echo $returnArray;
?>