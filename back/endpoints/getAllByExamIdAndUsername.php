<?php

	$link = mysql_connect('sql.njit.edu', 'as2487', 'QOdKwfpVY');
	mysql_select_db('as2487');

	if($link == false){
		die('error');
	}

	$exam_id = $_GET['id'];
	$username = $_GET['user'];
	
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
		$qid = $row['question_id'];
		$qbody = $row['question_body'];
		$qweight = $row['question_weight'];
		$abody = $row['answer_body'];
		$comment = $row['comment'];
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
