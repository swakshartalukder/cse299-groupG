<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
{
	echo "Coonection Failed".mysqli_connect_error();
}


?>