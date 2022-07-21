<?php
include "head.php";
session_start();
require_once("database.php");
require_once("editpost.php");
require_once("sites/topbar.php");
error_reporting(0);
//$error="";
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM posts WHERE id='$id'");
while ($res = mysqli_fetch_array($result)) {
	$category = $res['category'];
	$title = $res['title'];
	$short_description = $res['short_description'];
	$description = $res['description'];
}
?>


<div class=container>
	<?php
	
	?>

	<div class="center">
		<div class="centersign">
			<div class="section_heading">
				<h2><strong> Edit Post</strong> <br> </h2>
			</div>

			<div class="sign_body">

				<div class="form-section">
					<h3><strong>Info</strong> </h3>
					<form method="post" action="editpost.php">
						<div class="sign_body_group">
							<label for="category">Category </label>
							<?php
							$sql = "SELECT * FROM category order by category";
							$result = mysqli_query($conn, $sql);
							$queryResult = mysqli_num_rows($result);

							echo "<select name='category' class='button-dropdown'>
			
			<option  value=' $category '  >  $category </option> "; // list box select command
							if ($queryResult > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
									echo "<option value=$row[category]> $row[category]</option>";
								}
								/* Option values are added by looping through the array */
							}
							echo "</select>"; // Closing of list box
							?>


						</div>
						<div class="sign_body_group">
							<label for="title">Title </label>
							<input type="text" name="title" class="form-control" placeholder="  Title " value="<?php echo $title; ?>" />
						</div>

						<div class="sign_body_group">
							<label for="short_description">Short description </label>
							<input type="text" name="short_description" class="form-control" placeholder="  Short description " value="<?php echo $short_description; ?>" />
						</div>

						<div class="sign_body_group">
							<label for="description">Description </label>
							<input type="text" name="description" class="form-control" placeholder="  Description " value="<?php echo $description; ?>" />
						</div>

				</div>

				<div class="button-center">
					<td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
					<td><input type="submit" class="btn btn-search" name="submit-editpost" value="submit-editpost"> </td>

					<!-- 
			<td><input type="submit" name="submit-editpost" value="submit-editpost"></td>
			

			<td><button type="submit" class="btn button-login"name="submit-editpost">Save
				</button>  </td>
			-->



				</div>
			</div>
			<div class="error_info">
					<?php
						if($error=="empty input")
						{
							echo "Fill all the fields!";
						}
						if($error=="none")
						{
							echo "Post edited!";
						}
					?>
			</div>
			</form>
		</div>
	</div>

</div>