<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/school/controller.php";
	$accountExist = accountExist();

	if ($accountExist == 1) {
		$getAccountResult = retrieveAccount();
		$account = mysqli_fetch_array($getAccountResult);

		if (!isset($_SESSION['name'])) {
			$_SESSION['aname'] = $account['name'];
		}
		
		if (!isset($_SESSION['contact_person'])) {
			$_SESSION['contact_person'] = $account['contact_person'];
		}

		if (!isset($_SESSION['telephone'])) {
			$_SESSION['telephone'] = $account['telephone'];
		}

		if (!isset($_SESSION['fax'])) {
			$_SESSION['fax'] = $account['fax'];
		}

		if (!isset($_SESSION['email_address'])) {
			$_SESSION['email_address'] = $account['email_address'];
		}

		if (!isset($_SESSION['website'])) {
			$_SESSION['website'] = $account['website'];
		}

		if (!isset($_SESSION['postal_address'])) {
			$_SESSION['postal_address'] = $account['postal_address'];
		}

		if (!isset($_SESSION['physical_address'])) {
			$_SESSION['physical_address'] = $account['physical_address'];
		}

		if (!isset($_SESSION['username_prefix'])) {
			$_SESSION['username_prefix'] = $account['username_prefix'];
		}

		if (!isset($_SESSION['barcode_prefix'])) {
			$_SESSION['barcode_prefix'] = $account['barcode_prefix'];
		}

		if (!isset($_SESSION['barcode_suffix'])) {
			$_SESSION['barcode_suffix'] = $account['barcode_suffix'];
		}

		if (!isset($_SESSION['book_circulation'])) {
			$_SESSION['book_circulation'] = $account['book_circulation'];
		}

		if (!isset($_SESSION['id'])) {
			$_SESSION['id'] = $account['id'];
		}
	}
?>

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<h4 class="panel-title">School Information</h4>
				</div>
			</div>
			<div class="panel-body">
				<div class="col-sm-10">
					<form class="form-horizontal" role="form" action="components/school/controller.php" method="post">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">School Name * :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="aname" name="aname" placeholder="Enter school name" value="<?php  if (isset($_SESSION['aname'])) {echo $_SESSION['aname'];} ?>" />
									</div>
								</div>                   
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Contact Person * :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter  contact person" value="<?php  if (isset($_SESSION['contact_person'])) {echo $_SESSION['contact_person'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Telephone * :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="telephone" name="telephone" placeholder="Enter telephone" value="<?php  if (isset($_SESSION['telephone'])) {echo $_SESSION['telephone'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Fax :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="fax" name="fax" placeholder="Enter fax" value="<?php  if (isset($_SESSION['fax'])) {echo $_SESSION['fax'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Email Address :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="email_address" name="email_address" placeholder="Enter email address" value="<?php  if (isset($_SESSION['email_address'])) {echo $_SESSION['email_address'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Website :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="website" name="website" placeholder="Enter website" value="<?php  if (isset($_SESSION['website'])) {echo $_SESSION['website'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Postal Address * :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="postal_address" name="postal_address" placeholder="Enter postal address" value="<?php  if (isset($_SESSION['postal_address'])) {echo $_SESSION['postal_address'];} ?>" />
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Physical Address * :</label>
									<div class="col-sm-8">
										<textarea rows="4" cols="50" class="form-control" placeholder="Enter physical address" name="physical_address"><?php  if (isset($_SESSION['physical_address'])) {echo $_SESSION['physical_address'];} ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Username Prefix * :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="username_prefix" name="username_prefix" placeholder="Enter username prefix" value="<?php  if (isset($_SESSION['username_prefix'])) {echo $_SESSION['username_prefix'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Book Circulation * :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="book_circulation" name="book_circulation" placeholder="Enter book circulation years" value="<?php  if (isset($_SESSION['book_circulation'])) {echo $_SESSION['book_circulation'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Barcode Prefix * :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="barcode_prefix" name="barcode_prefix" placeholder="Enter 2 character barcode prefix" value="<?php  if (isset($_SESSION['barcode_prefix'])) {echo $_SESSION['barcode_prefix'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Barcode Suffix * :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="barcode_suffix" name="barcode_suffix" placeholder="Enter 2 character barcode suffix" value="<?php  if (isset($_SESSION['barcode_suffix'])) {echo $_SESSION['barcode_suffix'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-4">
										<?php if ($_SESSION['loggedRole'] == 'admin' && $accountExist == 0): ?>
											<button type="submit" class="btn btn-success" name="addnewaccount"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Configure</button>
										<?php endif; ?>
										<?php if ($_SESSION['loggedRole'] == 'admin' && $accountExist == 1): ?>
											<button type="submit" class="btn btn-success" name="updateaccount"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Update</button>
										<?php endif; ?>
										<a href="/bookshop?action=school" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
									</div>
								</div>
							</div>
						</div>              
					</form>
				</div>
			</div>
		</div>
	</div>			
</div>
