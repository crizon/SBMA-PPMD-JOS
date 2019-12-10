<?php
include '../DBController.php';

session_start();
if(isset($_SESSION['account0'])){

$id=$_GET['id'];

	$sql=$db->prepare("SELECT * FROM jo_master WHERE ID=".$id);

	$sql->execute();
	 
	 $row=$sql->fetch(PDO::FETCH_ASSOC)
?>




<!DOCTYPE html>
<html>
<head>
	<title>Update JO Request</title>

	<script src="../vendor/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../vendor/sweetalert2.css">
        <link rel="stylesheet" type="text/css" href="../vendor/animate.css">
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../vendor/elusive-icons.css">
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../w3.css">

        <script type="text/javascript">
			$('#trupa').on('keyup keypress', function(e) {
			  var keyCode = e.keyCode || e.which;
			  if (keyCode === 13) { 
			    e.preventDefault();
			    return false;
			  }
			});
		</script>


		<style type="text/css">

	*{outline: none !important;}

	.bossbox{overflow: hidden;padding: none !important; margin: none !important;border: 1px solid black; border-bottom: none !important}

	.inputX{outline: none !important; background-color: transparent !important; height: 50px; vertical-align: text-bottom !important; text-indent: 25px; width: 100%; margin: none !important;border: none; padding: none !important; font-weight: bold;}

	.inputXXX{outline: none !important; background-color: transparent !important; height: 50px; vertical-align: text-bottom !important; width: 100%; margin: none !important;border: none; padding: none !important; font-size: .85em; font-weight: bold;}

	.labelX{color: gray; background-color: transparent !important; font-size: .75em; margin-top: -50px !important; margin-right: -2px !important;}

	.row{padding: none !important; margin: none !important}

	.mybutt{border:none; border-radius: 3px; height: 30px; padding: none !important; color: white; font-size: 1em; font-weight: bold; box-shadow: 3px 3px 5px 1px rgba(10,10,10,.4); width: 15%}

	.col{margin: none !important; padding: none !important}

	.leftB{border-left: 1px solid black}
	.rightB{border-right: 1px solid black}
	.topB{border-top: 1px solid black}
	.bottomB{border-bottom: 1px solid black}

	form{padding: none !important; margin: none !important}

	input[disabled] {
	  color: black;
	}

	@media print{
		.NBOP{border: none !important}
		.HWP{display: none !important}
		#newJO{font-size: 1.2em !important}
	}



</style>

</head>
<body onload="totalxzs()">









<br>
<div class="container" >
	<div class="row" style="margin: 0 !important">

		<div class="col-2" style="margin: 0 !important">
			<img src="../img/sbma.png" width="65%">
		</div>

		<div class="col-8">
			<center>
				<h6><b>SUBIC BAY METROPOLITAN AUTHORITY</b></h6>
				<h6 style="margin-top: -7px"><b>PROCUREMENT AND PROPERTY MANAGEMENT DEPARTMENT</b></h6>
				<h6 style="margin-top: -7px"><b>PROPERTY DIVISION</b></h6>
				<h6 style="margin-top: -7px; font-size: .75em">Bldg. 709 Burgos Street corner Quezon Streets., Subic Bay Freeport Zone, Philippines 2222</h6>
				<h6 style="margin-top: -7px; font-size: .75em">Telephone Numbers : (047) 252-4219/ 4613/ 4474/ 4046/ 4086/ 4432/ 4238/ 4587/ 4085</h6>
				<h6 style="margin-top: -7px; font-size: .75em">Fax-Line Numbers : (047) 252-4339/ 4432</h6>
				<h6><b>JOB ORDER FORM</b></h6>
			</center>
		</div>

		<div class="col-2">
			<p style="margin-top: -7px; font-size: .65em">Departmental Quality Form <br> PPD-CF-36 <br>Revision Number : 02-2 <br>Effectivity Date : 11-06-2018</p>
		</div>

	</div>


</div>



<div class="container"><!-- 
	<button class="mybutt HWP" style="float: right;" onclick="window.print();"> <span class="fa fa-print"></span> Print </button> -->

	<form action="new_JO_saver.php" method="POST" id="trupa">
		
		<input type="text" name="xID" value="<?=$row['ID']?>" hidden>
		<input type="text" name="xSection" value="<?=$row['SECTION']?>" hidden>
		<input class="inputX" type="text" name="xReceivedBy" value="<?=$row['RECEIVED_BY']?>" hidden>


		<div class="row">

			<div class="bossbox col">
				<p class="labelX" style="margin-top: 0px !important">NATURE OF WORK</p>
				<input class="inputX" name="xNature" type="text" value="<?=$row['NATURE_OF_WORK']?>" readonly>


				
			</div>


			<div class="bossbox col">
				<dir class="row">
					<div class="col">
						<p class="labelX" style="margin-top: 0px !important">JOB ORDER NO.</p>
						<input class="" type="text" name="xJO" value="<?=$row['JOB_ORDER_num']?>" id="newJO" readonly style="background-color: transparent; border: none; font-size: 1.7em">
						
					</div>


					<div class="col">
						<p class="labelX" style="margin-top: 0px !important">STATUS</p>
						<input name="xStatus" value="" hidden>
							<p id="status">• IN PROCESS</p> 

					</div>

				</dir>
			</div>


		</div>




		<div class="row">

			<div class="bossbox col">
				<input class="inputX" type="text" name="xLocation" value="<?=$row['LOCATION']?>">
				<p class="labelX">BLDG. NO./LOCATION</p>
			</div>


			<div class="bossbox col">
				<div class="row">
				
					<div class="col-6">
						<input class="inputX" type="date" name="xDateStart" id="Dstart" readonly value="<?=$row['DATE_STARTED']?>">
						<p class="labelX">DATE STARTED</p>
					</div>

					<div class="col-6 leftB">
						<input class="inputX" type="text" name="xTimeStart" id="Tstart" readonly value="<?=$row['TIME_STARTED']?>">
						<p class="labelX">TIME STARTED</p>
					</div>

				</div>
			</div>

		</div>

		<div class="row">

			<div class="bossbox col">
				<input class="inputX" type="text" name="xRequestingCompany" value="<?=$row['REQUESTING_COMPANY_DEPARTMENT']?>">
				<p class="labelX">REQUESTING DEPARTMENT/COMPANY</p>
			</div>


			<div class="bossbox col">
				<div class="row">
				
					<div class="col-6">
						<input class="inputX" type="date" name="xDateComp" id="toda" value="<?=$row['DATE_COMPLETED']?>">
						<p class="labelX">DATE COMPLETED</p>
					</div>

					<div class="col-6 leftB">
						<input class="inputX" type="time" name="xTimeComp" id="toti" value="<?=$row['TIME_COMPLETED']?>">
						<p class="labelX">TIME COMPLETED</p>
					</div>

					

				</div>
			</div>

		</div>


		<div class="row">

			<div class="bossbox col">
				<input class="inputX" type="text" name="xContactPerson" value="<?=$row['CONTACT_PERSON']?>">
				<p class="labelX">CONTACT PERSON</p>
			</div>

			<div class="bossbox col">
			</div>


		</div>

		
		<div class="row">

			<div class="bossbox col" style="height: 75px" id="employee_contain">

				<p style="font-size: .75em; color: gray">WORK PERFORMED BY <button type="button" name="add" id="add" data-toggle="modal" data-target="#addEmployee" class="HWP" style="border-radius: 25px">edit</button></p>
				<p style="font-weight: bold; font-size: .85em">
					<?=$row['EMPLOYEES']?> / 
					<?=$row['EMPLOYEES_2']?> / 
					<?=$row['EMPLOYEES_3']?> / 
					<?=$row['EMPLOYEES_4']?> / 
					<?=$row['EMPLOYEES_5']?> / 
					<?=$row['EMPLOYEES_6']?>
				</p>

			</div>








			<div class="col leftB rightB">
				<div class="row">
				
					<div class="col-4">
						<p class="labelX" style="margin-top: -30px !important">WORK AUTHORIZED BY</p>
					</div>

					<div class="col-4 topB" style="font-size: .65em">
						<center>Immediate Supervisor</center>
					</div>

					<div class="col-4">
					</div>

				</div>
			</div>

		</div>


		<div class="row" style="background-color: rgba(150,250,150,.3); margin: none !important; height: 15px; border: 1px solid black">
			<p style="margin: none !important; padding: none !important; color: gray; background-color: transparent !important; font-size: .75em; margin-left: 15px"><i> WORK ACCEPTED BY</i></p>
		</div>


		<div class="row">

			<div class="col leftB rightB">
				<div class="row">

					<div class="col-1"></div>
				
					<div class="col-5 topB" style="font-size: .65em;margin-top: 5%">
						<center>Name/Signature/Designation</center>
					</div>

					<div class="col-1"></div>

					<div class="col-1 leftB"></div>

					<div class="col-3 topB" style="font-size: .65em;margin-top: 5%">
						<center>Date/Time</center>
					</div>

					<div class="col-1"></div>

				</div>
			</div>

			<div class="col leftB rightB">
				<div class="row">
				
					<div class="col-3">
					</div>

					<div class="col-6 topB" style="font-size: .65em;margin-top: 5%">
						<center>Department/Company</center>
					</div>

					<div class="col-3">
					</div>

				</div>
			</div>

		</div>


		<div class="row topB leftB rightB" style="background-color: rgba(150,250,150,.3); margin: none !important; height: 15px;">
			<p style="margin: none !important; padding: none !important; color: gray; background-color: transparent !important; font-size: .75em; margin-left: 15px"><i> TO BE FILLED OUT BY CONCERNED SECTIONS </i></p>
		</div>

		<div class="row">

			<div class="bossbox col">
				<input class="inputX" type="text" name="xFromBLDG" value="<?=$row['FROM_BLDG']?>">
				<p class="labelX">FROM BLDG. NO</p>
			</div>

			<div class="bossbox col">
				<input class="inputX" type="text" name="xToBLDG" value="<?=$row['TO_BLDG']?>">
				<p class="labelX">TO BLDG. NO</p>
			</div>


		</div>


		<div class="row topB leftB rightB" style="background-color: rgba(150,250,150,.3); margin: none !important; height: 15px;">
			<p style="margin: none !important; padding: none !important; color: gray; background-color: transparent !important; font-size: .75em; margin-left: 15px"><i> SERIES NO. OF FORMS USED </i></p>
		</div>

		<div class="row">

			<div class="bossbox col-3">
				<div class="row">
					<div class="col-7">
						<input class="inputXXX" type="text" name="xPAR" value="<?=$row['PAR']?>">
						<p class="labelX">PAR</p>
					</div>

					<div class="col-5">
						<input class="inputX" type="number" name="xPAR_Q" id="qtyPAR" onchange="totalxzs()" value="<?=$row['PAR_QTY']?>">
						<p class="labelX">QTY</p>
					</div>
				</div>
			</div>


			<div class="bossbox col-3">
				<div class="row">
					<div class="col-7">
						<input class="inputXXX" type="text" name="xICS" value="<?=$row['ICS']?>">
						<p class="labelX">ICS</p>
					</div>

					<div class="col-5">
						<input class="inputX" type="number" name="xICS_Q" id="qtyICS" onchange="totalxzs()" value="<?=$row['ICS_QTY']?>">
						<p class="labelX">QTY</p>
					</div>
				</div>
			</div>


			<div class="bossbox col-3">
				<div class="row">
					<div class="col-7">
						<input class="inputXXX" type="text" name="xI_F" value="<?=$row['I_F']?>">
						<p class="labelX">IF/UF/PTF/QF</p>
					</div>

					<div class="col-5">
						<input class="inputX" type="number" name="xI_F_Q" id="qtyIF" onchange="totalxzs()" value="<?=$row['I_F_QTY']?>">
						<p class="labelX">QTY</p>
					</div>
				</div>
			</div>

			<div class="bossbox col-3">
				<div class="row">
					<div class="col-8">
						<input class="inputXXX" type="text" name="xPO" value="<?=$row['PO_CONTRACT']?>">
						<p class="labelX">PO # / CONTRACT #</p>
					</div>
				</div>
			</div>

		</div>



		<div class="row bottomB">

			<div class="bossbox col">
				<input class="inputX" type="text" name="xForms" style="width: 35%" id="num_forms" readonly value="<?=$row['FORMS']?>">
				<input class="inputX" type="text" name="xItems" style="width: 35%" id="num_items" value="<?=$row['ITEMS']?>">
				<p class="labelX">QTY OF FORMS AND LINE ITEMS CREATED</p>
			</div>

			<div class="bossbox col">
				<input class="inputX" type="text" name="xRemarks" value="<?=$row['REMARKS']?>">
				<p class="labelX">REMARKS</p>
				
			</div>

		</div>

		<script type="text/javascript">
			function totalxzs(){
				var qtyPAR = document.getElementById("qtyPAR").value;
				var qtyICS = document.getElementById("qtyICS").value;
				var qtyIF = document.getElementById("qtyIF").value;

				var val1 = Number(qtyPAR, 10);
				var val2 = Number(qtyICS, 10);
				var val3 = Number(qtyIF, 10);

				var tootal = val1 + val2 + val3;

				document.getElementById("num_forms").value = tootal;

				var checkblock = <?=$row['STATUS']?>;

				if (checkblock=='2') {
					document.getElementById("status").innerHTML = "• CHECKED";
				}
				else if (checkblock=='1') {
						document.getElementById("status").innerHTML = "• COMPLETED";
				}
				else if (checkblock=='3') {
						document.getElementById("status").innerHTML = "• CANCELLED";
				}
		}
		</script>


		



		<br><br>
		<a href="index.php"><button type="button" id="iback" class="mybutt btn-secondary HWP"> <span class="fa fa-arrow-left"></span> Back </button></a>
		<button type="submit" name="inprocess" id="submit" onclick="gun1()" class="mybutt bg-warning HWP"> <span class="fa fa-save"></span> In Process </button>
		<button type="submit" name="finalize" id="finalize" onclick="gun2()" class="mybutt bg-primary HWP"> <span class="fa fa-thumbs-up"></span> Complete </button>
		<button type="submit" name="checked" id="checked" onclick="gun3()" class="mybutt bg-success HWP"> <span class="fa fa-check"></span> Check </button>
		<button type="submit" name="onhold" id="onhold" onclick="gun4()" class="mybutt bg-danger HWP"> <span class="fa fa-pause"></span> Cancel </button>
		<button type="button" id="iprint" onclick="window.print();" class="mybutt btn-secondary HWP"> <span class="fa fa-print"></span> Print </button>
	</form>

	
</div>

<br>
<script type="text/javascript">
	function gun1(){
		Swal.fire({
		  position: 'top',
		  type: 'success',
		  title: 'Work Saved',
		  showConfirmButton: false,
		  timer: 1500
		})
			}

	function gun2(){
		Swal.fire({
		  position: 'top',
		  type: 'info',
		  title: 'Work Completed',
		  showConfirmButton: false,
		  timer: 1500
		})
			}

	function gun3(){
		Swal.fire({
		  position: 'top',
		  type: 'success',
		  title: 'Work Checked',
		  showConfirmButton: false,
		  timer: 1500
		})
			}

	function gun4(){
		Swal.fire({
		  position: 'top',
		  type: 'warning',
		  title: 'Work CANCELLED',
		  showConfirmButton: false,
		  timer: 1500
		})
			}
</script>













			<!-- ADD DATA -->
			<div id="addEmployee" class="modal fade">
				<div class="modal-dialog" role="document">
					<!-- content -->
					<form method="post" id="insert_form" action="update_worker.php?xID=<?php echo $id ?>">
					<div class="modal-content">
						<div class="modal-header">

							<h4 class="modal-title">Work Performed By:</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							
						</div>

						<div class="modal-body">


							<label for="emp1">Employee 1:</label>
							<select name="xEmployees" class="form-control" id="emp1">
							<option value=""> </option>
								<?php

									$tableZ=$db->prepare("SELECT * FROM employee");
			   						$tableZ->execute();

			            			foreach($tableZ as $dbwhat) {
			                	?>

								<option value='<?=$dbwhat["EmployeeName"]; ?>'><?=$dbwhat["EmployeeName"]; ?></option>
							<?php } ?>
							</select>


							<label for="emp2">Employee 2:</label>
							<select name="xEmployees_2" class="form-control" id="emp2">
							<option value=""> </option>
								<?php

									$tableZ=$db->prepare("SELECT * FROM employee");
			   						$tableZ->execute();

			            			foreach($tableZ as $dbwhat) {
			                	?>

								<option value='<?=$dbwhat["EmployeeName"]; ?>'><?=$dbwhat["EmployeeName"]; ?></option>
							<?php } ?>
							</select>


							<label for="emp3">Employee 3:</label>
							<select name="xEmployees_3" class="form-control" id="emp3">
							<option value=""> </option>
								<?php

									$tableZ=$db->prepare("SELECT * FROM employee");
			   						$tableZ->execute();

			            			foreach($tableZ as $dbwhat) {
			                	?>

								<option value='<?=$dbwhat["EmployeeName"]; ?>'><?=$dbwhat["EmployeeName"]; ?></option>
							<?php } ?>
							</select>


							<label for="emp4">Employee 4:</label>
							<select name="xEmployees_4" class="form-control" id="emp4">
							<option value=""> </option>
								<?php

									$tableZ=$db->prepare("SELECT * FROM employee");
			   						$tableZ->execute();

			            			foreach($tableZ as $dbwhat) {
			                	?>

								<option value='<?=$dbwhat["EmployeeName"]; ?>'><?=$dbwhat["EmployeeName"]; ?></option>
							<?php } ?>
							</select>


							<label for="emp5">Employee 5:</label>
							<select name="xEmployees_5" class="form-control" id="emp5">
							<option value=""> </option>
								<?php

									$tableZ=$db->prepare("SELECT * FROM employee");
			   						$tableZ->execute();

			            			foreach($tableZ as $dbwhat) {
			                	?>

								<option value='<?=$dbwhat["EmployeeName"]; ?>'><?=$dbwhat["EmployeeName"]; ?></option>
							<?php } ?>
							</select>


							<label for="emp6">Employee 6:</label>
							<select name="xEmployees_6" class="form-control" id="emp6">
							<option value=""> </option>
								<?php

									$tableZ=$db->prepare("SELECT * FROM employee");
			   						$tableZ->execute();

			            			foreach($tableZ as $dbwhat) {
			                	?>

								<option value='<?=$dbwhat["EmployeeName"]; ?>'><?=$dbwhat["EmployeeName"]; ?></option>
							<?php } ?>
							</select>

						</div>

						<div class="modal-footer">
							<input type="submit" name="update_workerX" id="insert" value="Save" class="btn btn-success">
							<input type="button" id="close" value="Close" class="btn btn-danger" data-dismiss="modal" onclick="window.location.reload()">
						</div>
					</div>
					</form>
					<!-- end of content -->
				</div>
			</div>







	<script crossorigin type="text/javascript" src="../vendor/sweetalert2.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
}else{
  header('location:../index.php');
}
?>   