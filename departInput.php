<?php
session_start();
error_reporting(0);
$user = $_SESSION['user_name'];

if($user == true)
{

}
else
{
  sleep(1);
  header('location:login.php');
}

?>

<?php
include("db_connection.php");

$dnum = $_POST["dnum"];
$dname = $_POST["dname"];
$mid = $_POST["mid"];
$mdate = $_POST["mdate"];


$sql7 = "INSERT INTO `department` (`Depart_Number`, `Depart_Name`, `Manager_ID`, `Manager_StartDate`) VALUES ('$dnum', '$dname', '$mid', '$mdate')";
$result7 = mysqli_query($conn,$sql7);

if($result7){
  echo "Input Success.";
  sleep(1);
  header("Location: department.php");
}
else{
  echo "ERROR".$sql7.mysqli_error(1);
}

 ?>