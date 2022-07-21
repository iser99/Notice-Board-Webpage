<?php
include "database.php";
include_once "showuser.php";
?>
  <!-- CSS -->
  <link href="style1.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link href='jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
        =
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



    <div class="content">
            <?php
     

                $user_id =$row['id'];
              
                
                

                    // User rating
                    $query = "SELECT * FROM user_rating WHERE user_id='$user_id' and userlog_id='$userlog_id' ";
                    $userresult = mysqli_query($conn,$query);
                    //$fetchRating = mysqli_fetch_assoc($userresult);
                    //$rating = $fetchRating['rating'];
                    while ($fetchRating = mysqli_fetch_assoc($userresult)) {
                        $rating = $fetchRating['rating'];
                    }
                  

                    // get average
                    $query = "SELECT ROUND(AVG(rating),1) as averageRating FROM user_rating WHERE user_id='$user_id'";
                    $avgresult = mysqli_query($conn,$query);
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
                            <!-- Rating -->
                            <select class='rating' id='rating_<?php echo $user_id; ?>' data-id='rating_<?php echo $user_id; ?>'>
                                <option value="1" >1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                                <option value="4" >4</option>
                                <option value="5" >5</option>
                            </select>
                            <div style='clear: both;'></div>
                            Average Rating : <span id='avgrating_<?php echo $user_id; ?>'><?php echo $averageRating; ?></span>

                            <!-- Set rating -->
                            <script type='text/javascript'>
                            $(document).ready(function(){
                                $('#rating_<?php echo $user_id ?>').barrating('set',<?php echo $rating ?>);
                            });
                            
                            </script>
                        </div>
                    </div>
           <?php
                  
               ?>
            

        </div>

        
    

