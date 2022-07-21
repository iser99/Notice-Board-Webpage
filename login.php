<?php

$error="none";


if(isset($_POST["submit"]))
{
    $login=$_POST["login"];
    $passwd= $_POST["passwd"];

    require_once "database.php";
    require_once "functions.php";
    if(emptyInputLogin($login, $passwd)!==false)
    {
        
        $error="empty input";
        include("sites/login_subpage.php");
        exit();
    }
    
    if(loginUser($conn, $login, $passwd)==false);
    {
        $error="wrong password";
        include("sites/login_subpage.php");
        exit();
    }
    

}
else
{
    exit();
}



?>