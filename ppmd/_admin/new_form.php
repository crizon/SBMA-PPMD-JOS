<?php
include '../DBController.php';

session_start();
if(isset($_SESSION['account0'])){

$NewJO = $_SESSION['newGAME'];


	$tableX=$db->prepare("SELECT * FROM customers");
    $tableX->execute();

?>




<!DOCTYPE html>
<html>
<head>
	<title>New JO Request</title>

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
</head>
<body onload="mynewJO()">







<style type="text/css">

	*{outline: none !important}

	.bossbox{overflow: hidden;padding: none !important; margin: none !important;border: 1px solid black; border-bottom: none !important}

	.inputX{outline: none !important; background-color: transparent !important; height: 50px; vertical-align: text-bottom !important; text-indent: 30px; width: 100%; margin: none !important;border: none; padding: none !important; font-weight: bold;}

	.inputXXX{outline: none !important; background-color: transparent !important; height: 50px; vertical-align: text-bottom !important; width: 100%; margin: none !important;border: none; padding: none !important; font-size: .85em; font-weight: bold;}

	.labelX{color: gray; background-color: transparent !important; font-size: .75em; margin-top: -50px !important; margin-right: -2px !important;}

	.row{padding: none !important; margin: none !important}

	.mybutt{background-color: #2eb873;border:none; border-radius: 3px; height: 30px; padding: none !important; color: white; font-size: 1em; font-weight: bold; box-shadow: 3px 3px 5px 1px rgba(10,10,10,.4);}

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
		
		<input type="text" name="xID" value="<?php echo $NewJO ?>" hidden>
		<input type="text" name="xSection" value="ADMIN" hidden>
		<input class="inputX" type="text" name="xReceivedBy" value="JOS" hidden>


		<div class="row">

			<div class="leftB topB col">
				<p class="labelX" style="margin-top: 0px !important">NATURE OF WORK</p>
				<select class="NBOP" name="xNature" style="width: 100%; text-indent: none !important;border:1px solid gray; height: 35px; padding: none !important; margin: none !important; margin-bottom: 2px !important" onchange="CheckWork(this.value);">
				  <option value=""></option>
				  <option value="ISSUANCE OF FURNITURE & OTHER EQUIPMENT">• ISSUANCE OF FURNITURE & OTHER EQUIPMENT</option>
				  <option value="PHYSICAL INVENTORY OF PROPERTY, PLANT & EQUIPMENT">• PHYSICAL INVENTORY OF PROPERTY, PLANT & EQUIPMENT</option>
				  <option value="TRANSFER OF CUSTODY">• TRANSFER OF CUSTODY</option>
				  <option value="TURN OVER/PULL OUT OF FURNITURE & OTHER EQUIPMENT">• TURN OVER/PULL OUT OF FURNITURE & OTHER EQUIPMENT</option>
				  <option value="REPOSSESSION">• REPOSSESSION </option>
				  <option value="GATEPASS">• GATEPASS</option>
				  <option value="REQUEST FOR QUOTATIONS TO SUPPLIERS/SERVICE PROVIDERS">• REQUEST FOR QUOTATIONS TO SUPPLIERS/SERVICE PROVIDERS</option>
				  <option value="PICK-UP OF PURCHASED SUPPLIES & MATERIALS">• PICK-UP OF PURCHASED SUPPLIES & MATERIALS</option>
				  <option value="DELIVERY OF PURCHASED SUPPLIES & MATERIALS">• DELIVERY OF PURCHASED SUPPLIES & MATERIALS</option>
				  <option value="INSPECTION OF PURCHASED SUPPLIES & MATERIALS">• INSPECTION OF PURCHASED SUPPLIES & MATERIALS</option>
				  <option value="REQUEST FOR QUOTATIONS TO SUPPLIERS/SERVICE PROVIDERS">• REQUEST FOR QUOTATIONS TO SUPPLIERS/SERVICE PROVIDERS</option>
				  <option value="PICK-UP OF PURCHASED SUPPLIES & MATERIALS">• PICK-UP OF PURCHASED SUPPLIES & MATERIALS</option>
				  <option value="DELIVERY OF PURCHASED SUPPLIES & MATERIALS">• DELIVERY OF PURCHASED SUPPLIES & MATERIALS</option>
				  <option value="INSPECTION OF PURCHASED SUPPLIES & MATERIALS">• INSPECTION OF PURCHASED SUPPLIES & MATERIALS</option>
				  <option value="OTHERS" id="mynew">• OTHERS</option>
				</select>

				<input class="NBOP" type="text" id="others" style="margin-bottom: 2px; width: 100%; display: none; border: 1px solid gray" placeholder="Specify here . . ." onmouseleave="sige()">

				<script type="text/javascript">
					function CheckWork(val){
					 var element=document.getElementById('others');
					 if(val=='OTHERS')
					   element.style.display='block';
					 else  
					   element.style.display='none';
					}

					function sige(){
						var newval = document.getElementById("others").value;
						document.getElementById("mynew").value = "(OTHERS) " + newval;
						//alert(document.getElementById("mynew").value)
					}
				</script>
				
			</div>


			<div class="bossbox col">
				<dir class="row">
					<div class="col">
						<p class="labelX" style="margin-top: 0px !important">JOB ORDER NO.</p>
						<input class="" type="text" name="xJO" value="" id="newJO" readonly style="background-color: transparent; border: none; font-size: 1.7em">
						

						<script>
							function mynewJO(){
								
							   var buwan;
							   
							   
							   
							  var D = new Date();

							  var y = D.getFullYear();

							  var W_buwan = ["January","February","March","April","May","June","July","August","September","October","November","December"];

							  var N_buwan = ["01","02","03","04","05","06","07","08","09","10","11","12"];

							  var taon;
							  
							  
							  if (y==2019){taon = "19"}
							  else if (y==2020){taon = "20"}
							  else if (y==2021){taon = "21"}
							  else if (y==2022){taon = "22"}
							  else if (y==2023){taon = "23"}
							  else if (y==2024){taon = "24"}
							  else if (y==2025){taon = "25"}
							  else if (y==2026){taon = "26"}
							  else if (y==2027){taon = "27"}
							  else if (y==2028){taon = "28"}
							  else if (y==2029){taon = "29"}
							  else if (y==2030){taon = "30"}
							  else{alert('☹')}
							  
							  document.getElementById("newJO").value = "709-" + N_buwan[D.getMonth()] + taon + "-" + "<?php echo $NewJO ?>";
							  //new generated JOB ORDER SERIAL


							  //document.getElementById("Dstart").value = W_buwan[D.getMonth()] + " " + D.getDate() + " , " + y;


							  var hours =  D.getHours();
							  var minutes = D.getMinutes();
							  var ampm = hours >= 12 ? 'PM' : 'AM';
							  hours = hours % 12;
							  hours = hours ? hours : 12; // the hour '0' should be '12'
							  minutes = minutes < 10 ? '0'+minutes : minutes;
							  var strTime = hours + ':' + minutes + ' ' + ampm;
							  document.getElementById("Tstart").value = strTime;


							}
						</script>
					</div>

					<div class="col">
						<p class="labelX" style="margin-top: 0px !important">STATUS</p>
						<input name="xStatus" value="0" hidden>
							• IN PROCESS
					</div>

				</dir>
			</div>


		</div>




		<div class="row">

			<div class="leftB topB col">
				<input class="inputX" type="text" name="xLocation">
				<p class="labelX">BLDG. NO./LOCATION</p>
			</div>


			<div class="bossbox col">
				<div class="row">
				
					<div class="col-6">
						<input class="inputX" type="date" name="xDateStart" id="Dstart" readonly value="<?php echo date("Y-m-d") ?>">
						<p class="labelX">DATE STARTED</p>
					</div>

					<div class="col-6">
						<input class="inputX" type="text" name="xTimeStart" id="Tstart" readonly value="<?php echo date("h:i a") ?>">
						<p class="labelX">TIME STARTED</p>
					</div>

				</div>
			</div>

		</div>

		<div class="row leftB">
		    <script src="../vendor/jquery.min.js"></script>
        	<script src="../vendor/bootstrap3-typeahead.min.js"></script>
        	<style type="text/css">
        		.labelXX{color: gray; background-color: transparent !important; font-size: .75em; margin-top: -35px !important; margin-right: -2px !important;}
        	</style>

			<div class="col topB">
				<p style="color: gray; background-color: transparent !important; font-size: .75em; margin-top: 5px !important; margin-right: -2px !important; border: none !important; margin-bottom: 0 !important">REQUESTING DEPARTMENT/COMPANY</p>
				<input type="text" name="xRequestingCompany" id="_requesting" autocomplete="off" style="width: 100%; border: none !important; text-indent: 25px" />
				
			</div>


            <!-- AJAX REQUEST FOR THIS AUTOFILL INPUT -->
            <script>
                $(document).ready(function(){
                 
                 $('#_requesting').typeahead({
                  source: function(query, result)
                  {
                   $.ajax({
                    url:"fetchCustomer.php",
                    method:"POST",
                    data:{query:query},
                    dataType:"json",
                    success:function(data)
                    {
                     result($.map(data, function(item){
                      return item;
                     }));
                    }
                   })
                  }
                 });
                 
                });
            </script> 


			<div class="bossbox col">
				<div class="row">
				
					<div class="col-6">
						<input class="inputX" type="" name="xDateComp" onclick="todate()" id="toda" placeholder="">
						<p class="labelX">DATE COMPLETED</p>
					</div>

					<div class="col-6 ">
						<input class="inputX" type="" name="xTimeComp" onclick="totime()" id="toti" placeholder="">
						<p class="labelX">TIME COMPLETED</p>
					</div>

					<script type="text/javascript">
						function todate(){
							document.getElementById("toda").setAttribute("type", "date");
						}

						function totime(){
							document.getElementById("toti").setAttribute("type", "time");
						}
					</script>

				</div>
			</div>

		</div>


		<div class="row">

			<div class="leftB topB col">
				<input class="inputX" type="text" name="xContactPerson">
				<p class="labelX">CONTACT PERSON</p>
			</div>

			<div class="bossbox col">
			</div>


		</div>

		
		<div class="row">

			<div class="leftB topB col">

				<!-- <input class="inputX" type="text" name="xEmployees" placeholder="Employee Name(s)"> -->
				<p style="color: gray; background-color: transparent !important; font-size: .75em; ; margin-bottom: 0 !important">WORK PERFORMED BY</p>

				<select name="xEmployees" style="border: 1px solid #0000000D" class="form-control">
				<option value=""> </option>
					<?php

						$tableZ=$db->prepare("SELECT * FROM employee");
   						$tableZ->execute();

            			foreach($tableZ as $dbwhat) {
                	?>

					<option value='<?=$dbwhat["EmployeeName"]; ?>'><?=$dbwhat["EmployeeName"]; ?></option>
				<?php } ?>
				</select>

			</div><!-- HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH -->


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
			<p style="margin: none !important; padding: none !important; color: gray; background-color: transparent !important; font-size: .75em; margin-left: 15px">WORK ACCEPTED BY</p>
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
				<input class="inputX" type="text" name="xFromBLDG">
				<p class="labelX">FROM BLDG. NO</p>
			</div>

			<div class="bossbox col">
				<input class="inputX" type="text" name="xToBLDG">
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
						<input class="inputXXX" type="text" name="xPAR">
						<p class="labelX">PAR</p>
					</div>

					<div class="col-5">
						<input class="inputX" type="number" name="xPAR_Q" id="qtyPAR" onchange="totalxzs()">
						<p class="labelX">QTY</p>
					</div>
				</div>
			</div>


			<div class="bossbox col-3">
				<div class="row">
					<div class="col-7">
						<input class="inputXXX" type="text" name="xICS">
						<p class="labelX">ICS</p>
					</div>

					<div class="col-5">
						<input class="inputX" type="number" name="xICS_Q" id="qtyICS" onchange="totalxzs()">
						<p class="labelX">QTY</p>
					</div>
				</div>
			</div>


			<div class="bossbox col-3">
				<div class="row">
					<div class="col-7">
						<input class="inputXXX" type="text" name="xI_F">
						<p class="labelX">IF/UF/PTF/QF</p>
					</div>

					<div class="col-5">
						<input class="inputX" type="number" name="xI_F_Q" id="qtyIF" onchange="totalxzs()">
						<p class="labelX">QTY</p>
					</div>
				</div>
			</div>

			<div class="bossbox col-3">
				<div class="row">
					<div class="col-8">
						<input class="inputXXX" type="text" name="xPO">
						<p class="labelX">PO # / CONTRACT #</p>
					</div>
				</div>
			</div>

		</div>



		<div class="row bottomB">

			<div class="bossbox col">
				<input class="inputX" type="text" name="xForms" style="width: 35%" id="num_forms" readonly >
				<input class="inputX" type="text" name="xItems" style="width: 35%" id="num_items">
				<p class="labelX">QTY OF FORMS AND LINE ITEMS CREATED</p>
			</div>

			<div class="bossbox col">
				<input class="inputX" type="text" name="xRemarks">
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

			}
		</script>


		



		<br><br>
		<button type="submit" name="submits" class="mybutt bg-success HWP"> <span class="fa fa-save"></span> Save</button>
		<button type="button" id="iprint" onclick="window.print();" class="mybutt btn-secondary HWP" style="background-color: gray"> <span class="fa fa-print"></span> Print </button>
	</form>

	
</div>

<br>









	<script crossorigin type="text/javascript" src="../vendor/sweetalert2.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>


<?php
}else{
  header('location:../index.php');
}
?>   