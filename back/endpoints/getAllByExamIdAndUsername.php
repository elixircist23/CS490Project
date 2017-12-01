<?php

	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');
	mysql_select_db('as2487');

	if($link == false){
		die('error');
	}

	$exam_id = $_GET['id'];
	$username = $_GET['user'];
<<<<<<< HEAD
	
	$query = sprintf('select distinct UserAnswers.answer_body, Questions.question_id, Questions.question_weight, Questions.question_body, UserAnswers.comment, TestCases.test_case,
	TestCases.test_case_answer, Results.test_case_weight, Results.test_case_user, Results.test_case_result from Questions, UserAnswers, TestCases, Results, Exams
	where Questions.question_id = UserAnswers.question_id and TestCases.question_id = Questions.question_id and TestCases.test_case_id =
	Results.test_case_id and Exams.exam_id = %s and UserAnswers.username = "%s" and UserAnswers.exam_id = Exams.exam_id and
	UserAnswers.question_id = Questions.question_id and UserAnswers.question_id = Exams.question_id;', $exam_id, $username);

	$result = mysql_query($query);
	$returnArray = array();
	
	$cnt = 0;
	while($row = mysql_fetch_array($result)){
		$cnt++;
=======

	$query = sprintf('select Questions.question_id, Questions.question_body, Questions.question_weight, UserAnswers.answer_body,Results.test_case_result, UserAnswers.comment, Results.username from Questions, UserAnswers, Results, Exams where Results.username = "%s" and Exams.exam_id = %s and Exams.question_id = Questions.question_id and Questions.question_id = UserAnswers.question_id and Results.question_id = Questions.question_id;', $username, $exam_id);

	$result = mysql_query($query);
	$returnArray = array();

	while($row = mysql_fetch_array($result)){
>>>>>>> 0e4aad9a7d068b0e4f4f87d0af885a1ecc90a367
		$qid = $row['question_id'];
		$qbody = $row['question_body'];
		$qweight = $row['question_weight'];
		$abody = $row['answer_body'];
		$comment = $row['comment'];
<<<<<<< HEAD
		$test_case_weight = $row['test_case_weight'];
		$a = array();
		array_push($a, array($row['test_case'], $row['test_case_result'], $row['test_case_user'], $row['test_case_answer'],$row['test_case_weight']));
		while($row2 = mysql_fetch_array($result)){
			$cnt++;
			if($qid == $row2['question_id']){
				array_push($a, array($row2['test_case'], $row2['test_case_result'],$row2['test_case_user'], $row2['test_case_answer'],
				$row2['test_case_weight']));
			} else{
				$cnt--;
				mysql_data_seek($result, $cnt);
=======
		$a = array();
		array_push($a, $row['test_case_result']);
		while($row2 = mysql_fetch_array($result)){
			if($qid == $row2['question_id']){
				array_push($a, $row2['test_case_result']);
			} else{
>>>>>>> 0e4aad9a7d068b0e4f4f87d0af885a1ecc90a367
				break;
			}
		}
		$returnArray[] = array(
			'question_id' => $qid,
			'question_body' => $qbody,
			'question_weight' => $qweight,
			'answer_body' => $abody,
			'comment' => $comment,
			'testcases' => $a
		);
	}

	echo json_encode($returnArray);
<<<<<<< HEAD

=======
>>>>>>> 0e4aad9a7d068b0e4f4f87d0af885a1ecc90a367
?>
