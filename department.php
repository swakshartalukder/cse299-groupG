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
	<title>All Data of Departments</title>
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

<body background="60.jpg">
	<h1> All Data of Departments </h1> <hr> <br>
<table style="width:100%">


   <form style="margin-top: 5%;" action="../CSE299-Project/depsearch.php" method= "post">

<input type="text" name="depsearch" placeholder="Search">
<input type="submit" value="Search" style="margin-top: 0.0000005%; color: green;">
</form>

<form action="depsortlist.php" method="post">
	<input type="submit" name="dnasc" value="Name Ascending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 50px;">
</form>

<form action="depsortlist.php" method="post">
	<input type="submit" name="dndsc" value="Name Descending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 10px;">
</form>

<form action="depsortlist.php" method="post">
	<input type="submit" name="miasc" value="Manager ID Ascending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 10px;">
</form>

<form action="depsortlist.php" method="post">
	<input type="submit" name="midsc" value="Manager ID Descending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 10px;">
</form>

<form action="depsortlist.php" method="post">
	<input type="submit" name="masc" value="Manager Date Ascending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 10px;">
</form>

<form action="depsortlist.php" method="post">
	<input type="submit" name="mdsc" value="Manager Date Descending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 10px;">
</form>
<br><br>

</table>

<table border="3" cellspacing="9" style="text-align: center;">
	
<tr>
	<th>Department Number</th>
	<th>Department Name</th>
	<th>Manager ID</th>
	<th>Manager Start Date</th>
        <th colspan="2" align="center">Operations</th>
</tr>

<?php
include("db_connection.php");
$query = "select * from department";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total!=0)
{
	while($result=mysqli_fetch_assoc($data))
	{
		echo "
		<tr>
		<td>".$result['Depart_Number']."</td>
		<td>".$result['Depart_Name']."</td>
		<td>".$result['Manager_ID']."</td>
		<td>".$result['Manager_StartDate']."</td>
		<td><a href = 'depupdate.php?dn=".$result['Depart_Number']."&dnm=".$result['Depart_Name']."&mid=".$result['Manager_ID']."&md=".$result['Manager_StartDate']."'><input type='submit' id='editbtn' value='Edit/Update'></td>
		<td><a href = 'depdel.php?dn=".$result['Depart_Number']."' onclick='return checkDelete()'><input type='submit' id='deletebtn' value='Delete'></td>
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