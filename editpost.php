<?php

//include("editpost_subpage.php");
require_once("database.php");
$error="";

if(isset($_POST["submit-editpost"]))


{ 
   // $id = $_POST['id'];

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
     $title = mysqli_real_escape_string($conn, $_POST['title']);   
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
 
    //$query = " UPDATE posts SET category='$category', title='$title', description='$description', short_description='$short_description' WHERE id='$id'  ";
    
    
    if(empty($category) || empty($description) || empty($short_description) || empty($title)) 
    {
        //$id = $_POST['id'];
      
        $error="empty input";
        include "editpost_subpage.php";    
        exit();    	
        } 

        else {
        $result = mysqli_query($conn, " UPDATE posts SET category='$category', title='$title', description='$description', short_description='$short_description' WHERE id='$id'  "); 
        include("sites/myoffers_subpage.php");
        //header("Location: showpost.php?id=".$_POST['id']);   
        $error="none";
        //include "editpost_subpage.php";
     
}
 



}


?>
