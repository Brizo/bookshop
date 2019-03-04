<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function getStudents() {
		$conn = openCon();
		$sql = "SELECT `first_name`, `middle_name`, `last_name`, `national_id`, `birth_date`,
			`gender`, `class`, `stream`, `class_level`, `student_no`, `contact_no`, `email_address`  FROM `students` WHERE `status` != 0";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getStudentByField($field, $value) {
		$conn = openCon();

		if ($field == "id" || $field == "state" || $field == "status" || $field == "last_modified_by") {
			$sql = "SELECT S.id, S.name, S.description, S.isb, S.year, S.author, S.bar_code, S.name `state`, CASE WHEN B.status = 1 THEN 'active' ELSE 'replaced' END `status`
				FROM `students` S
				LEFT JOIN book_states C ON S.state = C.id
				WHERE S.{$field} = {$value}";
		} else {
			$sql = "SELECT B.id, B.name, B.description, B.isb, B.year, B.author, B.bar_code, S.name `state`, CASE WHEN B.status = 1 THEN 'active' ELSE 'replaced' END `status`
				FROM `students` B
				LEFT JOIN book_states S ON B.state = S.id
				WHERE B.{$field} = '{$value}'";
		}
		
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}


	function addStudent($first_name, $middle_name, $last_name, $national_id, $birth_date, $gender, $class, $stream, $class_level, $student_no, $contact_no, $email_address) {
		$conn = openCon();
		$created_at = getTime();
		$last_modified_by = $_SESSION['loggedUserId'];
		$status = 1; // 1 = active, 0 = removed
		$sql = "INSERT INTO `students`(`first_name`, `middle_name`, `last_name`, `national_id`, `birth_date`,
		`gender`, `class`, `stream`, `class_level`, `student_no`, `contact_no`, `email_address`, `status`, `created_at`, `last_modified_by`) 
			VALUES('{$first_name}',
				'{$middle_name}',
				'{$last_name}',
				'{$national_id}',
				'{$birth_date}',
				'{$gender}',
				{$class},
				{$stream},
				{$class_level},
				'{$student_no}',
				{$contact_no},
				'{$email_address}',
				{$status},
				'{$created_at}',
				{$last_modified_by})";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function updateStudent($id, $first_name, $middle_name, $last_name, $national_id, $birth_date, $gender, $class, $stream, $class_level, $student_no, $contact_no, $email_address) {
		$conn = openCon();
		$created_at = getTime();
		$last_modified_by = $_SESSION['loggedUserId'];

		$sql = "UPDATE `students`
			SET `first_name` = '{$first_name}', 
				`middle_name` = '{$middle_name}', 
				`last_name` = '{$last_name}', 
				`national_id` = '{$national_id}', 
				`birth_date` = '{$birth_date}', 
				`gender` = '{$gender}', 
				`class` = {$class},
				`stream` = {$stream},
				`class_level` = {$class_level},
				`student_no` = {$student_no},
				`contact_no` = {$contact_no},
				`email_address` = {$email_address},
				`created_at` = '{$created_at}', 
				`last_modified_by` = {$last_modified_by}
			WHERE id = {$id}";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function removeStudent($id, $reason) {
		$conn = openCon();
		$sql = "UPDATE `students` SET `status` = 0, `reason` = '{$reason}' WHERE `id` = {$id}";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>