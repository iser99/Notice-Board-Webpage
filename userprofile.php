<?php



if(isset($_POST["addoffer"]))
{
    
    include("sites/addoffer_subpage.php");
    require_once("database.php");

   
}
if(isset($_POST["myoffers"]))
{
    include("sites/myoffers_subpage.php");

}
if(isset($_POST["editprofile"]))
{
    include("sites/editprofile_subpage.php");
}


?>