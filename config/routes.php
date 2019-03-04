<?php

	function getRoute() {
		if (isset($_GET['action']) && isset($_SESSION['logged'])) {
			$_SESSION['page'] = $_GET['action'];
			switch ($_GET['action']) {
				// books
				case "books":
					$destination="components/books/retrieve.php";
					break;

				case "new-book":
					$destination="components/books/create.php";
					break;

				case "edit-book":
					$destination="components/books/update.php";
					break;
			
				case "delete-book":
					$destination="components/books/delete.php";
					break;


				// book loans
				case "loans":
					$destination="components/loans/retrieve.php";
					break;

				case "new-loan":
					$destination="components/loans/create.php";
					break;

				case "edit-loan":
					$destination="components/loans/update.php";
					break;
			
				case "delete-loan":
					$destination="components/loans/delete.php";
					break;
				

				// subjects
				case "subjects":
					$destination="components/subjects/retrieve.php";
					break;

				case "new-subject":
					$destination="components/subjects/create.php";
					break;

				case "edit-subject":
					$destination="components/subjects/update.php";
					break;
			
				case "delete-subject":
					$destination="components/subjects/delete.php";
					break;

				// streams
				case "streams":
					$destination="components/streams/retrieve.php";
					break;

				case "new-stream":
					$destination="components/streams/create.php";
					break;

				case "edit-stream":
					$destination="components/streams/update.php";
					break;
			
				case "delete-stream":
					$destination="components/streams/delete.php";
					break;
				
				
				// students
				case "students":
					$destination="components/students/retrieve.php";
					break;

				case "new-student":
					$destination="components/students/create.php";
					break;

				case "edit-student":
					$destination="components/students/update.php";
					break;
			
				case "delete-student":
					$destination="components/students/delete.php";
					break;

				
				// classes
				case "classes":
					$destination="components/classes/retrieve.php";
					break;

				case "new-class":
					$destination="components/classes/create.php";
					break;

				case "edit-class":
					$destination="components/classes/update.php";
					break;
			
				case "delete-class":
					$destination="components/classes/delete.php";
					break;

				
				// class levels
				case "class_levels":
					$destination="components/class-levels/retrieve.php";
					break;

				case "new-class_level":
					$destination="components/class-levels/create.php";
					break;

				case "edit-class_level":
					$destination="components/class-levels/update.php";
					break;
			
				case "delete-class_level":
					$destination="components/class-levels/delete.php";
					break;

				case "home":
					$destination="components/home/retrieve.php";
					break;
				
				
				// account
				case "school":
					$destination="components/school/retrieve.php";
					break;
				
				case "admin":
					$destination="components/admin/retrieve.php";
					break;
				
				case "reports":
					$destination="components/reports/retrieve.php";
					break;
						
				default:
					$destination="components/home/retrieve.php";
					break;
			}
		} else {
			session_destroy();
			$destination = "components/authorization/login.php";
		}

		return $destination;
	}

?>