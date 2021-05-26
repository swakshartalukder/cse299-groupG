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
if(isset($_POST['search'])){
  $valueToSearch = $_POST['search'];
  $query = "SELECT * FROM `employee` where CONCAT(`Employee_ID`, `Fname`, `Lname`, `Address`, `Phone_No`, `Email`, `Salary`) LIKE '%".$valueToSearch."%'";
  $search_result = filterTable($query);
}
else {
  $query = "select * from employee";
  $search_result = filterTable($query);
}

function filterTable($query)
{
  $connect = mysqli_connect("localhost", "root", "", "project");
  $filter_Result = mysqli_query($connect, $query);
  return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
          <form method="post" action="login_landing.php">
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

<body background="50.jpg">
  <h1> Results </h1> <hr> <br>
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
</tr>

    <?php

    while($row = mysqli_fetch_row($search_result)):?>

    <tr>
      <th> <?php echo $row[0];?> </th>
      <th> <?php echo $row[1];?> </th>
      <th> <?php echo $row[2];?> </th>
      <th> <?php echo $row[3];?> </th>
      <th> <?php echo $row[4];?> </th>
      <th> <?php echo $row[5];?> </th>
      <th> <?php echo $row[6];?> </th>
      <th> <?php echo $row[7];?> </th>
      <th> <?php echo $row[8];?> </th>
    </tr>
  <?php endwhile;?>

</table>

</body>

</html>
