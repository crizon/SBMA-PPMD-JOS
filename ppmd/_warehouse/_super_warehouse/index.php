
<?php 

include_once('../../DBcontroller.php');

session_start();
if(isset($_SESSION['account8'])){
    

    $xsec='WAREHOUSE';
    $tableX=$db->prepare("SELECT * FROM jo_master WHERE JOB_ORDER_num AND SECTION=:Xsec != 0 ORDER BY jo_master.ID DESC");
    $tableX->bindParam(':Xsec',$xsec);
    $tableX->execute();


   $currentUser = $_SESSION["presentUser"];
 ?>









<?php
$db_handle = new dbROCK();
$productResult = $db_handle->runQuery("select * from jo_master");

if (isset($_POST["export"])) {
    $filename = "Report.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($productResult)) {
        foreach ($productResult as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }
    exit();
}

?>









<html>
<head>

    <link rel="stylesheet" type="text/css" href="../../css/elusive-icons.css">
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="../../vendor/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="../../vendor/animate.css">

<!--     <script type="text/javascript">
        function ui(){
            if (!window.screenTop && !window.screenY) {
            alert('Browser is not in fullscreen');}

            else if (window.screenTop && window.screenY) {
            alert('Browser is in fullscreen');}
        }
        
    </script> -->

<style>
body {
    font-size: 0.95em;
    font-family: arial;
    color: #212121;
}

a{color: rgba(0,0,0,0);}


.baba{border-right: 1px solid black; border-bottom: 3px solid black; border-left: 1px solid black; background-color: #2eb873;color: white; text-align: center;font-size: 0.95em;}

.taas{border-right: 1px solid black; border-top: 3px solid black; border-left: 1px solid black;background-color: #2eb873;color: white;text-align: center;font-size: 0.95em;}

.myTD{border: 1px solid gray; font-size: 0.75em;padding:3px}


.btn {background-color: #2eb873;border:none; border-radius: 3px; height: 30px; padding: none !important; color: white; font-size: 1em; font-weight: bold; box-shadow: 3px 3px 5px 1px rgba(10,10,10,.3);cursor: pointer;}

@media print{

    .HFP{display: none !important}
}

.spin-it{animation:w3-spin 2s infinite linear}@keyframes w3-spin{0%{transform:rotate(0deg)}100%{transform:rotate(359deg)}}

.fade{animation:fading 10s infinite}@keyframes fading{0%{opacity:0}50%{opacity:1}100%{opacity:0}}

img{user-select: none !important; }

tr:hover{background-color: rgba(0,150,255,.2);}


</style>
</head>
<body>
    <div class="HFP" style="background-color: #343a40; width: 100%; position: fixed; left: 0; top: 0; padding: 3px">
        
      <a href="" style="color: white; text-decoration: none">
        <img src="../../img/logo.png" width="30" height="30" alt="SBMA">
      </a>

      <a onclick="labas()" style="cursor: pointer; position:fixed; right: 15px; top: 10px; color: white; text-decoration: none"> <?php echo $currentUser ?>
        <span class="fa fa-sign-out-alt"  title="Log-out"></span>
      </a>
    
    </div>

    <br><br>
    <center>
        <h1>JOB ORDER - WAREHOUSE SECTION</h1>
       
    </center>

    <div>
        <!-- <a href="new_process.php">
            <button class="HFP btn">
                <span class="fa fa-plus-circle"></span> New
            </button>
        </a> -->

        <button class="HFP btn" onclick="gawa()">
                <span class="fa fa-plus-circle"></span> New
        </button>


        <button style="width: 25px; opacity: 0"></button>

        <button onclick="window.print();" class="HFP btn" style="background-color: #778287"> <span class="fa fa-print"></span> Print / PDF</button>

        <button style="width: 25px; opacity: 0"></button>

        <form action="" method="post" style="margin: 0 !important; padding: 0 !important; display: inline !important;">
        <button id="btnExport" name='export' class="HFP btn" style="background-color: darkgreen"> <span class="fa fa-file-excel"></span> Export .xls</button>
        </form>

        <button style="width: 25px; opacity: 0"></button>

        <button onclick="queries()" class="HFP btn" style="background-color: #2991c2"> <span class="fa fa-keyboard"></span> Query</button>

        <button style="width: 25px; opacity: 0"></button>

        
  
<!--         <button style="width: 25px; opacity: 0"></button>
        <button style="width: 25px; opacity: 0"></button>
        <button style="width: 25px; opacity: 0"></button>

            <b>LEGENDS:</b>

            <button style="width: 5px; opacity: 0"></button>

            <span style="color:orange;" class="fa fa-spinner spin-it"></span><i style="font-size: .75em"> - IN PROGRESS</i>
            <button style="width: 25px; opacity: 0"></button>
            <b><span style="color:green" class="fa fa-check"></span></b><i style="font-size: .75em"> - COMPLETED</i>
            <button style="width: 25px; opacity: 0"></button>
            <b><span style="color:red" class="fa fa-exclamation-triangle"></span></b><i style="font-size: .75em"> - PENDING</i>
            <button style="width: 25px; opacity: 0"></button> -->

    </div>

    <br>

    <div>
<!--         <div>
            <input class="HFP" type="text" name="" value="Search">
            <br><br>
        </div> -->
        <table style="border-collapse: collapse; width: 100%;">
            <thead>
                <tr>
                    <th class="taas"> Job <br> Order # </th>
                    <th class="taas">Date<br>Started</th>
                    <th class="taas">Date<br>Completed</th>
                    <th class="taas"> Personnel </th>
                    <th class="taas"> Section </th>
                    <th class="taas"> Requesting <br> Company <br>/Department </th>
                    <th class="taas"> Nature of Work </th>
                    <th class="taas"> PO # /<br> Contract # </th>
                    <th class="taas" colspan="6" style="border-bottom: 1px solid black"> Form(s) </th>
                    <th class="taas"> Items </th>
                    <th class="taas">Status</th>
                    
                </tr>
                <tr>
                    <th class="baba"> </th>
                    <th class="baba"> </th>
                    <th class="baba"> </th>
                    <th class="baba"> </th>
                    <th class="baba"> </th>
                    <th class="baba"> </th>
                    <th class="baba"> </th>
                    <th class="baba"> </th>
                    <th class="baba"> PAR</th>
                    <th class="baba"> Qty </th>
                    <th class="baba"> ICS </th>
                    <th class="baba"> Qty </th>
                    <th class="baba"> IF/UF/ <br> PTF/QF </th>
                    <th class="baba"> Qty </th>
                    <th class="baba"> </th>
                    <th class="baba"> </th>
                    
                </tr>
            </thead>
            <tbody style="border-bottom: 2px solid black">
 
            <?php
            foreach($tableX as $dbmaster) {
                    ?>
                 
                 <tr>

                    <td class="myTD">
                        <a href="edit.php?id=<?=$dbmaster['ID']?>" style="cursor: pointer;color: black;text-decoration: none !important">
                               <?=$dbmaster["JOB_ORDER_num"]?>
                        </a>
                        </td>

                    <td class="myTD"><?=$dbmaster["DATE_STARTED"]; ?></td>
                    <td class="myTD"><?=$dbmaster["DATE_COMPLETED"]; ?></td>



                    <td class="myTD">
                        
                        <?=$dbmaster["EMPLOYEES"]; ?> | 
                        <?=$dbmaster["EMPLOYEES_2"]; ?> | 
                        <?=$dbmaster["EMPLOYEES_3"]; ?> | 
                        <?=$dbmaster["EMPLOYEES_4"]; ?> | 
                        <?=$dbmaster["EMPLOYEES_5"]; ?> | 
                        <?=$dbmaster["EMPLOYEES_6"]; ?>
                            
                    </td>



                    <td class="myTD" style="font-size: .55em"><?=$dbmaster["SECTION"]; ?></td>
                    <td class="myTD" style="font-size: .55em"><?=$dbmaster["REQUESTING_COMPANY_DEPARTMENT"]; ?></td>
                    <td class="myTD" style="font-size: .55em"><?=$dbmaster["NATURE_OF_WORK"]; ?></td>
                    <td class="myTD"><?=$dbmaster["PO_CONTRACT"]; ?></td>
                    <td class="myTD"><?=$dbmaster["PAR"]; ?></td>
                    <td class="myTD" style="text-align: center;"><?=$dbmaster["PAR_QTY"]; ?></td>
                    <td class="myTD"><?=$dbmaster["ICS"]; ?></td>
                    <td class="myTD" style="text-align: center;"><?=$dbmaster["ICS_QTY"]; ?></td>
                    <td class="myTD"><?=$dbmaster["I_F"]; ?></td>
                    <td class="myTD" style="text-align: center;"><?=$dbmaster["I_F_QTY"]; ?></td>
                    <td class="myTD" style="text-align: center;"><?=$dbmaster["ITEMS"]; ?></td>
                    <td class="myTD" style="text-align: center;font-size: .5em !important">
                        
                        <?php

                            if($dbmaster["STATUS"]==0)
                                {echo '<p style="background-color:orange"> IN PROCCESS </p>';}

                            else if($dbmaster["STATUS"]==1)
                                {echo '<p style="background-color:blue; color:white"> COMPLETED </p>';}

                            else if($dbmaster["STATUS"]==2)
                                {echo '<p style="background-color:green; color:white"> CHECKED </p>';}

                            else if($dbmaster["STATUS"]==3)
                                {echo '<p style="background-color:red; color:white"> CANCELLED </p>';}

                        ?>

                    </td>

                </tr>
             <?php } ?>
      </tbody>
<!--       <tfoot>
        <tr>
                    <th class="taas"> Job <br> Order # </th>
                    <th class="taas"> Date <br> Started </th>
                    <th class="taas"> Date <br> Completed </th>
                    <th class="taas"> Inventory <br> Personnel </th>
                    <th class="taas"> Requesting <br> Company <br> / Department </th>
                    <th class="taas"> Nature of Work </th>
                    <th class="taas"> PO # /<br> Contract # </th>
                    <th class="taas" colspan="6" style="border-bottom: 1px solid black"> Form(s) </th>
                    <th class="taas"> Items </th>
                </tr>
                <tr>
                    <th class="baba"> </th>
                    <th class="baba"> </th>
                    <th class="baba"> </th>
                    <th class="baba"> </th>
                    <th class="baba"> </th>
                    <th class="baba"> </th>
                    <th class="baba"> </th>
                    <th class="baba"> PAR</th>
                    <th class="baba"> Qty </th>
                    <th class="baba"> ICS </th>
                    <th class="baba"> Qty </th>
                    <th class="baba"> IF/UF/ <br> PF-TO </th>
                    <th class="baba"> Qty </th>
                    <th class="baba"> </th>
                </tr>
     </tfoot> -->
   
        </table>

    </div>
    


<script type="text/javascript">
    function gawa(){

        Swal.fire({
          title:'ARE YOU SURE?',
          text: "You won't be able to revert this action. \n If you exit the system without saving the new Job Order Request, it will make an empty entry in the master table.",
          imageUrl: '../../img/sureX.png',
          imageWidth: '40%',
          animation: false,
          customClass: 'animated tada',
          showCancelButton: true,
          confirmButtonColor: '#28a745',
          cancelButtonColor: '#dc3545',
          confirmButtonText: 'Yes, Request new Job Order no.'
        }).then((result) => {
          if (result.value) {
            location.replace("new_process.php");
            
          }
        })
    }


    function labas(){

        Swal.fire({
          title:'Log-out account?',
          imageUrl: '../../img/sureX.png',
          imageWidth: '40%',
          animation: false,
          customClass: 'animated tada',
          showCancelButton: true,
          confirmButtonColor: '#28a745',
          cancelButtonColor: '#dc3545',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.value) {
            location.replace("../../logout_process.php?uname=<?php echo $currentUser ?>");
            
          }
        })
    }

    function queries(){

        Swal.fire({
          title:'Would you like to generate specific report?',
          imageUrl: '../../img/searchX.png',
          imageWidth: '40%',
          animation: false,
          customClass: 'animated tada',
          showCancelButton: true,
          confirmButtonColor: '#28a745',
          cancelButtonColor: '#dc3545',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.value) {
            window.location.href="query.php";
            
          }
        })
    }
</script>


<script crossorigin type="text/javascript" src="../../vendor/sweetalert2.js"></script>
</body>
</html>


<?php
}else{
  header('location:../../index.php');
}
?>   