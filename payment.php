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
	<title>Information of Payment</title>
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
	<h1> Information of Payment </h1> <hr> <br>
<table style="width:100%;">


   <form style="margin-top: 5%;" action="../CSE299-Project/paysearch.php" method= "post">

<input type="text" name="paysearch" placeholder="Search">
<input type="submit" value="Search" style="margin-top: 0.0000005%; color: green;">
</form>

<form action="paysortlist.php" method="post">
	<input type="submit" name="iasc" value="ID Ascending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 150px;">
</form>

<form action="paysortlist.php" method="post">
	<input type="submit" name="idsc" value="ID Descending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 10px;">
</form>

<form action="paysortlist.php" method="post">
	<input type="submit" name="pasc" value="Payment Ascending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 10px;">
</form>

<form action="paysortlist.php" method="post">
	<input type="submit" name="pdsc" value="Payment Descending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 10px;">
</form>

<form action="paysortlist.php" method="post">
	<input type="submit" name="dasc" value="Date Ascending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 10px;">
</form>

<form action="paysortlist.php" method="post">
	<input type="submit" name="ddsc" value="Date Descending" style="margin-top: -100px; background-color: blue; color: white; margin-left: 10px;">
</form>
<br><br>

</table>

<table border="3" cellspacing="9" style="text-align: center;">
	
<tr>
	<th>Account Number</th>
	<th>Employee ID</th>
	<th>Absent</th>
	<th>Loan Cut</th>
	<th>Overtime Bonus</th>
	<th>Seasonal Bonus</th>
	<th>Other Bonus</th>
	<th>Total Payment</th>
	<th>Payment Date</th>
	<th colspan="2" align="center">Operations</th>
</tr>

<?php
include("db_connection.php");
$query = "select * from payment_info";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total!=0)
{
	while($result=mysqli_fetch_assoc($data))
	{
		echo "
		<tr>
		<td>".$result['Account_No']."</td>
		<td>".$result['E_ID']."</td>
		<td>".$result['Absent']."</td>
		<td>".$result['Loan_cut']."</td>
		<td>".$result['Overtime']."</td>
		<td>".$result['Seasonal_Bonus']."</td>
		<td>".$result['Other_Bonus']."</td>
		<td>".$result['Total_Payment']."</td>
		<td>".$result['Payment_Date']."</td>
		<td><a href = 'payupdate.php?an=".$result['Account_No']."&ed=".$result['E_ID']."&abs=".$result['Absent']."&lc=".$result['Loan_cut']."&ot=".$result['Overtime']."&sb=".$result['Seasonal_Bonus']."&ob=".$result['Other_Bonus']."&tp=".$result['Total_Payment']."&pd=".$result['Payment_Date']."'><input type='submit' id='editbtn' value='Edit/Update'></td>
		<td><a href = 'paydel.php?an=".$result['Account_No']."' onclick='return checkDelete()'><input type='submit' id='deletebtn' value='Delete'></td>
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