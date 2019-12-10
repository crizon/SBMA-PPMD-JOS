<?php

$host = "localhost";
$user = "root";
$pass = "";
$db_name = "ppmd";

try{
	$db = new PDO ("mysql:host={$host};dbname={$db_name}",$user,$pass);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	// echo "You are connected to database ".$db_name;
}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}




class dbROCK{
  private $Xhost = "localhost";
  private $Xuser = "root";
  private $Xpassword = "";
  private $Xdatabase = "ppmd";
  private $conn;
  
        function __construct() {
        $this->conn = $this->connectDB();
  } 
  function connectDB() {
    $conn = mysqli_connect($this->Xhost,$this->Xuser,$this->Xpassword,$this->Xdatabase);
    return $conn;
  }
        function runQuery($query) {
                $result = mysqli_query($this->conn,$query);
                while($row=mysqli_fetch_assoc($result)) {
                $resultset[] = $row;
                }   
                if(!empty($resultset))
                return $resultset;
  }
}
?>