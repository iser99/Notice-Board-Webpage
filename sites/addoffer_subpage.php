<?php
include("head.php");
error_reporting(0);
include "database.php";
?>


<div class="topbar">
    <div class="header">
        <a class="header_toolbar-link" href="index.php">myExchange</a>
    </div>
    <div class="header_login">
        <?php
        if (isset($_SESSION["username"])) {
            echo ' <a class="header_toolbar-link" href="/?action=userprofile">Profile page</a> ';
            echo ' <a class="header_toolbar-link" href="/action=log_out">Log out</a> ';
        } else {
            echo '<a class="header_toolbar-link" href="/?action=zaloguj_sie">Log in</a>';
            echo '<a class="header_toolbar-link" href="/?action=zarejestruj_sie">Sign up</a>';
        }

        ?>
    </div>
</div>

<div class="center">
    <div class="centersign">
    <form method="post" action="addoffer.php">
        <div class="section_heading">
            <h2>
                Add your offer here!</h2> <br>
            
                <?php
$sql="SELECT * FROM category order by category"; 
$result = mysqli_query($conn, $sql);
$queryResult = mysqli_num_rows($result);

echo "<form method='get' action='categoryerror.php'><select id='category' name='category' class='button-login'>
<option name='scrolldown' value=''>-- Category --</option></form>"; // list box select command

if($queryResult > 0)
{
     while ($row = mysqli_fetch_assoc($result)) {
echo "<option value=$row[category]>$row[category]</option>"; 
}
/* Option values are added by looping through the array */ 
}
 echo "</select>";// Closing of list box
?>
        </div>
        </br>
        <input type="text" name="title" class="form-login" placeholder="Title:" />
        <br>
        <textarea type="text" name="shortdescription" class="form-offer" placeholder="Your offer short description: " rows="5" cols="100"></textarea><br>

        <br>
        <textarea type="text" name="description" class="form-offer" placeholder="Your offer description: " rows="15" cols="100"></textarea><br>
        <button type="submit" class="btn button-login" name="addoffer">Add offer</button>
        <br>
        <div class="error_info">
					<?php
						if($error=="none")
						{
							echo "Post added!";
						}
						if($error=="empty input")
						{
							echo "Fill all the fields!";
                        }
                        if($error=="emtpy category")
                        {
                            echo "Choose a category!";
                        }
                        
                       
					?>
		</div>
        </form>
    </div>

</div>
</div>
