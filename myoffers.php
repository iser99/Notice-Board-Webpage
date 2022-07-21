<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
require_once("database.php");

                    $username=$_SESSION['username'];
                    $sql = " SELECT* FROM posts WHERE username='$username' ;";
                    $result = mysqli_query($conn, $sql);
                    
                    $queryResult = mysqli_num_rows($result);

                    if($queryResult > 0)
                    {
                         while ($row = mysqli_fetch_assoc($result))
                         {   
                             echo " <div class='sign_body_group' >
                             <div class='form-section'>
                             <h3><b> ".$row['title']." </h3> </b>
                             <p> <b> Category: </b>" .$row['category']."  </p>
                             <p> <b>  Short Description: </b>".$row['short_description']."   </p>
                             <p> <b>  Description: </b> ".$row['description']." </p>
                             <p> <b>  Date: </b> ".$row['date']."  </p>
                            
                             <a href='editpost_subpage.php?id=".$row["id"]."'> 
                             <img src='/images/Edit_icon.png' width=30 height=30 alt='Edit post'  title='Edit'></a>   
                             
                           <form action='delete.php' method='post'>
                           <p> <button type='submit'  class='btn-delete' name='delete' value='".$row['id']."' title='Delete' ><i class='fa fa-trash-o'  aria-hidden='true' style='font-size: 30px'></i>     </button>  </p>              
                           <p><input type='hidden' name='id' value='".$row['id']. "'>  </p>                        
                                         
                            <p><input type='hidden' name='id' value='".$row['id']. "'>  </p>                        
                                </form>  
                                   
                                   
                                  

                                   <!--


                                      <form method='post' action='delete.php' >
                                      <p> <input type='hidden' name='delete_id' value='".$row['id']."' > </p>
                                      <p> <input type='submit' name='delete' value='delete' id='delete'  style= ' background-image:url('/images/Edit_icon.png') ;
                                      width:20px;height:20px; color:transparent; ' >    </p>
                                  
                                      </form> -->



                                      

                                 
        
                             </div>
                            </div>
                          ";
                          
                          
     
                        }
                     }
          
                     