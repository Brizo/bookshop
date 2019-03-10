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

				// book copies
				case "book-copies":
					$destination="components/book-copies/retrieve.php";
					break;

				case "new-book-copy":
					$destination="components/book-copies/create.php";
					break;

				case "edit-book-copy":
					$destination="components/book-copies/update.php";
					break;
			
				case "delete-book-copy":
					$destination="components/book-copies/delete.php";
					break;
				
				case "replace-book-copy":
					$destination="components/book-copies/replace.php";
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

				case "return-loan":
					$destination="components/loans/return.php";
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

				// stream subjects
				case "stream-subjects":
					$destination="components/stream-subjects/retrieve.php";
					break;

				case "new-stream-subject":
					$destination="components/stream-subjects/create.php";
					break;
				
				// subject books
				case "subject-books":
					$destination="components/subject-books/retrieve.php";
					break;

				case "new-subject-book":
					$destination="components/subject-books/create.php";
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

				// users
				case "users":
					$destination="components/users/retrieve.php";
					break;

				case "new-user":
					$destination="components/users/create.php";
					break;

				case "edit-user":
					$destination="components/users/update.php";
					break;
			
				case "delete-user":
					$destination="components/users/delete.php";
					break;

				case "change-password":
					$destination="components/users/changepass.php";
					break;

				// book States
				case "book-states":
					$destination="components/book-states/retrieve.php";
					break;

				case "new-book_state":
					$destination="components/book-states/create.php";
					break;

				case "edit-book_state":
					$destination="components/book-states/update.php";
					break;
			
				case "delete-book_state":
					$destination="components/book-states/delete.php";
					break;

				// home
				case "home":
					$destination="components/home/retrieve.php";
					break;
				
				// account
				case "school":
					$destination="components/school/retrieve.php";
					break;

				// email
				case "email":
					$destination="components/email/retrieve.php";
					break;
			
				// reports
				case "reports":
					$destination="components/reports/retrieve.php";
					break;
				
				case "loaned-books_r":
					$destination="components/reports/loaned_books.php";
					break;
				
				case "lost-books_r":
					$destination="components/reports/lost_books.php";
					break;

				case "returned-books_r":
					$destination="components/reports/returned_books.php";
					break;

				case "new-books_r":
					$destination="components/reports/new_books.php";
					break;

				case "replaced-books_r":
					$destination="components/reports/replaced_books.php";
					break;

				case "student_statement":
					$destination="components/reports/student_statement.php";
					break;
				
				case "student_statement_r":
					$destination="components/reports/new_std_statement.php";
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