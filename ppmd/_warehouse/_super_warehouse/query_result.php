
<?php 

include_once('../../DBcontroller.php');

session_start();
if(isset($_SESSION['account8'])){

  $xSECTION = "WAREHOUSE";
  $xPERSONNEL = $_POST['xPERSONNEL'];
  $xREQUESTING = $_POST['xREQUESTING'];
  $xSTATUS = $_POST['xSTATUS'];
  $xDATE = $_POST['xDATE'];

  $xDate1 = $_POST['xDate1'];
  $xDate2 = $_POST['xDate2'];



    if(isset($_POST['submit'])){

      $tableX=$db->prepare("SELECT * FROM jo_master WHERE 
        SECTION=:zSECTION AND 
        EMPLOYEES=:zPERSONNEL AND 
        REQUESTING_COMPANY_DEPARTMENT=:zREQUESTING AND
        STATUS=:zSTATUS AND
        DATE_STARTED=:zDATE

        ORDER BY jo_master.ID DESC");


      $tableX->bindParam(':zSECTION',$xSECTION);
      $tableX->bindParam(':zPERSONNEL',$xPERSONNEL);
      $tableX->bindParam(':zREQUESTING',$xREQUESTING);
      $tableX->bindParam(':zSTATUS',$xSTATUS);
      $tableX->bindParam(':zDATE',$xDATE);
      $tableX->execute();

    }

    elseif(isset($_POST['personnel'])){

      $tableX=$db->prepare("SELECT * FROM jo_master WHERE
        EMPLOYEES=:zPERSONNEL OR
        EMPLOYEES_2=:zPERSONNEL OR
        EMPLOYEES_3=:zPERSONNEL OR
        EMPLOYEES_4=:zPERSONNEL OR
        EMPLOYEES_5=:zPERSONNEL OR
        EMPLOYEES_6=:zPERSONNEL 
        ORDER BY jo_master.ID DESC");

      $tableX->bindParam(':zPERSONNEL',$xPERSONNEL);
      $tableX->execute();

    }

    elseif(isset($_POST['section'])){

      $tableX=$db->prepare("SELECT * FROM jo_master WHERE
        SECTION=:zSECTION
        ORDER BY jo_master.ID DESC");

      $tableX->bindParam(':zSECTION',$xSECTION);
      $tableX->execute();

    }

    elseif(isset($_POST['requesting'])){

      $tableX=$db->prepare("SELECT * FROM jo_master WHERE
        REQUESTING_COMPANY_DEPARTMENT=:zREQUESTING
        AND SECTION=:zSECTION
        ORDER BY jo_master.ID DESC");

      $tableX->bindParam(':zREQUESTING',$xREQUESTING);
      $tableX->bindParam(':zSECTION',$xSECTION);
      $tableX->execute();

    }

    elseif(isset($_POST['status'])){

      $tableX=$db->prepare("SELECT * FROM jo_master WHERE
        STATUS=:zSTATUS
        AND SECTION=:zSECTION
        ORDER BY jo_master.ID DESC");

      $tableX->bindParam(':zSTATUS',$xSTATUS);
      $tableX->bindParam(':zSECTION',$xSECTION);
      $tableX->execute();

    }

    elseif(isset($_POST['findDate'])){

      $tableX=$db->prepare("SELECT * FROM jo_master WHERE
        DATE_STARTED=:zDATE
        AND SECTION=:zSECTION
        ORDER BY jo_master.ID DESC");

      $tableX->bindParam(':zDATE',$xDATE);
      $tableX->bindParam(':zSECTION',$xSECTION);
      $tableX->execute();

    }

    elseif(isset($_POST['xdates'])){

      $tableX=$db->prepare("SELECT * FROM jo_master WHERE
        jo_master.DATE_STARTED BETWEEN :zDate1 AND :zDate2
        AND SECTION=:zSECTION
        ORDER BY jo_master.ID DESC");

      $tableX->bindParam(':zDate1',$xDate1);
      $tableX->bindParam(':zDate2',$xDate2);
      $tableX->bindParam(':zSECTION',$xSECTION);
      $tableX->execute();

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
    <title>QUERY REPORT</title>
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
    
    </div>

    <br><br>
    <center>
        <h1>QUERY REPORT</h1>
       
    </center>

    <div>
        <!-- <a href="new_process.php">
            <button class="HFP btn">
                <span class="fa fa-plus-circle"></span> New
            </button>
        </a> -->

        <button onclick="window.history.back();" class="HFP btn"> <span class="fa fa-arrow-left"></span> Back </button>
        <button onclick="window.print();" class="HFP btn"> <span class="fa fa-print"></span> Print </button>
        <a href="index.php"><button class="HFP btn"> <span class="fa fa-home"></span> Home </button></a>

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
                    <td class="myTD"><?=$dbmaster["EMPLOYEES"]; ?></td>
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
        </table>

    </div>
    


<script crossorigin type="text/javascript" src="../../vendor/sweetalert2.js"></script>
</body>
</html>




<?php
}else{
  header('location:../../index.php');
}
?>   