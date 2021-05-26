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
        <meta charset="utf-8">
    <meta name = "author" content="Swakshar">
    <meta name="description" content="Index Page">
    <link rel="stylesheet" type = "text/css" href="style.css">

    <title> Home Page </title>

  </head>
  <h1 id = "MainTitle01"> Employee Information Page </h1>
  <hr id="hr01">

<form method="post" action="logout.php">
<tr><td><input type="submit" value="Logout" id="btn2"></td></tr>
</form>

  <body background="30.jpg">
    
  <div>
    <ul>
      <li> <a href="employees.php"> Employees </a></li>
      <li> <a href="department.php"> Departments </a></li>
      <li> <a href="payment.php"> Payment Information </a></li>
    </ul>
  </div>
</body>


  <h3 style=" margin-top: 40px; text-decoration: underline; margin-right: 800px;">  Employee Recruit Form  </h3>

 <div class= "form">
  <form style="margin-left: -370px;" action="employeeInput.php" method="post">
    <label> Employee ID </label>
    <input type="number" name="e_id" placeholder="" required>
    <br>
    <label> First Name </label>
    <input type="text" name="fname" size="25" placeholder="" required>
    <br>
    <label> Last Name </label>
    <input type="text" name="lname" size="25" placeholder="" required>
    <br>
    <label> Address </label>
    <input type="text" name="address" size="30" placeholder="" required>
    <br>
    <label> Phone Number </label>
    <input type="number" name="pnumber" placeholder="" required>
    <br>
    <label> Email </label>
    <input type="email" name="em" size="25" placeholder="" required>
    <br>
    <label> Birth Date </label>
    <input type="Date" name="date" size="25" placeholder="" required>
    <br>
    <label> Salary </label>
    <input type="number" name="salary" placeholder="" required>
    <br>
    <label> Gender </label>
    <input type="text" name="gender" size="20" placeholder="Male/Female/Others" required>
     <br>
    <input type="submit" value="Submit " id="btn">
  </form>
</div>

<h3 style=" margin-top: -480px; text-decoration: underline; margin-left: 750px;">  Employee Payment Form  </h3>

 <div class= "form">
  <form style="margin-left: 400px;" action="paymentInput.php" method="post">
    <label> Account Number </label>
    <input type="number" name="acc_num" placeholder="" required>
    <br>
    <label> Employee ID </label>
<?php
include("db_connection.php");
$query = "select * from employee";
$data = mysqli_query($conn, $query); 
?>
<select name="eid">
<?php
  while($result=mysqli_fetch_assoc($data))
  {
    echo "<option>".$result['Employee_ID']."</option>";
  }
 ?>
    </select>
    <br>
    <label> Absent </label>
    <input type="number" name="abs" size="25" placeholder="" required>
    <br>
    <label> Loan Cut </label>
    <input type="number" name="lcut" size="30" placeholder="" required>
    <br>
    <label> Overtime Bonus </label>
    <input type="number" name="over" placeholder="" required>
    <br>
    <label> Seasonal Bonus </label>
    <input type="number" name="season" size="25" placeholder="" required>
    <br>
    <label> Other Bonus </label>
    <input type="number" name="other" size="25" placeholder="" required>
    <br>
    <label> Total Payment </label>
    <input type="number" name="total" placeholder="" required>
    <br>
    <label> Payment Date </label>
    <input type="Date" name="pdate" required>
     <br>
    <input type="submit" value="Submit " id="btn">
  </form>
</div>

<h3 style=" margin-top: -475px; text-decoration: underline; margin-right: 0px;">  Department Addition  </h3>

 <div class= "form">
  <form style="margin-left: 20px;" action="departInput.php" method="post">
    <label> Department Number </label>
    <input type="number" name="dnum" size="15" placeholder="" required>
    <br>
    <label> Department Name </label>
    <input type="text" name="dname" size="25" placeholder="" required>
    <br>
    <label> Manager ID </label>
    <?php
include("db_connection.php");
$query = "select * from employee";
$data = mysqli_query($conn, $query); 
?>
<select name="mid">
<?php
  while($result=mysqli_fetch_assoc($data))
  {
    echo "<option>".$result['Employee_ID']."</option>";
  }
 ?>
    </select>
    <br>
    <label> Manager Start Date </label>
    <input type="Date" name="mdate" size="15" placeholder="" required>
    <br>
    <input type="submit" value="Submit " id="btn">
  </form>
</div>

</html>