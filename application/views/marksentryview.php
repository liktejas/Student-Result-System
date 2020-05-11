<!-- <h1>Welcome <?php //echo $this->session->userdata('username'); ?></h1> -->
<!DOCTYPE html>
<html>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><?php echo $this->session->userdata('username'); ?> Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>TeacherC/logout">Logout <span class="sr-only">(current)</span></a>
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
	<title>Students Marks Entry</title>
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
                <h1>Student Marks
                    <small>List</small>
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add Student Marks</a></div>
                </h1>
            </div>
            <table class="table table-striped table-hover" id="mydata">
                <thead class="thead-dark">
                    <tr>
                        <th class="data grid_edit click2">Roll No.</th>
                        <th>Subject 1</th>
                        <th>Subject 2</th>
                        <th>Subject 3</th>
                        <th>Subject 4</th>
                        <th>Subject 5</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Student Marks</h5>
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
                            <label class="col-md-2 col-form-label">Subject1 <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="sub1" id="sub1" class="form-control" placeholder="Subject1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Subject2 <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="sub2" id="sub2" class="form-control" placeholder="Subject2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Subject3 <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="sub3" id="sub3" class="form-control" placeholder="Subject3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Subject4 <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="sub4" id="sub4" class="form-control" placeholder="Subject4">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Subject5 <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="sub5" id="sub5" class="form-control" placeholder="Subject5">
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Student Marks</h5>
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
                            <label class="col-md-2 col-form-label">Subject1 <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="sub1_edit" id="sub1_edit" class="form-control" placeholder="Subject1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Subject2 <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="sub2_edit" id="sub2_edit" class="form-control" placeholder="Subject2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Subject3 <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="sub3_edit" id="sub3_edit" class="form-control" placeholder="Subject3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Subject4 <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="sub4_edit" id="sub4_edit" class="form-control" placeholder="Subject4">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Subject5 <font class="text-danger">*</font></label>
                            <div class="col-md-10">
                              <input type="text" name="sub5_edit" id="sub5_edit" class="form-control" placeholder="Subject5">
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete Student Marks</h5>
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
		show_entrymarks(); //call function show all students marks filled by teacher

		var mydata = $('#mydata').dataTable({
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });

        //function show all students marks filled by teacher
		function show_entrymarks(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo site_url('TeacherC/studentmarks_data')?>',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
		                  		'<td>'+data[i].rollno+'</td>'+
		                        '<td>'+data[i].sub1+'</td>'+
		                        '<td>'+data[i].sub2+'</td>'+
		                        '<td>'+data[i].sub3+'</td>'+
		                        '<td>'+data[i].sub4+'</td>'+
		                        '<td>'+data[i].sub5+'</td>'+
		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-rollno="'+data[i].rollno+'" data-sub1="'+data[i].sub1+'" data-sub2="'+data[i].sub2+'" data-sub3="'+data[i].sub3+'" data-sub4="'+data[i].sub4+'" data-sub5="'+data[i].sub5+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-rollno="'+data[i].rollno+'">Delete</a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}

		//Save Student Marks
        $('#btn_save').on('click',function(){
            var rollno = $('#rollno').val();
            var sub1 = $('#sub1').val();
            var sub2 = $('#sub2').val();
            var sub3 = $('#sub3').val();
            var sub4 = $('#sub4').val();
            var sub5 = $('#sub5').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('TeacherC/studentmarks_save')?>",
                dataType : "JSON",
                data : {rollno:rollno , sub1:sub1, sub2:sub2, sub3:sub3, sub4:sub4, sub5:sub5},
                success: function(data){
                    //location.reload();
                    $('[name="rollno"]').val("");
                    $('[name="sub1"]').val("");
                    $('[name="sub2"]').val("");
                    $('[name="sub3"]').val("");
                    $('[name="sub4"]').val("");
                    $('[name="sub5"]').val("");
                    $('#Modal_Add').modal('hide');
                    alert("Student Marks Added Successfully");
                    show_entrymarks();
                }
            });
            return false;
        });


        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var rollno = $(this).data('rollno');
            var sub1 = $(this).data('sub1');
            var sub2 = $(this).data('sub2');
            var sub3 = $(this).data('sub3');
            var sub4 = $(this).data('sub4');
            var sub5 = $(this).data('sub5');
            
            $('#Modal_Edit').modal('show');
            $('[name="rollno_edit"]').val(rollno);
            $('[name="sub1_edit"]').val(sub1);
            $('[name="sub2_edit"]').val(sub2);
            $('[name="sub3_edit"]').val(sub3);
            $('[name="sub4_edit"]').val(sub4);
            $('[name="sub5_edit"]').val(sub5);
        });

        //update record to database
         $('#btn_update').on('click',function(){
            var rollno = $('#rollno_edit').val();
            var sub1 = $('#sub1_edit').val();
            var sub2 = $('#sub2_edit').val();
            var sub3 = $('#sub3_edit').val();
            var sub4 = $('#sub4_edit').val();
            var sub5 = $('#sub5_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('TeacherC/studentmarks_update')?>",
                dataType : "JSON",
                data : {rollno:rollno , sub1:sub1, sub2:sub2, sub3:sub3, sub4:sub4, sub5:sub5},
                success: function(data){
                    //location.reload();
                    $('[name="rollno_edit"]').val("");
                    $('[name="sub1_edit"]').val("");
                    $('[name="sub2_edit"]').val("");
                    $('[name="sub3_edit"]').val("");
                    $('[name="sub4_edit"]').val("");
                    $('[name="sub5_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    alert("Student Marks Edited Successfully");
                    show_entrymarks();
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
                url  : "<?php echo site_url('TeacherC/studentmarks_delete')?>",
                dataType : "JSON",
                data : {rollno:rollno},
                success: function(data){
                    //location.reload();
                    $('[name="rollno_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    alert("Student Marks Deleted Successfully");
                    show_entrymarks();
                }
            });
            return false;
        });

    });//jQuery Script

</script>
</body>
</html>