<?php

session_start();

session_unset();

sleep(1);
header('location:login.php');

?>