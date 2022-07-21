<?php

//session_start();
require_once('functions.php');
require_once("database.php");
include("head.php");
include("sites/topbar.php");

$postid=$_GET['postid'];
$sql = " SELECT * FROM posts WHERE id=$postid;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$username=$row['username'];

$sqlusr = " SELECT * FROM users WHERE id=$username;";
$resultusr = mysqli_query($conn, $sql);
$rowusr = mysqli_fetch_assoc($resultusr);



/*
echo
" <div class='sign_body_group' >
     <div class='offer'>
           <p> <h3> <b> ".$row['title']." </b> </h3> </p> 
           <p> <b> Category: </b> " .$row['category']."  </p>
           <p> <b> Short Description: </b> ".$row['short_description']."  </p>
           <p> <b> Description: </b> ".$row['description']."  </p>
           <p> <b> Date: </b> ".$row['date']."  </p>
           <br>
           <p> <b> Username:  </b> ".$row['username']." </p>
           
           <form action='showuser.php' method='get'>
              <p> <button type='submit' class='btn button-login'name='editpost'value='".$row['username'].">Edit post </p>                              
           </form>  
           <form method='get' action='showuser.php'>
           <p> <input type='hidden' name='username' value='".$row['username'].
           "'>Show user  </p>
         
           </form> 
     </div>
  </div>
";

*/


echo '
<div class="center">
   <div class="centersign">
   <form method="get" action="showuser.php">

      <div class="section_heading">
         

      <div class="sign_body_group">
      <p><h3>  <b> '.$row['title'].' </b></h3>  </p> <br>
      <p> <b> Category: </b> ' .$row['category'].'  </p>
      <p> <b> Short Description: </b> '.$row['short_description'].' </p>
      <p> <b> Description: </b> '.$row['description'].'  </p>
      <p> <b> Date: </b> '.$row['date'].'  </p>
      <br>
      <p> <b> From user:  </b> '.$row['username'].' </p>
      <button type="submit" class="btn btn-search" name="showuser" value="'.$username.'">Show user</button>
         <div class="form-section">

            

            <div class="sign_body_group">

               
                  </div>

                  

               </div>

            </div>
         </div>' ;





				


						?>
					
					
					

				
				</div>
			</div>
		</form>
	</div>
</div>

</div>

 

?>