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

$an = $_GET['an'];
$ed = $_GET['ed'];
$abs = $_GET['abs'];
$lc = $_GET['lc'];
$ot = $_GET['ot'];
$sb = $_GET['sb'];
$ob = $_GET['ob'];
$tp = $_GET['tp'];
$pd = $_GET['pd'];

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
    <label> Account Number </label>
    <input type="number" name="accnum" value="<?php echo "$an" ?>" placeholder="" required>
    <br>
    <label> Employee ID </label>
    <?php
include("db_connection.php");
$query = "select * from employee";
$data = mysqli_query($conn, $query); 
?>
<select name="emid">
<?php
  while($result=mysqli_fetch_assoc($data))
    {
      echo "<option>".$result['Employee_ID']."</option>";
    }
 ?>
    </select>

    <br>
    <label> Absent </label>
    <input type="number" name="absent" value="<?php echo "$abs" ?>" size="25" placeholder="" required>
    <br>
    <label> Loan Cut </label>
    <input type="number" name="lcut" value="<?php echo "$lc" ?>" size="30" placeholder="" required>
    <br>
    <label> Overtime Bonus </label>
    <input type="number" name="obonus" value="<?php echo "$ot" ?>" placeholder="" required>
    <br>
    <label> Seasonal Bonus </label>
    <input type="number" name="sbonus" value="<?php echo "$sb" ?>" size="25" placeholder="" required>
    <br>
    <label> Other Bonus </label>
    <input type="number" name="other" value="<?php echo "$ob" ?>" size="25" placeholder="" required>
    <br>
    <label> Total Payment </label>
    <input type="number" name="total" value="<?php echo "$tp" ?>" size="25" placeholder="" required>
    <br>
    <label> Payment Date </label>
    <input type="Date" name="paydate" value="<?php echo "$pd" ?>" size="20" placeholder="" required>
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
	$accnum = $_GET['accnum'];
	$emid = $_GET['emid'];
	$absent = $_GET['absent'];
	$lcut = $_GET['lcut'];
	$obonus = $_GET['obonus'];
	$sbonus = $_GET['sbonus'];
	$other = $_GET['other'];
	$total = $_GET['total'];
	$paydate = $_GET['paydate'];

	$sql = "update payment_info set Account_No = '$accnum', E_ID = '$emid', Absent = '$absent', Loan_cut = '$lcut', Overtime = '$obonus', Seasonal_Bonus = '$sbonus', Other_Bonus = '$other', Total_Payment = '$total', Payment_Date = '$paydate' where Account_No = '$accnum'";

	$data = mysqli_query($conn,$sql);

	if($data)
	{
		echo "<script>alert('Record Updated')</script>";
		?>
		<META HTTP-EQUIV = "Refresh" CONTENT = "0; URL = http://www.empmansys.com/CSE299-Project/payment.php">
		<?php
	}
	else
	{
		echo "Failed to Update Record";
	}
}

?>
