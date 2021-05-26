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

$an = $_GET['an'];
$sql = "delete from payment_info where Account_No = '$an'";

$data = mysqli_query($conn,$sql);

if($data)
{
	echo "<script>alert('Record Deleted from Database')</script>";
	?>
	<META HTTP-EQUIV = "Refresh" CONTENT = "0; URL = http://www.empmansys.com/CSE299-Project/payment.php">
	<?php
}
else
{
	echo "<font color='red'>Failed to Delete Record from Database";
}

?>