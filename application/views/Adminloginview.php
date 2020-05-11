<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style1.css">
</head>
<h1>Admin Login</h1>
<body>
	<form method="POST" action="<?php echo base_url(); ?>AdminC/form_validation">
		<div class="image">
			<img src="<?php echo base_url(); ?>assets/images/admin.jpg" alt="Avatar" class="avatar">
		</div>
		<br>
		<div class="container">
			<center>
				<input type="text" name="username" placeholder="Enter Username" >
				<span class="text-danger"><?php echo form_error("username"); ?></span>

				<input type="password" name="password" placeholder="Enter Password" ><br><br>
				<span class="text-danger"><?php echo form_error("password"); ?></span>
			</center>
			<center>
				<button type="submit" class="submit" name="sub_btn">Login</button><br><br>
				<a href="<?php echo base_url(); ?>AdminC/loadstudentview">Student's Login</a>
				&emsp;&emsp;<a href="<?php echo base_url(); ?>AdminC/loadteacherview">Teacher's Login</a>
			</center>
		</div>
	</form>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>