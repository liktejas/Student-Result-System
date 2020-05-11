<!DOCTYPE html>
<html>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>AdminC/home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>AdminC/logout">Logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span class="navbar-text">
      <!-- Navbar text with an inline element -->
    </span>
  </div>
</nav>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Student Registration</title>
	<!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
</head>
<body>
	<!-- <h1 class="display-3">Welcome Student</h1> -->
	<div class="container">
	<!-- Page Heading -->
    <div class="row">
        <div class="col-12">
            <div class="col-md-12">
                <h1>Student
                    <small>List</small>
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New Student</a></div>
                </h1>
            </div>
            <table class="table table-striped table-hover" id="mydata">
                <thead class="thead-dark">
                    <tr>
                        <th class="data grid_edit click2">Roll No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="show_data">
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- MODAL ADD -->
            <form id="add_form">
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Roll No <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="rollno" id="rollno" class="form-control" placeholder="Roll No.">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Name <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Date of Birth <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="dob" id="dob" class="form-control" placeholder="Date of Birth (DD/MM/YYYY)" onfocus="(this.type='date')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Username <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Password <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                  	<p style="margin-right:auto;">'<font class="text-danger">*</font>' are mandatory</p>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->

        <!-- MODAL EDIT -->
        <form id="edit_form">
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Roll No. <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="rollno_edit" id="rollno_edit" class="form-control" placeholder="Roll No." readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Name <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="name_edit" id="name_edit" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="email_edit" id="email_edit" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Date of Birth <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="dob_edit" id="dob_edit" class="form-control" placeholder="Date of Birth">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Username <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="username_edit" id="username_edit" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Password <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="password" name="password_edit" id="password_edit" class="form-control" placeholder="Password">
                            </div>
                        </div>

                  </div>
                  <div class="modal-footer">
                  	<p style="margin-right:auto;">'<font class="text-danger">*</font>' are mandatory</p>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->

        <!--MODAL DELETE-->
         <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="rollno_delete" id="rollno_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->
        
</div>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js
"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		show_student(); //call function show all student

		var mydata = $('#mydata').dataTable({
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });

		//function show all students
		function show_student(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo site_url('AdminC/student_data')?>',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
		                  		'<td>'+data[i].rollno+'</td>'+
		                        '<td>'+data[i].name+'</td>'+
		                        '<td>'+data[i].email+'</td>'+
		                        '<td>'+data[i].dob+'</td>'+
		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-rollno="'+data[i].rollno+'" data-name="'+data[i].name+'" data-email="'+data[i].email+'" data-dob="'+data[i].dob+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-rollno="'+data[i].rollno+'">Delete</a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}

		//Save Student
        $('#btn_save').on('click',function(){
            var rollno = $('#rollno').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var dob = $('#dob').val();
            var username = $('#username').val();
            var password = $('#password').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('AdminC/student_save')?>",
                dataType : "JSON",
                data : {rollno:rollno , name:name, email:email, dob:dob, username:username, password:password},
                success: function(data){
                    //location.reload();
                    $('[name="rollno"]').val("");
                    $('[name="name"]').val("");
                    $('[name="email"]').val("");
                    $('[name="dob"]').val("");
                    $('[name="username"]').val("");
                    $('[name="password"]').val("");
                    $('#Modal_Add').modal('hide');
                    alert("Student Added Successfully");
                    show_student();
                }
            });
            return false;
        });

        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var rollno = $(this).data('rollno');
            var name = $(this).data('name');
            var email        = $(this).data('email');
            var dob = $(this).data('dob');
            var username = $(this).data('username');
            var password = $(this).data('password');
            
            $('#Modal_Edit').modal('show');
            $('[name="rollno_edit"]').val(rollno);
            $('[name="name_edit"]').val(name);
            $('[name="email_edit"]').val(email);
            $('[name="dob_edit"]').val(dob);
            $('[name="username_edit"]').val(username);
            $('[name="password_edit"]').val(password);
        });

        //update record to database
         $('#btn_update').on('click',function(){
            var rollno = $('#rollno_edit').val();
            var name = $('#name_edit').val();
            var email = $('#email_edit').val();
            var dob = $('#dob_edit').val();
            var username = $('#username_edit').val();
            var password = $('#password_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('AdminC/student_update')?>",
                dataType : "JSON",
                data : {rollno:rollno , name:name, email:email, dob:dob, username:username, password:password},
                success: function(data){
                    //location.reload();
                    $('[name="rollno_edit"]').val("");
                    $('[name="name_edit"]').val("");
                    $('[name="email_edit"]').val("");
                    $('[name="dob_edit"]').val("");
                    $('[name="username_edit"]').val("");
                    $('[name="password_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    alert("Student Edited Successfully");
                    show_student();
                }
            });
            return false;
        });

        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var rollno = $(this).data('rollno');
            
            $('#Modal_Delete').modal('show');
            $('[name="rollno_delete"]').val(rollno);
        });

        //delete record to database
         $('#btn_delete').on('click',function(){
            var rollno = $('#rollno_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('AdminC/student_delete')?>",
                dataType : "JSON",
                data : {rollno:rollno},
                success: function(data){
                    //location.reload();
                    $('[name="rollno_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    alert("Student Deleted Successfully");
                    show_student();
                }
            });
            return false;
        });        
	})// jQuery script

</script>
</body>
</html>