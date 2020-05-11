<!DOCTYPE html>
<html>
<head>
	<title>Teacher Login</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style1.css">
</head>
<h1>Teacher Login</h1>

<form method="POST" action="<?php echo base_url(); ?>TeacherC/form_validation">
	<div class="image">
		<img src="<?php echo base_url(); ?>assets/images/teacher.png" alt="Avatar" class="avatar">
	</div>
	<br>
	<div class="container">
		<center>
			<input type="text" name="username" placeholder="Enter Username">
			<span class="text-danger"><?php echo form_error("username"); ?></span>

			<input type="password" name="password" placeholder="Enter Password"><br><br>
			<span class="text-danger"><?php echo form_error("password"); ?></span>
		</center>
		<center>
			<button type="submit" class="submit" name="sub_btn">Login</button><br><br>
			<a href="<?php echo base_url(); ?>AdminC/">Admin's Login</a>
			&emsp;&emsp;<a href="<?php echo base_url(); ?>AdminC/loadstudentview">Student's Login</a>
		</center>
	</div>
</form>
<body>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>