<html>
<head>
	<title>Admin's Login</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<div class="jumbotron">
	<center><h1 class="display-3">Welcome <strong><?php echo $this->session->userdata('username'); ?></strong></h1></center>
</div>
<body>
	
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <center>
        <div class="card" style="width: 18rem;">
          <a href="<?php echo base_url(); ?>AdminC/StudentRegisterview">
          <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/student.png" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">Student</h3>
          </div>
          </a>
        </div>
        </center>
      </div>
      <div class="col-md-6">
        <center>
        <div class="card" style="width: 18rem;">
          <a href="<?php echo base_url(); ?>AdminC/TeacherRegisterview">
          <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/teacher1.png" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">Teacher</h3>
          </div>
          </a>
        </div>
        </center>
      </div>
    </div>
 </div>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</html>