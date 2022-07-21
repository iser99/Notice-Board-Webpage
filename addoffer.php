<?php
    session_start();
    $error="";
    if(isset($_POST["addoffer"]))
    {
        require_once "database.php";
        require_once "functions.php";

        $title=$_POST["title"];
        $description=$_POST["description"];
        $shortdescription=$_POST["shortdescription"];
        
        $username=$_SESSION["username"];


        if(emptyInputPost($title,$description,$shortdescription)!==false)
        {
            $error= "empty input";
            //$_SESSION['error']=$error;
            include("sites/addoffer_subpage.php");    

            exit();     

        }
        if($category="")
        {
            $error="empty category";
            include("sites/addoffer_subpage.php");
        }
        
        createPost($conn,$username, $title,$category,$description, $shortdescription);
        $error="none";
        header("sites/addoffer_subpage.php");         
        //exit();
    
    
        }
    
    
    
    


?>