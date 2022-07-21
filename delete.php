<?php

include "database.php"; 
if(isset($_POST['delete'])){

    $id = $_POST['id'];   
    $query = "DELETE FROM posts WHERE id=$id"; 
    $result = mysqli_query($conn, $query);
    echo '<script type="text/javascript"> alert("Delete " )  </script>';
   //header ("Location: index.php");
   $error="delete";
    include("sites/myoffers_subpage.php");

  
    //exit ();

 }

?>


 