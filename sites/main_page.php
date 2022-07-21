<?php
include("head.php");
session_start();
?>

<div class="container">
    <div class="topbar">
        <div class="header">
            <a class="header_toolbar-link" href="index.php">myExchange</a>
        </div>
        <div class="header_login">
            <?php
            if (isset($_SESSION["username"])) {
                echo ' <a class="header_toolbar-link" href="/?action=userprofile">Profile page</a> ';
                echo ' <a class="header_toolbar-link" href="/?action=log_out">Log out</a> ';
            } else {
                echo '<a class="header_toolbar-link" href="/?action=zaloguj_sie">Log in</a>';
                echo '<a class="header_toolbar-link" href="/?action=zarejestruj_sie">Sign up</a>';
            }
            ?>
        </div>
    </div>
    <div class=" top">
        <div class="title">
            <h1>Share Your passion <br>
                and get new skills</h1>

            <form action="search.php" method="POST">
                <input id="top-search" type="search" name="search" placeholder="Search..." value autocomplete="off">
                <button type="submit" class="btn btn-search" name="submit-search">Search</button>

            </form>
        </div>
    </div>
    <div class="center">

        
            <h2>Check all the categories!</h2>


            <div class="centersign">
            
                <?php
                require_once("database.php");

                $sql = " SELECT * FROM category;";
                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);

                if ($queryResult > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                    <form method='post' action=search.php>
                        <div class='categories'>
                            <button type='submit' name='category' value='" . $row['category'] . "'class='btn btn-search'>" . $row['category'] . "</button>
                        </div>
                    </form>";
                    }
                }
                ?>
            </div>
        </div>