<?php
include_once('../../DBcontroller.php');

session_start();
if(isset($_SESSION['account0'])){


$sql=$db->query("SELECT * FROM customers ORDER BY customerName ASC");
$sql->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>X LIST</title>
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
	<center><h3> LIST OF OUTSTANDING DRAGONS </h3>
		<p> The following list of companies and individuals have failed to settle and negotiate on any terms that will clear their outstanding accounts with Subic Bay Metropolitan Authority (SBMA). </p>
	</center>
<div class="container">
	<div class="row col-md-12">

		<button onclick="window.location='../index.php'" type="button" class="btn btn-success pull-left" style="background-color: #2eb873"> <span class="fa fa-arrow-left"></span> Back</button>

		<button type="button" class="btn btn-success pull-left" name="add" id="add" data-toggle="modal" data-target="#addModal" style="background-color: #2eb873; margin-left: 30px"> <span class="fa fa-plus"></span> Add Record </button>

	</div>
</div>
<br>	
<div class="container">
	<div class="table-responsive" style="border: 1px solid black">
		<table class="table table-bordered" style="border-left: 1px solid black">
			<tr style="background-color: #2eb873; color: white; border-top: 3px solid black; border-bottom: 3px solid black">
				<th>Name</th>
				<th>Note(s)</th>
				<!-- <th>View</th> -->
				<th>Action</th>
			</tr>
			<?php
			foreach ($sql as $emp) {?>
			<tr>
				<td><?=$emp['customerName']?></td>
				<td><?=$emp['customerNotes']?></td>
<!-- 				<td>
					<button type="button" name="view" value="view" id="<?=$emp['customerID']?>" class="btn btn-primary view_data">
						<i class="glyphicon glyphicon-eye-open"></i>
					</button> 
				</td> -->
				<td>
<!-- 					<button type="button" name="edit" value="edit" id="<?=$emp['customerID']?>" class="btn btn-info edit_data">
						<i class="glyphicon glyphicon-edit"> Edit </i>
					</button> -->

					<button type="button" name="delete" value="delete" id="<?=$emp['customerID']?>" class="btn btn-danger del_data">
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
				<h4 class="modal-title">Add Record</h4>
			</div>

			<div class="modal-body">
				
				<div class="form-group">
					<label>Name of Company/Individual</label>
					<input type="text" name="name" id="name" class="form-control">
				</div>

				<div class="form-group">
					<label>Note(s)</label>
					<input type="textarea" name="notes" id="notes" class="form-control">
				</div>
				
			</div>
			<div class="modal-footer">
				<input type="hidden" name="employee_id" id="employee_id">
				<input type="submit" name="insert" id="insert" value="Save" class="btn btn-success">
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
			var cust_id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this record?")){
				$.ajax({
					url: "delete.php",
					method: "POST",
					data: {cust_id:cust_id},
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