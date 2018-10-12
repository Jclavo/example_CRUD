<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
<title>Example - CRUD</title>
<link
	href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css')?>" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<!-- FORM  -->
			<div class="col-md-12">
				<form class="form-horizontal" id="form-edit-user">
					<fieldset>
						<!-- Form Name -->
						<legend>user</legend>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="user-id">Id</label>
							<div class="col-md-4">
								<input id="user-id" name="user-id" type="text"
									placeholder="Id autogenerate" class="form-control input-md">
							</div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="user-name">Name</label>
							<div class="col-md-4">
								<input id="user-name" name="user-name" type="text"
									placeholder="your user's name" class="form-control input-md">
							</div>
						</div>

						<!-- Prepended text-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="user-email">Email</label>
							<div class="col-md-4">
								<div class="input-group">
									<input id="user-email" name="user-email" class="form-control"
										type="text" placeholder="your user's email">
								</div>
							</div>
						</div>
						<!-- Button -->

					</fieldset>
				</form>
				<div class="form-group">
					<label class="col-md-4 control-label" for="btn-save"></label>
					<div class="col-md-4" id="saveupdate">
						<button id="btn-save" name="btn-save" class="btn btn-success"
							onclick="add_user()">Save</button>
					</div>
				</div>
			</div>

			<!-- LIST -->
			<div class=col-md-12>
				List of users
				<table class="table table-bordered table-condensed table-hover">
					<thead>
						<tr>
							<td>Id</td>
							<td>Name</td>
							<th>Email</th>
							<th>Actions</th>
						</tr>

					</thead>
					<tbody id="form-list-user-body">

					</tbody>
				</table>
			</div>
			<br> 
			<!-- view -->
		</div>
	</div>

	<script src="<?php echo base_url('assets/js/jquery/jquery-3.3.1.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('application/views/user/user.js')?>"></script>

</body>
</html>
