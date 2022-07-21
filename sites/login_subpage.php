<?php
include("head.php");
session_start();
error_reporting(0);

?>


<div class="topbar">
    <div class="header">
        <a class="header_toolbar-link" href="index.php">myExchange</a>
    </div>
    <div class="header_login">
    <?php
    if(isset($_SESSION["username"])) 
    {   
        echo ' <a class="header_toolbar-link" href="/?action=userprofile">Profile page</a> ';
        echo ' <a class="header_toolbar-link" href="/action=log_out">Log out</a> ';
    }
    
    else 
    {
         echo '<a class="header_toolbar-link" href="/?action=zaloguj_sie">Log in</a>';
         echo '<a class="header_toolbar-link" href="/?action=zarejestruj_sie">Sign up</a>';
    }
    ?>
    </div>
</div>


		<div class="center">
			<div class="centersign">
				<div class="section_heading">
					<h2>
                    Sign in to your account  <br>
        
					</h2>
				</div>
				<div class="sign_body">
					<div class="sign_body_group">
					<form action="login.php" method ="post">
						<input type="text" name="login"  class="form-login"  placeholder=" Login or email" />
					
				</div>
					<div class="sign_body_group">
					
						<input type="password" name="passwd" class="form-login"  placeholder=" Password" />
					
					</div>
					<div class="sign_body_group">
						<button type="submit" class="btn button-login"name="submit">Log in
						</button>
					</div>
					<div class="error_info">
					<?php
						if($error=="empty input")
						{
							echo "Fill all the fields";
						}
						if($error=="wrong password")
						{
							echo "Wrong password!";
						}
					?>
					</div>
                    </form>
					
				
				</div>

				</div>


			</div>
		</div>