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

<section>
    <form action="signup.php" method="post">
        <div class="center">
            <div class="centersign">
                <div class="section_heading">
                    <h2>
                        Create an account <br>
                        It’s quick and easy <br>

                    </h2>
                </div>

                <div class="sign_body">

                    <div class="sign_body_group">
                        <input type="text" name="email" class="form-login" placeholder=" Email" />
                    </div>
                    <div class="sign_body_group">
                        <input type="text" name="login" class="form-login" placeholder=" Login" />
                    </div>

                    <div class="sign_body_group">

                        <input type="password" name="passwd" class="form-login" placeholder=" Password" />
                    </div>

                    <div class="sign_body_group">
                    <input type="password" name="passwd2" class="form-login" placeholder=" Repeat password" />
                    </div>
                    </br>

                   
                    <button type="submit" class="btn button-login" name="submit"> Sign Up </button>

                    <div class="error_info">
                        <?php
                        if ($error == "none") {
                            echo "";
                        }
                        if ($error == "empty input") {
                            echo "All fields need to be filled";
                        }
                        if ($error == "wrong username") {
                            echo "Incorrect username!";
                        }
                        if ($error == "wrong password") {
                            echo "Passwords don't match!";
                        }
                        if ($error == "wrong email") {
                            echo "Incorrect email!";
                        }
                        if ($error == "user exists") {
                            echo "User already exists!";
                        }
                        if ($error == "wrong username") {
                            echo "Incorrect username!";
                        }



                        ?>
                    </div>
                </div>
            </div>
    </form>
    </div>

</section>
