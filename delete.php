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

$eid = $_GET['eid'];
$sql = "DELETE employee, payment_info FROM employee INNER JOIN payment_info ON employee.Employee_ID = payment_info.E_ID WHERE employee.Employee_ID = '$eid'"; 
$sql1 = "DELETE FROM employee WHERE employee.Employee_ID = '$eid'"; 

$data = mysqli_query($conn,$sql);
$data1 = mysqli_query($conn,$sql1);
if($data)
{
	echo "<script>alert('Record Deleted from Database')</script>";
	?>
	<META HTTP-EQUIV = "Refresh" CONTENT = "0; URL = http://www.empmansys.com/CSE299-Project/employees.php">
	<?php
}
elseif ($data1) {
	echo "<script>alert('Record Deleted from Database')</script>";
	?>
	<META HTTP-EQUIV = "Refresh" CONTENT = "0; URL = http://www.empmansys.com/CSE299-Project/employees.php">
	<?php
}
else
{
	echo "<font color='red'>Failed to Delete Record from Database";
}

?>