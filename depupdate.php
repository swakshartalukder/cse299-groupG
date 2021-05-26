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

$dn = $_GET['dn'];
$dnm = $_GET['dnm'];
$mid = $_GET['mid'];
$md = $_GET['md'];

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
    <label> Department Number </label>
    <input type="number" name="dnum" value="<?php echo "$dn" ?>" placeholder="" required>
    <br>
    <label> Department Name </label>
    <input type="text" name="dname" value="<?php echo "$dnm" ?>" size="25" placeholder="" required>
    <br>
    <label> Manager ID </label>
    <?php
include("db_connection.php");
$query = "select * from employee";
$data = mysqli_query($conn, $query); 
?>
<select name="manid">
<?php
  while($result=mysqli_fetch_assoc($data))
  {
    echo "<option>".$result['Employee_ID']."</option>";
  }
 ?>
    </select>
    <br>
    <label> Manager Start Date </label>
    <input type="Date" name="mdate" value="<?php echo "$md" ?>" size="30" placeholder="" required>
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
	$dnum = $_GET['dnum'];
	$dname = $_GET['dname'];
	$manid = $_GET['manid'];
	$mdate = $_GET['mdate'];

	$sql = "update department set Depart_Number = '$dnum', Depart_Name = '$dname', Manager_ID = '$manid', Manager_StartDate = '$mdate' where Depart_Number = '$dnum'";

	$data = mysqli_query($conn,$sql);

	if($data)
	{
		echo "<script>alert('Record Updated')</script>";
		?>
		<META HTTP-EQUIV = "Refresh" CONTENT = "0; URL = http://www.empmansys.com/CSE299-Project/department.php">
		<?php
	}
	else
	{
		echo "Failed to Update Record";
	}
}

?>
