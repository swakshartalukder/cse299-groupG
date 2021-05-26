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
error_reporting(0);

$eid = $_GET['eid'];
$fn = $_GET['fn'];
$ln = $_GET['ln'];
$ad = $_GET['ad'];
$pn = $_GET['pn'];
$em = $_GET['em'];
$bd = $_GET['bd'];
$sal = $_GET['sal'];
$gen = $_GET['gen'];

?>

<html>
  <head>

    <link rel="stylesheet" type = "text/css" href="style.css">

    <title> Edit/Update </title>
    <style>
    	
#button
{
	background-color: green;
	color: white;
    height: 32px;
    width: 125px;
    border-radius: 25px;
    font-size: 16px;
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
	margin-left: -800px;
	margin-top: -100px;
}

    </style>

  </head>

  <body background="50.jpg">

  <h1> Edit/Update </h1> <hr> <br>

  <form method="post" action="login_landing.php">
  	<input type="submit" value="HOME" id="btn1">
  </form>

</body>

<div class= "form">
  <form style="margin-left: 50px;" action="" method="get">
    <label> Employee ID </label>
    <input type="number" name="e_id" value="<?php echo "$eid" ?>" placeholder="" required>
    <br>
    <label> First Name </label>
    <input type="text" name="fname" value="<?php echo "$fn" ?>" size="25" placeholder="" required>
    <br>
    <label> Last Name </label>
    <input type="text" name="lname" value="<?php echo "$ln" ?>" size="25" placeholder="" required>
    <br>
    <label> Address </label>
    <input type="text" name="address" value="<?php echo "$ad" ?>" size="30" placeholder="" required>
    <br>
    <label> Phone Number </label>
    <input type="number" name="pnumber" value="<?php echo "$pn" ?>" placeholder="" required>
    <br>
    <label> Email </label>
    <input type="email" name="em" value="<?php echo "$em" ?>" size="25" placeholder="" required>
    <br>
    <label> Birth Date </label>
    <input type="Date" name="date" value="<?php echo "$bd" ?>" size="25" placeholder="" required>
    <br>
    <label> Salary </label>
    <input type="number" name="salary" value="<?php echo "$sal" ?>" placeholder="" required>
    <br>
    <label> Gender </label>
    <input type="text" name="gender" value="<?php echo "$gen" ?>" size="20" placeholder="Male/Female/Others" required>
     <br>
     <tr>
     	<td colspan="2" align="center"><input type="submit" name="edit" id="button" value="Update Details"></td>
     </tr>
  </form>
</div>

</html>

<?php
include("db_connection.php");
error_reporting(0);

if($_GET['edit'])
{
	$e_id = $_GET['e_id'];
	$fname = $_GET['fname'];
	$lname = $_GET['lname'];
	$address = $_GET['address'];
	$pnumber = $_GET['pnumber'];
	$em = $_GET['em'];
	$date = $_GET['date'];
	$salary = $_GET['salary'];
	$gender = $_GET['gender'];

	$sql = "update employee set Employee_ID = '$e_id', Fname = '$fname', Lname = '$lname', Address = '$address', Phone_No = '$pnumber', Email = '$em', Birth_Date = '$date', Salary = '$salary', Gender = '$gender' where Employee_ID = '$e_id'";

	$data = mysqli_query($conn,$sql);

	if($data)
	{
		echo "<script>alert('Record Updated')</script>";
		?>
		<META HTTP-EQUIV = "Refresh" CONTENT = "0; URL = http://www.empmansys.com/CSE299-Project/employees.php">
		<?php
	}
	else
	{
		echo "Failed to Update Record";
	}
}

?>
