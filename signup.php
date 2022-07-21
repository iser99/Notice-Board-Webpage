<?php
 
$error="none";
if(isset($_POST["submit"]))
{
    

    $login= $_POST["login"];
    $passwd= $_POST["passwd"];
    $passwd2= $_POST["passwd2"];
    $email=$_POST["email"];

    require_once("database.php");
    require_once("functions.php");
   

    if(emptyInputSignup($email, $login, $passwd, $passwd2)!==false)
    {
        $error="empty input";
        include("sites/register_subpage.php");
        exit();
    }
    if(invalidUserId($login)!==false)
    {
        $error="wrong username";
        include("sites/register_subpage.php");
        exit();
    }
    if(invalidEmail($email)!==false)
    {
        $error="wrong email";
        include("sites/register_subpage.php");
        exit();
    }
    if(passwdMatch($passwd,$passwd2)!==false)
    {
        $error="wrong password";
        include("sites/register_subpage.php");
        exit();
    }
    if(userExists($conn, $login,$email)!==false)
    {
        $error="user exists";
        include("sites/register_subpage.php");
        exit();
    }
    createUser($conn, $login, $email, $passwd);
    
}

       

else
{
    //header("location: ../signup.php?error=none");
    exit();
}






?>