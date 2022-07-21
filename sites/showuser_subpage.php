<?php
require_once "showuser.php";


?>

<html>

<head>
	<meta charset="utf-8" />
	<title>myExchange</title>
	<meta name="description" content="Opis naszej strony" />
	<meta name="keywords" content="wymiana usług, praca za prace, praca, usługa" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Jura:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/style.css">

 <!-- CSS -->
 <link href="style1.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link href='jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
        
        <!-- Script -->
        <script src="jquery-3.0.0.js" type="text/javascript"></script>
        <script src="jquery-bar-rating-master/dist/jquery.barrating.min.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(function() {
            $('.rating').barrating({
                theme: 'fontawesome-stars',
                onSelect: function(value, text, event) {

                    // Get element id by data-id attribute
                    var el = this;
                    var el_id = el.$elem.data('id');

                    // rating was selected by a user
                    if (typeof(event) !== 'undefined') {
                        
                        var split_id = el_id.split("_");

                        var user_id = split_id[1];  // user_id

                        // AJAX Request
                        $.ajax({
                            url: 'rating_ajax.php',
                            type: 'post',
                            data: {user_id:user_id,rating:value},
                            dataType: 'json',
                            success: function(data){
                                // Update average
                                var average = data['averageRating'];
                                $('#avgrating_'+user_id).text(average);
                            }
							
                        });
                    }
                }
            });
        });
      
        </script>

</head>

<div class=container>
<div class=container>
<div class="topbar">
	<div class="header">
		<a class="header_toolbar-link" href="index.php">myExchange</a>
	</div>
	<div class="header_login">
		<?php
		if (isset($_SESSION["username"])) {
			echo ' <a class="header_toolbar-link" href="/?action=userprofile">Profile page</a> ';
			echo ' <a class="header_toolbar-link" href="/?action=log_out">Log out</a>  ';
		} else {
			echo '<a class="header_toolbar-link" href="/?action=zaloguj_sie">Log in</a>';
			echo '<a class="header_toolbar-link" href="/?action=zarejestruj_sie">Sign up </a>';
		}
		?>
	</div>
</div>



<div class="center">
	<div class="centersign">
		<form method="post" action="userposts_subpage.php">

			<div class="section_heading">
				<?php
				echo "<h2><strong> You are visiting ".$username."'s profile</strong>  </h2>";
				?>

			</div>

			<div class="sign_body">

				<div class="form-section2">

				

					<div class="sign_body">

						<div class="form-group-inline">
							<div id="pic-profilecon">
								<style nonce="">
									.pic-profile {

										align-items: center;
									}
								</style>
								<figure class="pic-profile" aria-hidden="true">
									<img src="images/default-picture.jpg" class="img-responsive" alt="" width="150px" height="150px">
								</figure>
							</div>

							

						</div>

					</div>
				</div>

				<div class="form-group-inline">
					<h2><strong>Basic info:</strong> </h2><br>

					<div class="user_info">
						<?php
						if($row['firstname']==NULL)
						{
							echo "<p><b>First name: </b> not added</p>";
						}
						else
						{
							echo "<p><b>First name: </b> ".$row['firstname']."<p>";
						}

						if($row['lastname']==NULL)
						{
							echo "<p><b>Last name: </b> not added</p>";
						}
						else
						{
							echo "<p><b>Last name: </b> ".$row['lastname']."<p>";
						}

						if($row['phone']==NULL)
						{
							echo "<p><b>Phone: </b> not added</p>";
						}
						else
						{
							echo "<p><b>Phone number: </b> ".$row['phone']."<p>";
						}

						if($row['city']==NULL)
						{
							echo "<p><b>City: </b> not added</p>";
						}
						else
						{
							echo "<p><b>City: </b> ".$row['city']."<p>";
						}
						if($row['voivodship']==NULL)
						{
							echo "<p><b>Voivodship: </b> not added</p>";
						}
						else
						{
							echo "<p><b>Voivodship: </b> ".$row['voivodship']."<p>";
						}

						if($row['birthdate']==NULL)
						{
							echo "<p><b>Date: </b> not added</p>";
						}
						else
						{
							echo "<p><b>Date of birth: </b> ".$row['birthdate']."<p>";
						}



						include("rating.php");
						
						//include_once("rating_ajax.php");

						?>

						
<div class="content">
            <?php
                $user_id =$row['id'];
                
              
                    // User rating
                    $query = "SELECT * FROM user_rating WHERE user_id='$user_id' and userlog_id='$userlog_id' ";
                    $userresult = mysqli_query($conn,$query) or die(mysqli_error());;
                    $fetchRating = mysqli_fetch_array($userresult);
                    $rating = $fetchRating['rating'];
 
                   /* while ($fetchRating = mysqli_fetch_array($userresult)) {
                        $rating = $fetchRating['rating'];
                    } */
                  

                    // get average
                    $query = "SELECT ROUND(AVG(rating),1) as averageRating FROM user_rating WHERE user_id='$user_id'";
                    $avgresult = mysqli_query($conn,$query) or die(mysqli_error());;
                    $fetchAverage = mysqli_fetch_array($avgresult);
					$averageRating = $fetchAverage['averageRating'];
					
					

                    if($averageRating <= 0){
                        $averageRating = "No rating yet.";
					}
					
					
            ?>
                    <div class="post">
                      
                        <div class="post-text">
                      
                        </div>
                        <div class="post-action">
                             <!-- Rating 
                            <select class='rating' id='rating_<?php echo $user_id; ?>' data-id='rating_<?php echo $user_id; ?>'>
                                <option value="1" >1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                                <option value="4" >4</option>
                                <option value="5" >5</option>
                            </select>
                            <div style='clear: both;'></div>
                            Average Rating : <span id='avgrating_<?php echo $user_id; ?>'><?php echo $averageRating; ?></span>

								<?PHP $
								$query = "SELECT ROUND(AVG(rating),1) as averageRating FROM user_rating WHERE user_id='$user_id'";
								$avgresult= mysqli_query($conn,$query) or die(mysqli_error());
								$fetchAverage = mysqli_fetch_assoc($avgresult);
								$averageRating = $fetchAverage['averageRating'];
								
								$return_arr = array("averageRating"=>$averageRating);
								

                                       echo json_encode($return_arr); ?>


                           
                            <script type='text/javascript'>
                            $(document).ready(function(){
                                $('#rating_<?php echo $user_id ?>').barrating('set',<?php echo $rating ?>);
                            });
                            -->
                            </script>
                        </div>
                    </div>
    
            

        </div>

					
					
					<br>	
					</div>
						<?php	
							echo' <button type="submit" class="btn btn-search" value "'.$username.' " name="userposts">Users offers</button>';
						?>

						
				</div>

				
				</div>
			</div>
		</form>
	</div>
</div>

</div>
						</div>