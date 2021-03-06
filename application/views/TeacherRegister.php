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
	<title>Teacher Registration</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
</head>
<body>
	<div class="container">
	<!-- Page Heading -->
    <div class="row">
        <div class="col-12">
            <div class="col-md-12">
                <h1>Teacher
                    <small>List</small>
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New Teacher</a></div>
                </h1>
            </div>
            <table class="table table-striped table-hover" id="mydata">
                <thead class="thead-dark">
                    <tr>
                        <th class="data grid_edit click2">Teacher Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No.</th>
                        <th>Date of Birth.</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add New Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Teacher Id <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="tid" id="tid" class="form-control" placeholder="Teacher Id.">
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
                            <label class="col-md-2 col-form-label">Contact <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact">
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Teacher Id <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="tid_edit" id="tid_edit" class="form-control" placeholder="Teacher Id" readonly>
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
                            <label class="col-md-2 col-form-label">Contact <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="contact_edit" id="contact_edit" class="form-control" placeholder="Contact">
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="tid_delete" id="tid_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->
        
</div>
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
    show_teacher(); //call function show all teacher

    var mydata = $('#mydata').dataTable({
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });

    //function show all teachers
    function show_teacher(){
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo site_url('AdminC/teacher_data')?>',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
                          '<td>'+data[i].tid+'</td>'+
                            '<td>'+data[i].name+'</td>'+
                            '<td>'+data[i].email+'</td>'+
                            '<td>'+data[i].contact+'</td>'+
                            '<td>'+data[i].dob+'</td>'+
                            '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-tid="'+data[i].tid+'" data-name="'+data[i].name+'" data-email="'+data[i].email+'" data-contact="'+data[i].contact+'" data-dob="'+data[i].dob+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-tid="'+data[i].tid+'">Delete</a>'+
                                '</td>'+
                            '</tr>';
                }
                $('#show_data').html(html);
            }

        });
    }

    //Save Teacher
        $('#btn_save').on('click',function(){
            var tid = $('#tid').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var contact = $('#contact').val();
            var dob = $('#dob').val();
            var username = $('#username').val();
            var password = $('#password').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('AdminC/teacher_save')?>",
                dataType : "JSON",
                data : {tid:tid , name:name, email:email, contact:contact, dob:dob, username:username, password:password},
                success: function(data){
                    //location.reload();
                    $('[name="tid"]').val("");
                    $('[name="name"]').val("");
                    $('[name="email"]').val("");
                    $('[name="contact"]').val("");
                    $('[name="dob"]').val("");
                    $('[name="username"]').val("");
                    $('[name="password"]').val("");
                    $('#Modal_Add').modal('hide');
                    alert("Teacher Added Successfully");
                    show_teacher();
                }
            });
            return false;
        });

        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var tid = $(this).data('tid');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var contact = $(this).data('contact');
            var dob = $(this).data('dob');
            var username = $(this).data('username');
            var password = $(this).data('password');
            
            $('#Modal_Edit').modal('show');
            $('[name="tid_edit"]').val(tid);
            $('[name="name_edit"]').val(name);
            $('[name="email_edit"]').val(email);
            $('[name="contact_edit"]').val(contact);
            $('[name="dob_edit"]').val(dob);
            $('[name="username_edit"]').val(username);
            $('[name="password_edit"]').val(password);
        });

        //update record to database
         $('#btn_update').on('click',function(){
            var tid = $('#tid_edit').val();
            var name = $('#name_edit').val();
            var email = $('#email_edit').val();
            var contact = $('#contact_edit').val();
            var dob = $('#dob_edit').val();
            var username = $('#username_edit').val();
            var password = $('#password_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('AdminC/teacher_update')?>",
                dataType : "JSON",
                data : {tid:tid , name:name, email:email, contact:contact, dob:dob, username:username, password:password},
                success: function(data){
                    //location.reload();
                    $('[name="tid_edit"]').val("");
                    $('[name="name_edit"]').val("");
                    $('[name="email_edit"]').val("");
                    $('[name="contact_edit"]').val("");
                    $('[name="dob_edit"]').val("");
                    $('[name="username_edit"]').val("");
                    $('[name="password_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    alert("Teacher Edited Successfully");
                    show_teacher();
                }
            });
            return false;
        });

         //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var tid = $(this).data('tid');
            
            $('#Modal_Delete').modal('show');
            $('[name="tid_delete"]').val(tid);
        });

        //delete record to database
         $('#btn_delete').on('click',function(){
            var tid = $('#tid_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('AdminC/teacher_delete')?>",
                dataType : "JSON",
                data : {tid:tid},
                success: function(data){
                    //location.reload();
                    $('[name="tid_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    alert("Teacher Deleted Successfully");
                    show_teacher();
                }
            });
            return false;
        });

  });//jQuery Script
</script>
</body>
</html>