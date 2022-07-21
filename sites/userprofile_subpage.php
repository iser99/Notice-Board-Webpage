<?php
session_start();
require_once "database.php";
include "head.php";

$username = $_SESSION['username'];
$sql = " SELECT* FROM users WHERE username='$username' ;";
$result = mysqli_query($conn, $sql);
$queryResult = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

?>

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



<div class="container">
<div class="center">
	<div class="centersign">
		<form method="post" action="userprofile.php">

			<div class="section_heading">
				<?php
				echo "<h2><strong> Helo there ".$_SESSION['username']."</strong> <br> </h2>";
				?>

			</div>

			<div class="sign_body">

				<div class="form-section">

					<br>

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
							echo "<p><b>Date of birth: </b> ".$row['birthdate']."<p><br>";
						}



						?>
					
					
					<br>	
					</div>
							<button type="submit" class="btn btn-search" name="addoffer">Add offer</button>
							<button type="submit" class="btn btn-search" name="myoffers">My offers</button>
							<button type="submit" class="btn btn-search" name="editprofile">Edit profile</button>

				</div>

				<br><br>
				</div>
			</div>
		</form>
	</div>
</div>

</div>
</div>