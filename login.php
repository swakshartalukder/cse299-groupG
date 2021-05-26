<html>
<head>
	<title>Log in Form</title>
<style>
	table
	{
		color: white;
		font-size: 25px;

	}
#btn
{
	background-color: green;
	color: white;
	height: 25px;
	width: 70px;
	border-radius: 25px;
}
#btn1
{
	background-color: blue;
	color: white;
	height: 50px;
	width: 250px;
	display: inline-block;
	border-radius: 25px;
	font-size: 25px;
	text-align: center;
	margin-left: 100px;
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
<h1 id = "MainTitle01"> Employee Management System </h1>
<h4 id="h4ForUser"> Admin Panel </h4>
<br><br>
<form method="post" action="elogin.php">
<tr><td align="center" colspan="2"><input type="submit" value="Employee Log In" id="btn1"></td></tr>
</form>
<body background= "20.jpg">


<br><br><br><br>

<div class="login_form">

      <form method="post" action="login_backend.php">
	<table border="0" align="center" cellspacing="30">
		
	<tr><td>Username <input type="text" name="username" placeholder="Enter Your Username" required></td></tr>
	<tr><td>Password <input type="text" name="password" placeholder="Enter Your Password" required></td></tr>
	<tr><td align="center" colspan="2"><input type="submit" value="Log In" id="btn"></td></tr>
</body>
</table>
</form>
    </div>


</html>