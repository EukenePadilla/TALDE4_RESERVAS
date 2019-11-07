<?php

session_start();
$user=$_SESSION['usuario'];

echo $user;
exit();
?>