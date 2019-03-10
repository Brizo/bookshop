<nav id="systemNav" class="navbar navbar-static-top navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/<?php echo $_SESSION['home'];?>?action=home"><b><span class="glyphicon glyphicon-home"></span> Home</b></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="<?php if ($_SESSION['page'] == 'loans' || $_SESSION['page'] == 'new-loan' || $_SESSION['page'] == 'edit-loan' 
          || $_SESSION['page'] == 'delete-loan' || $_SESSION['page'] == 'return-loan') {echo 'active';} ?>">
        <a href="/<?php echo $_SESSION['home'];?>?action=loans"><b><span class="glyphicon glyphicon-euro"></span> Loans</b></a>
      </li>
      <li class="dropdown <?php if ($_SESSION['page'] == 'books' || $_SESSION['page'] == 'new-book' || $_SESSION['page'] == 'edit-book' || 
          $_SESSION['page'] == 'delete-book' || $_SESSION['page'] == 'book-copies' || $_SESSION['page'] == 'new-book-copy' ||
          $_SESSION['page'] == 'edit-book-copy' || $_SESSION['page'] == 'delete-book-copy' || $_SESSION['page'] == 'replace-book-copy') {echo 'active';} ?>">
        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b><span class="glyphicon glyphicon-book"></span> Books</b><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/<?php echo $_SESSION['home'];?>?action=books">Books</b></li>
          <li><a href="/<?php echo $_SESSION['home'];?>?action=book-copies">Book Copies</a></li>
        </ul>
      </li>
      <li class="dropdown <?php if ($_SESSION['page'] == 'subjects' || $_SESSION['page'] == 'new-subject' || $_SESSION['page'] == 'edit-subject' || 
          $_SESSION['page'] == 'delete-subject' || $_SESSION['page'] == 'streams' || $_SESSION['page'] == 'new-stream' ||
          $_SESSION['page'] == 'edit-stream' || $_SESSION['page'] == 'delete-stream' || $_SESSION['page'] == 'stream-subjects' ||
          $_SESSION['page'] == 'new-stream-subject' || $_SESSION['page'] == 'subject-books' || $_SESSION['page'] == 'new-subject-book' || 
          $_SESSION['page'] == 'students' || $_SESSION['page'] == 'new-student' || $_SESSION['page'] == 'edit-student' ||
          $_SESSION['page'] == 'delete-student' || $_SESSION['page'] == 'classes' || $_SESSION['page'] == 'new-class' ||
          $_SESSION['page'] == 'edit-class' || $_SESSION['page'] == 'delete-class' || $_SESSION['page'] == 'class_levels' || 
          $_SESSION['page'] == 'new-class_level' || $_SESSION['page'] == 'edit-class_level' || $_SESSION['page'] == 'delete-class_level' ||
          $_SESSION['page'] == 'school') {echo 'active';} ?>">
        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b><span class="glyphicon glyphicon-education"></span> School</b><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/<?php echo $_SESSION['home'];?>?action=school">School</a></li>
          <li><a href="/<?php echo $_SESSION['home'];?>?action=subjects">Subjects</a></li>
          <li><a href="/<?php echo $_SESSION['home'];?>?action=streams">Streams</a></li>
          <li><a href="/<?php echo $_SESSION['home'];?>?action=classes">Classes</a></li>
          <li><a href="/<?php echo $_SESSION['home'];?>?action=class_levels">Class Levels</a></li>
          <li><a href="/<?php echo $_SESSION['home'];?>?action=students">Students</a></li>
        </ul>
      </li>	
      <li class="dropdown <?php if ($_SESSION['page'] == 'email' || $_SESSION['page'] == 'users' || $_SESSION['page'] == 'new-user' || 
          $_SESSION['page'] == 'edit-user' || $_SESSION['page'] == 'delete-user' || $_SESSION['page'] == 'change-password' ||
          $_SESSION['page'] == 'book-states' || $_SESSION['page'] == 'new-book_state' || $_SESSION['page'] == 'edit-book_state' ||
          $_SESSION['page'] == 'delete-book_state') {echo 'active';} ?>">
        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b><span class="glyphicon glyphicon-wrench"></span> Admin</b><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/<?php echo $_SESSION['home'];?>?action=book-states">Book States</a></li>
          <li><a href="/<?php echo $_SESSION['home'];?>?action=email">Email</a></li>
          <li><a href="/<?php echo $_SESSION['home'];?>?action=users">Users</a></li>
        </ul>
      </li>	
      <li class="<?php if ($_SESSION['page'] == 'reports' || $_SESSION['page'] == 'loaned-books_r' || $_SESSION['page'] == 'lost-books_r' || 
          $_SESSION['page'] == 'returned-books_r' || $_SESSION['page'] == 'new-books_r' || $_SESSION['page'] == 'replaced-books_r' ||
          $_SESSION['page'] == 'student_statement' || $_SESSION['page'] == 'student_statement_r') {echo 'active';} ?>">
        <a href="/<?php echo $_SESSION['home'];?>?action=reports"><b><span class="glyphicon glyphicon-list-alt"></span> Reports</b></a>
      </li>  
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-question-sign"></span></a>
        <ul class="dropdown-menu">
          <li><a data-keyboard="false" href="#aboutM" data-toggle="modal" data-backdrop="static"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;About</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="/<?php echo $_SESSION['home'];?>/docs/manual.pdf" target="_blank"><span class="glyphicon glyphicon-book"></span>&nbsp;Manual</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['loggedUsername']; ?> <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a data-keyboard="false" href="#selfChangePasswordM" data-toggle="modal" data-backdrop="static"><span class="glyphicon glyphicon-refresh"></span>&nbsp;Change Password</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="/<?php echo $_SESSION['home'];?>"><b><span class="glyphicon glyphicon-log-out"></span> Logout</b></a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>