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
    <title> Employee Home Page </title>
<style>
table
{
	color: white;
	font-size: 20px;
	background-color: black;

}

#btn1
{
	background-color: black;
	color: white;
	height: 100px;
	width: 500px;
	display: inline-block;
	border-radius: 25px;
	font-size: 50px;
	font-style: all;
	text-align: center;
	margin-left: 400px;
}

#btn
{
	background-color: blue;
	color: white;
	height: 50px;
	width: 500px;
	display: inline-block;
	border-radius: 25px;
	font-size: 25px;
	text-align: center;
	margin-left: 400px;
}

#btn2
{
	background-color: green;
	color: white;
	height: 30px;
	width: 150px;
	display: inline-block;
	border-radius: 25px;
	font-size: 15px;
	text-align: center;
	margin-left: 1000px;
}
#MainTitle01
{
	margin: 10px;
	color: red;
	font-style: bold;
	text-align: center;
	font-size: 50px;
}
#h4ForUser
{
	color: white;
	font-style: bold;
	margin-top: -10px;
	margin-left: 800px;
	font-size: 25px;
}

</style>

  </head>
  <h1 id = "MainTitle01"> Employee Payment Information Page </h1>
  <hr id="hr01">

  <body background="70.jpg">
  	<form method="post" action="elogout.php">
<tr><td align="center" colspan="3"><input type="submit" value="Logout" id="btn2"></td></tr>
</form>
</body>
<br><br>
<form method="post">
<tr><td align="center" colspan="3"><input type="text-align" value="<?php
include("db_connection.php");
session_start();

echo "Welcome ".$_SESSION['user_name'];
?>" id="btn1"></td></tr>
</form>
<br><br><br>
<form method="post" action="epayment.php">
<tr><td align="center" colspan="3"><input type="submit" value="See Your Payment Information" id="btn"></td></tr>
</form>


</html>
