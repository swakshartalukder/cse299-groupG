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

<!DOCTYPE html>
<html>
<head>
	<title>All Data of Employees</title>
	<link rel="stylesheet" href="../style.css">
          <form method="post" action="login_landing.php">
  	      <input type="submit" value="HOME" id="btn1">
            </form>
</head>

<style>

#editbtn
{
  background-color: green;
  color: white;
  width: 130px;
  font-size: 15px;
  height: 25px;
}

#deletebtn
{
  background-color: red;
  color: white;
  width: 130px;
  font-size: 15px;
  height: 25px;
}

#btn1
{
        background-color: black;
	color: white;
	height: 30px;
	width: 100px;
	display: inline-block;
	border-radius: 25px;
	font-size: 15px;
	font-style: all;
	text-align: center;
	margin-left: 700px;
	margin-top: 0px;
}
</style>

<body background="50.jpg">
	<h1> All Data of Employees </h1> <hr> <br>
<table style="width:100%;">


   <form style="margin-top: 5%;" action="../CSE299-Project/searchin.php" method= "post">

<input type="text" name="search" placeholder="Search">
<input type="submit" value="Search" style="margin-top: 0.0000005%; color: green;">
</form>

<form action="sortlist.php" method="post">
	<input type="submit" name="nasc" value="Name Ascending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 150px;">
</form>

<form action="sortlist.php" method="post">
	<input type="submit" name="ndsc" value="Name Descending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 10px;">
</form>

<form action="sortlist.php" method="post">
	<input type="submit" name="basc" value="Birth Date Ascending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 10px;">
</form>

<form action="sortlist.php" method="post">
	<input type="submit" name="bdsc" value="Birth Date Descending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 10px;">
</form>

<form action="sortlist.php" method="post">
	<input type="submit" name="sasc" value="Salary Ascending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 10px;">
</form>

<form action="sortlist.php" method="post">
	<input type="submit" name="sdsc" value="Salary Descending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 10px;">
</form>

<form action="sortlist.php" method="post">
	<input type="submit" name="pasc" value="Phone Number Ascending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 10px;">
</form>
<br><br>
</table>

<table border="3" cellspacing="9" style="text-align: center;">
	
<tr>
	<th>Employee ID</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Address</th>
	<th>Phone Number</th>
	<th>Email</th>
	<th>Birth Date</th>
	<th>Salary</th>
	<th>Gender</th>
        <th colspan="2" align="center">Operations</th>
</tr>

<?php
include("db_connection.php");
$query = "select * from employee";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total!=0)
{
	while($result=mysqli_fetch_assoc($data))
	{
		echo "
		<tr>
		<td>".$result['Employee_ID']."</td>
		<td>".$result['Fname']."</td>
		<td>".$result['Lname']."</td>
		<td>".$result['Address']."</td>
		<td>".$result['Phone_No']."</td>
		<td>".$result['Email']."</td>
		<td>".$result['Birth_Date']."</td>
		<td>".$result['Salary']."</td>
		<td>".$result['Gender']."</td>
		<td><a href = 'update.php?eid=".$result['Employee_ID']."&fn=".$result['Fname']."&ln=".$result['Lname']."&ad=".$result['Address']."&pn=".$result['Phone_No']."&em=".$result['Email']."&bd=".$result['Birth_Date']."&sal=".$result['Salary']."&gen=".$result['Gender']."'><input type='submit' id='editbtn' value='Edit/Update'></td>
		<td><a href = 'delete.php?eid=".$result['Employee_ID']."' onclick='return checkDelete()'><input type='submit' id='deletebtn' value='Delete'></td>
		</tr>
		";
	}
}
else
{
	echo "No Records Found";
}

?>
</table>

<script>
	function checkDelete()
	{
		return confirm('Are You Sure You Want to Delete This Record?');
	}
</script>

</body>
</html>