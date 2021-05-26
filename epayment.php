<?php
session_start();
error_reporting(0);
$user = $_SESSION['pass_word'];

if($user == true)
{

}
else
{
	sleep(1);
  header('location:elogin.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Information of Payment</title>
	<link rel="stylesheet" href="../style.css">
        <form method="post" action="elogin_landing.php">
  	<input type="submit" value="HOME" id="btn1">
  </form>
</head>

<style>

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
<br><br>

<body background="50.jpg">
	<h1> Information of Payment </h1> <hr> <br>
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
</tr>

<?php
include("db_connection.php");
$name = $_SESSION['user_name'];
$query = "SELECT p.Account_No, p.E_ID, p.Absent, p.Loan_cut, p.Overtime, p.Seasonal_Bonus, p.Other_Bonus, p.Total_Payment, p.Payment_Date
FROM employee e, payment_info p
WHERE p.E_ID = e.Employee_ID AND e.Fname = '".$name."'";
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

</body>
</html>