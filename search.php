<?php
include("head.php");
session_start();
?>
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
               <div class="section_heading">
                    <h2>
                         Search Result
                    <br>
                    </h2>
               </div>
               <div class="sign_body">
                    <?php
                    //SEARCH THROUGH THE SEARCH BUTTON
                    if (isset($_POST["submit-search"])) 
                    {
                         require_once("database.php");
                         $search = mysqli_real_escape_string($conn, $_POST['search']);
                         $sql = " SELECT * FROM posts WHERE short_description LIKE '%$search%' OR description LIKE  '%$search%' OR title LIKE '%$search%'  OR category LIKE '%$search%' ";
                         $result = mysqli_query($conn, $sql);
                         $queryResult = mysqli_num_rows($result);
                         echo "<h2> There are " . $queryResult . " results!</h2> <br>";
                         if ($queryResult > 0) {
                              while ($row = mysqli_fetch_assoc($result)) {
                                   $_SESSION['id'] = $row['id'];
                                   $_SESSION['title'] = $row['title'];
                                   $postid = $row['id'];


                                   echo "
                              <div class='sign_body_group' >
                              <div class='offer'>
                              <p> <b> <h2> " . $row['title'] . " </h2> </b> </p>
                             <p><h3><b> By: </b>" . $row['username'] . " </h3></p>
                             <p> Category: " . $row['category'] . "  </p>
                             <p>  Short Description: " . $row['short_description'] . " </p>
                             <p>  Date: " . $row['date'] . "  </p>
                             <form action='showpost.php' method='get'>
                                   <p> <button type='submit' class='btn button-login'name='editpost'value='" . $row['id'] . ">Show more </p>                              
                              </form>
                              <form method='get' action='showpost.php'>
                              <p> <input type='hidden' name='postid' value='" . $row['id'] . "'> Show more </p>
                              </form>
                            </div>
                            </div>
                         ";
                              }
                         } 
                         else
                         {
                              echo "There are no results matching your search";
                         }
                    }
                         //SEARCH FROM THE CATEGORY BUTTON
                         if(isset($_POST['category']))
                         {
                              require_once "database.php";
                              $category=$_POST['category'];
                              //$search = mysqli_real_escape_string($conn, $_POST['search']);
                               $sql = " SELECT * FROM posts WHERE category='$category';";
                               $result = mysqli_query($conn, $sql);
                                   $queryResult = mysqli_num_rows($result);
                               echo "<h2> There are " . $queryResult . " results!</h2> <br>";
                               if ($queryResult > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) 
                                    {
                                         $_SESSION['id'] = $row['id'];
                                         $_SESSION['title'] = $row['title'];
                                         $postid = $row['id'];

                                      

                                         echo "
                                             <div class='sign_body_group' >
                                              <div class='offer'>
                                             <p> <b> <h2> " . $row['title'] . " </h2> </b> </p>
                                             <p><h3><b> By: </b>" . $row['username'] . " </h3></p>
                                             <p> Category: " . $row['category'] . "  </p>
                                             <p>  Short Description: " . $row['short_description'] . " </p>
                                             <p>  Date: " . $row['date'] . "  </p>
                                              <form action='showpost.php' method='get'>
                                               <p> <button type='submit' class='btn button-login'name='editpost'value='" . $row['id'] . ">Show more </p>                              
                                              </form>
                                              <form method='get' action='showpost.php'>
                                             <p> <input type='hidden' name='postid' value='" . $row['id'] . "'> Show more </p>
                                              </form>
                                             </div>
                                              </div>";
                                         }
                                    }
                                   }
                              
                    ?>


               </div>

          </div>


     </div>
</div>