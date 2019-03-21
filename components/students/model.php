<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function getStudents() {
		$conn = openCon();
		$sql = "SELECT S.id, S.first_name, S.middle_name, S.last_name, S.national_id, S.birth_date, S.gender, S.student_no, 
					C.name class, T.name stream, L.name class_level
				FROM `students` S
				LEFT JOIN streams T ON S.stream = T.id
				LEFT JOIN classes C ON S.class = C.id
				LEFT JOIN class_levels L ON S.class_level = L.id 
				WHERE S.status != 0";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getStudentByField($field, $value) {
		$conn = openCon();

		if ($field == "id" || $field == "class" || $field == "class_level" || $field == "stream" || $field == "status" || $field == "last_modified_by") {
			$sql = "SELECT S.id, S.first_name, S.middle_name, S.last_name, S.national_id, S.birth_date, S.gender, S.student_no, 
					C.name class, T.name stream, L.name class_level
				FROM `students` S
				LEFT JOIN streams T ON S.stream = T.id
				LEFT JOIN classes C ON S.class = C.id
				LEFT JOIN class_levels L ON S.class_level = L.id
				WHERE S.{$field} = {$value}";
		} else {
			$sql = "SELECT S.id, S.first_name, S.middle_name, S.last_name, S.national_id, S.birth_date, S.gender, S.student_no, 
						C.name class, T.name stream, L.name class_level
					FROM `students` S
					LEFT JOIN streams T ON S.stream = T.id
					LEFT JOIN classes C ON S.class = C.id
					LEFT JOIN class_levels L ON S.class_level = L.id
					WHERE S.{$field} = '{$value}'";
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
				'{$contact_no}',
				'{$email_address}',
				{$status},
				'{$created_at}',
				{$last_modified_by})";

		$result = $conn->query($sql);

		$sql = "UPDATE `account_unit` SET `student_no_counter` = `student_no_counter` + 1 WHERE `status` = 1";
		$result = $conn->query($sql);

		closeCon($conn);
		return $result;
	}

	function updateStudent($id, $first_name, $middle_name, $last_name, $national_id, $birth_date, $gender, $class, 
		$stream, $class_level, $contact_no, $email_address) {
		$conn = openCon();
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
				`contact_no` = '{$contact_no}',
				`email_address` = '{$email_address}',
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