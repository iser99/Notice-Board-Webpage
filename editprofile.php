<?php
  error_reporting(0);
  require_once("database.php");
  session_start();
  
if(isset($_POST["submit-editprofile"]))
{
  
    $username=$_SESSION['username'];
    $firstname= $_POST["firstname"];
    $lastname= $_POST["lastname"];
    $voivodship= $_POST["voivodship"];
    $city=$_POST["city"];
    $phone = $_POST['phone'];
    $date   = date('Y-m-d',strtotime($_POST['date']));

    $query = " UPDATE users SET firstname='$_POST[firstname]', lastname='$_POST[lastname]', voivodship='$_POST[voivodship]', city='$_POST[city]',  birthdate='$_POST[date]', phone='$_POST[phone]' WHERE username='$username'  ";
    $query_run = mysqli_query($conn,$query);


    if($query_run) 
    {
       
        //echo '<script type="text/javascript"> alert("Data update " )  </script>';
        $error= "profile updated";
        include "sites/userprofile_subpage.php";
        exit();

    }
    else 
    {
        echo '<script type="text/javascript"> alert("Data not update") </script>';
    }



}


else
{
}


?>



