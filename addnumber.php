
<?php
if(isset($_POST["phonenumber"]))
{
    require_once("database.php");
    require_once("functions.php");

    $phone= $_POST["phonenumber"];

    if(emptyInputPhone($phone)!==false)
    {
        header("location: ../login.php?error=emptyinput");
        exit();
    }


}


?>