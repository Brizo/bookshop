<?php
    include "controller.php";
?>
<div class="panel panel-primary">
	<div class="panel-heading">
    	<b>Users</b>
    </div>
	<div class="panel-body">
		<h1>Listing users</h1>

		<table id="userTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $users = array();
                    $queryResult = retrieveUsers();
                    while ($row = mysqli_fetch_array($queryResult)) {
                        $users[] = $row;
                    }
                ?>

                <?php foreach($users as $row): ?>
                    <tr>
                        <td><?=$row['first_name']?></td>
                        <td><?=$row['last_name']?></td>
                        <td><?=$row['username']?></td>
                        <td><?=$row['role']?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#userTable').dataTable();
    });
</script>