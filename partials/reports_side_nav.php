<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            <h4 class="panel-title">Reports List</h4>
        </div>
    </div>
    <div class="panel-body">
        <ul class="sidenav">
            <li><a href="/<?php echo $_SESSION['home'];?>?action=loans"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Borrowed Books</a></li>
            <li><a href="/<?php echo $_SESSION['home'];?>?action=books"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Lost Books</a></li>
            <li><a href="/<?php echo $_SESSION['home'];?>?action=school"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Returned Books</a></li>
            <li><a href="/<?php echo $_SESSION['home'];?>?action=admin"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;New Books</a></li>
            <li><a href="/<?php echo $_SESSION['home'];?>?action=reports"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Replaced Books</a></li>
            <li><a href="/<?php echo $_SESSION['home'];?>?action=reports"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Student Statement</a></li>
        </ul>
    </div>
</div>