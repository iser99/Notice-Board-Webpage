<?php
session_start();

    
    $username=$_GET['showuser'];
    require_once "database.php";
    //echo " <p> You are visiting " . $username . "'s profile!</p>";
    $sql = " SELECT* FROM users WHERE username='$username' ;";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    $user_id =$row['id'];

    $username_log= $_SESSION["username"];
    $query = " SELECT* FROM users WHERE username='$username_log' ;";
    $results = mysqli_query($conn, $query);
    $row_id = mysqli_fetch_assoc($results);

    $userlog_id =$row_id['id'];
    

    include_once("sites/showuser_subpage.php");
    include_once("rating_ajax.php");
    




?>
