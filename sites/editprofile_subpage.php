<?php
include("head.php");
@session_start();
require_once("database.php");
require_once("editprofile.php");
$username=$_SESSION['username'];
$picture = "images/default-picture.jpg";
$query = "SELECT * from users  WHERE username='$username' "; 
$query_run = mysqli_query($conn,$query);
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>


<div class=container>
<?php
include_once "sites/topbar.php";
?>

<div class="center">
    <div class="centersign">
	<form method="post" action="editprofile.php">

        <div class="section_heading">
			<h2><strong> Personal info </strong> <br> </h2>
        	Basic info, such as your name or phone, that you use on myExchange 
		</div>
		
		<div class="sign_body">

			
		<br>

			<div class="sign_body_group">

				
				
			</div>
			</div>

			<div class="form-section">
				 <h2><strong>Basic info</strong> </h2>
				   
				<div class="sign_body_group">
				<label for="firstname">First name </label>
				<input type="text" name="firstname" class="form-control"  placeholder="  First name" autocomplete="off" maxlength="64" value="<?php echo $row['firstname']?>" />
					<!-- <input type="text" name="name" value="Nicola Fuchs" id="name" class="form-control" tabindex="1" maxlength="64" autocomplete="off"> -->
					
				</div>

				<div class="sign_body_group">
				<label for="lastname">Last name </label>
				<input type="text" name="lastname" class="form-control" maxlength="64" autocomplete="off"   placeholder="  Last name "   value="<?php echo $row['lastname']?> "   />
				</div>

				<div class="sign_body_group">
				<label for="date">Date of birth </label>
				<input type="date" name="date" class="form-control"  min="1900-01-01" max="<?php echo date('Y-m-d') ?>"  value="<?php echo $row['birthdate']?>"  />
				<?php
				$date= date('Y-m-d',strtotime($_POST['date']));
				$today   = date('Y-m-d') ;
				$age = date_diff(date_create($date), date_create($today)) -> y;
                
       			?>
				</div>


			</div>

			<div class="form-section">
				 <h3><strong>Additional information</strong> </h3>
				   
				<div class="sign_body_group">
				<label for="voivodship">Voivodship </label>
				<select id="voivodship"name="voivodship" class="button-dropdown">
					<option value="<?php echo $row['voivodship']?>" ><?php echo $row['voivodship']?>  </option>  
					<option value="Dolnośląskie " rel="icon-temperature">Dolnośląskie</option>
                    <option value="Kujawsko-pomorskie">Kujawsko-pomorskie</option>
                    <option value="Lubelskie">Lubelskie</option>
                    <option value="Lubuski">Lubuski</option>
                    <option value="Łódzkie">Łódzkie</option>
                    <option value="Małopolskie">Małopolskie</option>
                    <option value="Opolskie">Opolskie</option>
                    <option value="Podkarpackie">Podkarpackie</option>
                    <option value="Podlaskie">Podlaskie</option>
                    <option value="Pomorskie">Pomorskie</option>
                    <option value="Śląskie">Śląskie</option>
                    <option value="Świętokrzyskie">Świętokrzyskie</option>
                    <option value="Warmińsko-mazurskie">Warmińsko-mazurskie</option>
                    <option value="Wielkopolskie">Wielkopolskie</option>
                    <option value="Zachodniopomorskie">Zachodniopomorskie</option>

                </select><br>
				</div>

				<div class="sign_body_group">
				<label for="city">City </label>
              	<input type="text" name="city" class="form-control"  placeholder="  City" autocomplete="off" maxlength="64" value="<?php echo $row['city']?>" />
				</div>

				<div class="sign_body_group">
				<label for="phone">Phone </label>
              	<input type="text" name="phone" class="form-control"  placeholder="  xxx-xxx-xxx" autocomplete="off" maxlength="9"  value="<?php echo $row['phone']?>"/>
				</div>


			</div>

			<div class="button-center">
				<button type="submit" class="btn button-login"name="submit-editprofile">Save
				</button>

			</div>
		</div>
		</form>
	</div>
</div>		

</div>