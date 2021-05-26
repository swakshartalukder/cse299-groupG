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

$eid = $_POST["e_id"];
$fn = $_POST["fname"];
$ln = $_POST["lname"];
$ad = $_POST["address"];
$pn = $_POST["pnumber"];
$em = $_POST["em"];
$date = $_POST["date"];
$sal = $_POST["salary"];
$gen = $_POST["gender"];


$sql = "INSERT INTO `employee` (`Employee_ID`, `Fname`, `Lname`, `Address`, `Phone_No`, `Email`, `Birth_Date`, `Salary`, `Gender`) VALUES ('$eid', '$fn', '$ln', '$ad', '$pn', '$em', '$date', '$sal', '$gen')";
$result = mysqli_query($conn,$sql);

if($result){
  echo "Input Success.";
  sleep(1);
  header("Location: employees.php");
}
else{
  echo "ERROR".$sql.mysqli_error(1);
}

 ?>