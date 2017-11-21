<?php

	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');
	mysql_select_db('as2487');

	if($link == false){
		die('error');
	}

	$exam_id = $_GET['id'];
	$username = $_GET['user'];

	$query = sprintf('select Questions.question_id, Questions.question_body, Questions.question_weight, UserAnswers.answer_body,Results.test_case_result, UserAnswers.comment, Results.username from Questions, UserAnswers, Results, Exams where Results.username = "%s" and Exams.exam_id = %s and Exams.question_id = Questions.question_id and Questions.question_id = UserAnswers.question_id and Results.question_id = Questions.question_id;', $username, $exam_id);

	$result = mysql_query($query);
	$returnArray = array();

	while($row = mysql_fetch_array($result)){
		$qid = $row['question_id'];
		$qbody = $row['question_body'];
		$qweight = $row['question_weight'];
		$abody = $row['answer_body'];
		$comment = $row['comment'];
		$a = array();
		array_push($a, $row['test_case_result']);
		while($row2 = mysql_fetch_array($result)){
			if($qid == $row2['question_id']){
				array_push($a, $row2['test_case_result']);
			} else{
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
?>
