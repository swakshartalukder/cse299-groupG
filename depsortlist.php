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
if(isset($_POST['dnasc'])){
  $dnasc = $_POST['dnasc'];
  $query = "SELECT * FROM `department` ORDER BY Depart_Name ASC";
  $depsearch_result = filterTable($query);
}
else if(isset($_POST['dndsc'])){
  $dndsc = $_POST['dndsc'];
  $query = "SELECT * FROM `department` ORDER BY Depart_Name DESC";
  $depsearch_result = filterTable($query);
}
else if(isset($_POST['miasc'])){
  $miasc = $_POST['miasc'];
  $query = "SELECT * FROM `department` ORDER BY Manager_ID ASC";
  $depsearch_result = filterTable($query);
}
else if(isset($_POST['midsc'])){
  $midsc = $_POST['midsc'];
  $query = "SELECT * FROM `department` ORDER BY Manager_ID DESC";
  $depsearch_result = filterTable($query);
}
else if(isset($_POST['masc'])){
  $masc = $_POST['masc'];
  $query = "SELECT * FROM `department` ORDER BY Manager_StartDate ASC";
  $depsearch_result = filterTable($query);
}
else if(isset($_POST['mdsc'])){
  $mdsc = $_POST['mdsc'];
  $query = "SELECT * FROM `department` ORDER BY Manager_StartDate DESC";
  $depsearch_result = filterTable($query);
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
  <th>Department Number</th>
  <th>Department Name</th>
  <th>Manager ID</th>
  <th>Manager Start Date</th>
</tr>

    <?php

    while($row = mysqli_fetch_row($depsearch_result))
    {
      ?>

    <tr>
      <th> <?php echo $row[0];?> </th>
      <th> <?php echo $row[1];?> </th>
      <th> <?php echo $row[2];?> </th>
      <th> <?php echo $row[3];?> </th>
    </tr>
  <?php } ?>

</table>

</body>

</html>
