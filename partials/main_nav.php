<nav id="systemNav" class="navbar navbar-static-top navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/<?php echo $_SESSION['home'];?>?action=home"><b>Home</b></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/<?php echo $_SESSION['home'];?>?action=loans"><b>Loans</b></a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>Books</b><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/<?php echo $_SESSION['home'];?>?action=books">Books</b></li>
          <li><a href="/<?php echo $_SESSION['home'];?>?action=book-copies">Book Copies</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>School</b><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/<?php echo $_SESSION['home'];?>?action=school">School</a></li>
          <li><a href="/<?php echo $_SESSION['home'];?>?action=subjects">Subjects</a></li>
          <li><a href="/<?php echo $_SESSION['home'];?>?action=streams">Streams</a></li>
          <li><a href="/<?php echo $_SESSION['home'];?>?action=classes">Classes</a></li>
          <li><a href="/<?php echo $_SESSION['home'];?>?action=class_levels">Class Levels</a></li>
          <li><a href="/<?php echo $_SESSION['home'];?>?action=students">Students</a></li>
        </ul>
      </li>	
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>Admin</b><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/<?php echo $_SESSION['home'];?>?action=book-States">Book States</a></li>
          <li><a href="/<?php echo $_SESSION['home'];?>?action=email">Email</a></li>
          <li><a href="/<?php echo $_SESSION['home'];?>?action=users">Users</a></li>
        </ul>
      </li>	
      <li><a href="/<?php echo $_SESSION['home'];?>?action=reports"><b>Reports</b></a></li>  
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-question-sign"></span></a>
        <ul class="dropdown-menu">
          <li><a data-keyboard="false" href="#aboutM" data-toggle="modal" data-backdrop="static"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;About</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="../docs/manual.pdf" target="_blank"><span class="glyphicon glyphicon-book"></span>&nbsp;Manual</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['loggedUsername']; ?> <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a data-keyboard="false" href="#selfChangePasswordM" data-toggle="modal" data-backdrop="static"><span class="glyphicon glyphicon-refresh"></span>&nbsp;Change Password</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="/<?php echo $_SESSION['home'];?>"><b><span class="glyphicon glyphicon-off"></span> Logout</b></a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>