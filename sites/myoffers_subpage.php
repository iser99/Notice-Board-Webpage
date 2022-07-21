<?php
include("./head.php");
session_start();

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
        <div class="section_heading">
            <h2>
                Your offers are here</h2> <br>
                <br>
        </div>
                <div class="sign_body">
                
                <?php
                
                    require_once("./myoffers.php");
                ?>
 </div>               
</div>
</div>