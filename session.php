<?php

session_start();
$_SESSION["username"]="Cyber Warriors";
echo $_SESSION["username"];
session_unset();

?>