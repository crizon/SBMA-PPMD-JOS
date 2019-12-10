<?php
include '../../DBController.php';


$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO jo_master (PAR, SECTION)
    VALUES ('', '')";
    // use exec() because no results are returned
    $db->exec($sql);
    $last_id = $db->lastInsertId();
 //   echo "New record created successfully. Last inserted ID is: " . $last_id;

    session_start();

    $_SESSION['newGAME']= $last_id;

    header('location:new_form.php');
?>


