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

$ac = $_POST["acc_num"];
$eid = $_POST["eid"];
$abs = $_POST["abs"];
$lc = $_POST["lcut"];
$ov = $_POST["over"];
$ssn = $_POST["season"];
$other = $_POST["other"];
$tot = $_POST["total"];
$pdate = $_POST["pdate"];


$sql7 = "INSERT INTO `payment_info` (`Account_No`, `E_ID`, `Absent`, `Loan_cut`, `Overtime`, `Seasonal_Bonus`, `Other_Bonus`, `Total_Payment`, `Payment_Date`) VALUES ('$ac', '$eid', '$abs', '$lc', '$ov', '$ssn', '$other', '$tot', '$pdate')";
$result7 = mysqli_query($conn,$sql7);

if($result7){
  echo "Input Success.";
  sleep(1);
  header("Location: payment.php");
}
else{
  echo "ERROR".$sql7.mysqli_error(1);
}

 ?>