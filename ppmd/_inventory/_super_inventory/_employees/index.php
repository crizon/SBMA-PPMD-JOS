<?php
include_once('../../DBcontroller.php');

session_start();
if(isset($_SESSION['account0'])){

$sql=$db->query("SELECT * FROM employee");
$sql->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>JO Users</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<style type="text/css">
		.rounded{border-radius: 100%; box-shadow: 0px 5px 10px 0px #ccc;}
		td{padding: 1px !important;padding-left: 5px !important;}
		tr:hover{background-color: pink}
		.btn{padding-top: 1px !important;padding-bottom: 1px !important}
	</style>
</head>
<body>
	<br>
	<center><h3> EMPLOYEE LIST </h3></center>
<div class="container">
	<div class="row col-md-12">

		<button onclick="window.location='../index.php'" type="button" class="btn btn-success pull-left" style="background-color: #2eb873"> <span class="fa fa-arrow-left"></span> Back</button>

		<button type="button" class="btn btn-success pull-left" name="add" id="add" data-toggle="modal" data-target="#addModal" style="background-color: #2eb873; margin-left: 30px"> <span class="fa fa-plus"></span> Add Employee </button>

	</div>
</div>
<br>	
<div class="container">
	<div class="table-responsive" style="border: 1px solid black">
		<table class="table table-bordered" style="border-left: 1px solid black">
			<tr style="background-color: #2eb873; color: white; border-top: 3px solid black; border-bottom: 3px solid black">
				<th>ID</th>
				<th>User Name</th>
				<th>Section</th>
				<th>Notes</th>
				<th>Action</th>
			</tr>
			<?php
			foreach ($sql as $emp) {?>
			<tr>
				<td><?=$emp['EmployeeID']?></td>
				<td><?=$emp['EmployeeName']?></td>
				<td><?=$emp['EmployeeSection']?></td>
				<td><?=$emp['Enotes']?></td>
				<td>
					<button type="button" name="delete" value="delete" id="<?=$emp['EmployeeID']?>" class="btn btn-danger del_data">
						<i class="glyphicon glyphicon-trash"></i>
					</button> 
				</td>
			</tr>
			<?php
			}

			?>
		</table>
	</div>
</div>
</body>
</html>
<!-- VIEW DATA -->
<div id="dataModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Employee Details</h4>
			</div>
			<div class="modal-body" id="employee_detail">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<!-- EDIT DATA -->
<div id="editModal" class="modal fade">
	<div class="modal-dialog">
		
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Employee Details</h4>
			</div>
			<div class="modal-body" id="edit_employee_detail">
				
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</form>
	</div>
</div>




<!-- ADD DATA -->
<div id="addModal" class="modal fade">
	<div class="modal-dialog" role="document">
		<!-- content -->
		<form method="post" id="insert_form" action="insert.php">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Employee</h4>
			</div>

			<div class="modal-body">
				
				<div class="form-group">
					<label>Employee Name</label>
					<input type="text" name="employeename" id="employeename" class="form-control">
				</div>

				

				<div class="form-group">
					<label>Section</label>
					<select name="section" id="section" class="form-control">
						<option> </option>
						<option value="0">• ADMIN </option>
						<option value="INVENTORY">• INVENTORY</option>
						<option value="RECEIVING">• RECEIVING</option>
						<option value="ISSUANCE">• ISSUANCE</option>
						<option value="WAREHOUSE">• WAREHOUSE</option>
					</select>
				</div>

				<div class="form-group">
					<label>Notes</label>
					<input type="text" name="notes" id="notes" class="form-control">
				</div>
				
			</div>
			<div class="modal-footer">
				<input type="submit" name="submit" id="insert" value="Save" class="btn btn-success">
				<input type="button" id="close" value="Close" class="btn btn-danger" data-dismiss="modal" onclick="window.location.reload()">
			</div>
		</div>
		</form>
		<!-- end of content -->
	</div>
</div>

<script>
	$(document).ready(function(){

		$(document).on('click', '.del_data', function(){
			var emp_id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this record?")){
				$.ajax({
					url: "delete.php",
					method: "POST",
					data: {emp_id:emp_id},
					success:function(data){
						alert(data);
						window.location.reload();
					}
				})
			}else{
				return false;
			}
		});


/*		$(document).on('click', '.edit_data',function(){
			var cust_id = $(this).attr("id");
			$.ajax({
				url: "edit.php",
				method: "post",
				data: {cust_id:cust_id},
				dataType: "json",
				success:function(data){
					$('#name').val(data.name);
					$('#notes').val(data.address);
					$('#employee_id').val(data.id);
					$('#insert').val("Update");
					$('#close').val("Cancel");
					$('#addModal').modal('show');
				}
			});
		});




		$('.view_data').click(function(){
			var employee_id = $(this).attr("id");

			$.ajax({
				url: "select.php",
				method: "post",
				data:{employee_id:employee_id},
				success:function(data){
					$('#employee_detail').html(data);
					$('#dataModal').modal("show");
				}
			})

			$('#dataModal').modal("show");
		});*/

	});
</script>




<?php
}else{
  header('location:../index.php');
}
?>   