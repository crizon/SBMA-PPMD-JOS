<?php
include '../DBController.php';

session_start();
if(isset($_SESSION['account0'])){

 
    $tableX=$db->prepare("SELECT * FROM customers");
    $tableX->execute();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Report Request</title>

	<script src="../vendor/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../vendor/sweetalert2.css">
        <link rel="stylesheet" type="text/css" href="../vendor/animate.css">
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../vendor/elusive-icons.css">
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../w3.css">
        
        <script src="../vendor/jquery.min.js"></script>
        <script src="../vendor/bootstrap3-typeahead.min.js"></script> 

</head>
<body style="background-image: url(../img/bg.png); background-position: top; background-color: #343a40; background-size: 100%">
<br>
    <div style="margin-left: 5%; margin-right: 5%">

        <form action="query_result.php" method="POST" id="trupa" class="form-signin" style="background-color: white; border: 5px outset #ffc107; border-radius: 15px; box-shadow: 1px 17px 40px 0px rgba(0,0,0,0.7);">

        <a href="index.php"><button type="button" id="iback" class="btn btn-warning" style="margin-top: 5px; margin-left: 5px">
            <span class="fa fa-arrow-left"></span> Back </button>
        </a>

          <center>
            <img class="mb-4" src="../img/searchX.png" alt="" width="120" style=";" draggable="false">
            <h1 class="h3 mb-3 font-weight-normal">SBMA-PPMD <br> SEARCH QUERY </h1>
         </center>

      <br>
      <div class="row">
        <div class="col-5" style="padding: 25px">

            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text"  style="width: 35px"><i class="fas fa-user"></i></span>
                </div>

                <select name="xPERSONNEL" class="form-control input_pass">
                <option value="">Employee</option>
                  <?php

                    $tableZ=$db->prepare("SELECT * FROM employee");
                      $tableZ->execute();

                          foreach($tableZ as $dbwhat) {
                          ?>

                  <option value='<?=$dbwhat["EmployeeName"]; ?>'><?=$dbwhat["EmployeeName"]; ?></option>
                <?php } ?>
                </select>

                <button class="btn input_pass btn-warning" name="personnel" type="submit"> <i class="fas fa-search"></i></button>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text"  style="width: 35px"><i class="fas fa-hotel"></i></span>
                </div>
                <select name="xSECTION" class="form-control input_pass">
                  <option value="4">Section</option>
                  <option value="ADMIN">• ADMIN </option>
                  <option value="INVENTORY">• INVENTORY </option>
                  <option value="RECEIVING">• RECEIVING </option>
                  <option value="GATEPASS">• GATEPASS </option>
                  <option value="WAREHOUSE">• WAREHOUSE </option>
                </select>
                <button class="btn input_pass btn-warning" name="section" type="submit"> <i class="fas fa-search"></i></button>
            </div>



 
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text"  style="width: 35px"><i class="fas fa-city"></i></span>
                </div>
                  <input type="text" name="xREQUESTING" id="_requesting" class="form-control input-lg" autocomplete="off" placeholder="Requesting Department/Company" />
                <button class="btn input_pass btn-warning" name="requesting" type="submit"> <i class="fas fa-search"></i></button>
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




            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text"  style="width: 35px"><i class="fas fa-thermometer-three-quarters"></i></span>
                </div>
                <select name="xSTATUS" class="form-control input_pass">
                  <option value="4">Status</option>
                  <option value="0">• IN PROCESS</option>
                  <option value="1">• COMPLETED </option>
                  <option value="2">• CHECKED </option>
                  <option value="3">• CANCELLED </option>
                </select>

                <button class="btn input_pass btn-warning" name="status" type="submit"> <i class="fas fa-search"></i></button>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text"  style="width: 35px"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="date" name="xDATE" class="form-control input_pass" value="">
                <button class="btn input_pass btn-warning" name="findDate" type="submit"> <i class="fas fa-search"></i></button>
            </div>

          <!-- <br>
          <button class="btn btn-lg btn-warning btn-block" name="submit" type="submit"> <i class="fas fa-search"></i> Search</button>
          <br> -->




    


































      </div>

      <div class="col-2" style="padding: 25px"><br><br><br><br><br> <center> -or- </center> </div>

      <div class="col-5" style="padding: 25px">

        <p style="color: gray">Between Dates</p>
        <div class="input-group mb-3">

                <div class="input-group-append">
                    <span class="input-group-text"  style="width: 35px"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="date" name="xDate1" class="form-control input_pass" value="">

                <center> <div style="width: 35px"><i class="fas fa-arrows-alt-h"></i></span></div> </center>

                <div class="input-group-append">
                    <span class="input-group-text"  style="width: 35px"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="date" name="xDate2" class="form-control input_pass" value="">
                <br>
                <button class="btn btn-block btn-warning" name="xdates" type="submit"> <i class="fas fa-search"></i></button>
            </div>
            
        
      </div>
    </div><!-- ROW -->
<!--         <i style="font-size: .6em">Powered By:</i> 
        <a href="http://www.crizon.online" rel="external" target="_blank"><img src="../img/crzn.png" width="20%" draggable="false" class="fade"></a> -->
    </form>
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







                

                