<?php
include "database.php";
include("rating.php");


if(isset($_POST["rating"]))
{ 
$rating = $_POST['rating'];
$user_id = $_POST['user_id'];

// Check entry within table
$query = "SELECT COUNT(*) AS cntpost FROM user_rating WHERE user_id='$user_id' and userlog_id='$userlog_id'";
$result = mysqli_query($conn,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];

if($count == 0){
  //  $insertquery = "INSERT INTO user_rating(userlog_id,user_id,rating) values(".$userlog_id.",".$user_id.",".$rating.")";
  $insertquery = "INSERT INTO user_rating(userlog_id,user_id,rating) values(".$userlog_id.",".$user_id.",".$rating.")";
    mysqli_query($conn,$insertquery);

}else {
     $updatequery = "UPDATE user_rating SET rating=" . $rating . " where userlog_id=" . $userlog_id . " and user_id=" . $user_id;
    mysqli_query($conn,$updatequery);
}


// get average
$query = "SELECT ROUND(AVG(rating),1) as averageRating FROM user_rating WHERE user_id='$user_id'";
$avgresult= mysqli_query($conn,$query) or die(mysqli_error());
$fetchAverage = mysqli_fetch_assoc($avgresult);
$averageRating = $fetchAverage['averageRating'];

$return_arr = array("averageRating"=>$averageRating);
echo json_encode($return_arr);




}