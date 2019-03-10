<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            <h4 class="panel-title">Reports List</h4>
        </div>
    </div>
    <div class="panel-body">
        <ul class="sidenav">
            <li><a href="/<?php echo $_SESSION['home'];?>?action=loaned-books_r"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Borrowed Books</a></li>
            <li><a href="/<?php echo $_SESSION['home'];?>?action=lost-books_r"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Lost Books</a></li>
            <li><a href="/<?php echo $_SESSION['home'];?>?action=returned-books_r"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Books On Stock</a></li>
            <li><a href="/<?php echo $_SESSION['home'];?>?action=new-books_r"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;New Books</a></li>
            <li><a href="/<?php echo $_SESSION['home'];?>?action=replaced-books_r"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Replaced Books</a></li>
            <li><a href="/<?php echo $_SESSION['home'];?>?action=student_statement_r"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Student Statement</a></li>
        </ul>
    </div>
</div>