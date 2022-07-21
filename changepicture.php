<?php

session_start();
require_once("database.php");

$filepath= "uploads/";
$RandomNum=time();
$ImageName=str_replace('','-',strtolower($_FILES[$db_name]['name'][0]));
$ImageType=$_FILES[$db_name]['type'][0];

$ImageExt=substr($ImageName, strrpos($ImageName,'.'));
$ImageExt=str_replace('.','',$ImageExt);
$ImageName=preg_replace("/\.[^.\s]{3,4}$/","",$ImageName);
$NewImageName=$ImageName.'-'.$RandomNum.'.'.$ImageExt;

$ret[$NewImageName]=$filepath.$NewImageName;

//if file does not exist

if(!file_exists($filepath))
{
    @mkdir($output_dir,0777);
}
move_uploaded_file($_FILES[$db_name]["tmp_name"][0],$filepath."/".$NewImageName);
$sqlimg= "INSERT INTO users(image) VALUES($NewImageName)";

$sqlimgempty="SELECT * FROM users(image)";

if(empty($sqliempty))
{
    $profileimage="images/default-picture.jpg";
    $sqlidefault="INSERT INTO users(image) VALUES($profileimage)";
}

?>