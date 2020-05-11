<h1>Welcome <?php echo $this->session->userdata('username'); ?></h1>
<!-- <h3><?php //echo $this->session->userdata('rollno'); ?></h3> -->
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
        <a class="nav-link" href="<?php echo base_url(); ?>StudentC/logout">Logout <span class="sr-only">(current)</span></a>
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
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
                <h1>Student Marks
                    <small>List</small>
                    <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add Student Marks</a></div> -->
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
                        <!-- <th style="text-align: right;">Actions</th> -->
                    </tr>
                </thead>
                <tbody id="show_data">
                    
                </tbody>
            </table>
        </div>
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
		show_result(); //call function show student result

		var mydata = $('#mydata').dataTable({
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });

        //function show student result
		function show_result(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo site_url('StudentC/student_result')?>',
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
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}

    });//jQuery Script 

</script>
</body>
</html>