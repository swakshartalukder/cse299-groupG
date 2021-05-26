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
if(isset($_POST['iasc'])){
  $iasc = $_POST['iasc'];
  $query = "SELECT * FROM `payment_info` ORDER BY E_ID ASC";
  $paysearch_result = filterTable($query);
}
else if(isset($_POST['idsc'])){
  $idsc = $_POST['idsc'];
  $query = "SELECT * FROM `payment_info` ORDER BY E_ID DESC";
  $paysearch_result = filterTable($query);
}
else if(isset($_POST['pasc'])){
  $pasc = $_POST['pasc'];
  $query = "SELECT * FROM `payment_info` ORDER BY Total_Payment ASC";
  $paysearch_result = filterTable($query);
}
else if(isset($_POST['pdsc'])){
  $pdsc = $_POST['pdsc'];
  $query = "SELECT * FROM `payment_info` ORDER BY Total_Payment DESC";
  $paysearch_result = filterTable($query);
}
else if(isset($_POST['dasc'])){
  $dasc = $_POST['dasc'];
  $query = "SELECT * FROM `payment_info` ORDER BY Payment_Date ASC";
  $paysearch_result = filterTable($query);
}
else if(isset($_POST['ddsc'])){
  $ddsc = $_POST['ddsc'];
  $query = "SELECT * FROM `payment_info` ORDER BY Payment_Date DESC";
  $paysearch_result = filterTable($query);
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

<body background="60.jpg">
  <h1> Results </h1> <hr> <br>
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

    while($row = mysqli_fetch_row($paysearch_result))
    {
      ?>

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
  <?php } ?>

</table>

</body>

</html>