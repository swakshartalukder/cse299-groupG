<?php
include("db_connection.php");
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$login_status = "Unsuccessful";

if(trim($username) == "" || trim($password) == "" ){
  echo "Please enter a valid username."."<br>";

  $url = "http://www.empmansys.com/CSE299-Project/elogin.php";
  header("Refresh: 2; URL= $url");
}

else {
  $sql = "SELECT employee.Fname, employee.Employee_ID \n"

    . "FROM employee\n"

    . "WHERE employee.Fname = '$username' AND employee.Employee_ID = '$password' ";

  $result = mysqli_query($conn, $sql);
  $row_num = mysqli_num_rows($result);
  if($row_num==1) $login_status = "successful";

}

if($login_status == "successful"){
  $_SESSION['user_name'] = $username;
  $_SESSION['pass_word'] = $password;
  $url = "http://www.empmansys.com/CSE299-Project/elogin_landing.php";
  header("Refresh: 2; URL= $url");
}
else{
  echo $login_status;
  $url = "http://www.empmansys.com/CSE299-Project/elogin.php";
  header("Refresh: 2; URL= $url");
}

?>
