<?php

session_start();
require_once "database.php";
$categoryerror=$_GET["scrolldown"];
if($categoryerror="Fishing")
{
    $error="empty category";
    include("sites/addoffer_subpage.php");
    exit();
}
?>