<?php

//REGISTER FUNCTIONS



function emptyInputSignup($email, $login, $passwd, $passwd2) //check if any field is empty
 {
        
        if(empty($email)||empty($login)||empty($passwd)||empty($passwd2))
        {
            $result=true;
        }
        else
        {
            $result=false;
        }

    return $result;

 }
 function invalidUserId($login)
 {
        if(!preg_match("/^[a-zA-Z0-9]*$/" ,$login)) //check if login doesnt contain invalid characters 
        {
            $result=true;
        }
        else
        {
            $result=false;
        }
        return $result;
        
}
function invalidEmail($email)
    {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $result=true;
        }
        else
        {
            $result=false;
        }
        return $result;
    }
 function passwdMatch($passwd,$passwd2) //check if passwords mach to each other 
    {
        if($passwd !==$passwd2)
        {
            $result=true;
        }
        else
        {
            $result=false;
        }
        return $result;
    }
 function userExists($conn, $login, $email) //check if username is taken 
{
    $sql="SELECT * FROM users WHERE username= ? OR useremail= ?;";
    $statement=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql))
    {
        header("location ../signup.php?error=statementfailed");
        exit();
    }
     mysqli_stmt_bind_param($statement,"ss",$login, $email);
     mysqli_stmt_execute($statement);

     $resultData=mysqli_stmt_get_result($statement);

     if($row =mysqli_fetch_assoc($resultData))
    {
        return $row;
     }
     else
     {
        $result=false;
        return $result;
     }
     mysqli_stmt_close($statement);
}
function createUser($conn, $login, $email, $passwd) //create new login 
{
    $sql="INSERT INTO users (username, useremail, userspasswd) VALUES(?,?,?);";
    $statement=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql))
    {
        loginUser($conn, $login, $passwd);
        header("location: ../signup.php?error=statementfailed");
        exit();
    }
    $encryptPasswd=password_hash($passwd, PASSWORD_DEFAULT);
     mysqli_stmt_bind_param($statement,"sss",$login, $email, $encryptPasswd);
     mysqli_stmt_execute($statement);
     mysqli_stmt_close($statement);  
     header("location: ../index.php?error=none");
     exit();
}


//LOGIN FUNCTIONS

function emptyInputLogin($login, $passwd) //check if any field is empty
 {
        
        if(empty($login)||empty($passwd))
        {
            $result=true;
        }
        else
        {
            $result=false;
        }

    return $result;

 }

function loginUser($conn, $login, $passwd)
{
    $error="";
    $userExists= userExists($conn,$login,$login);
    if($userExists===false)
    {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $encryptPasswd=$userExists["userspasswd"];
    $checkPasswd=password_verify($passwd,$encryptPasswd);

    if($checkPasswd===false)
    {
        $error="wrong password";
    }

    if($checkPasswd===true)
    {
        session_start();
        $_SESSION["id"]=$userExists["id"];
        $_SESSION["username"]=$userExists["username"];
        header("location: ../index.php?error=loginsuccess");
        $error="none";
        exit();

    }
    return $error;
}

function emptyInputPhone($phone) //check if any field is empty
 {
        
        if(empty($phone))
        {
            $result=true;
        }
        else
        {
            $result=false;
        }

    return $result;
    }

//POSTING FUNCTIONS

function emptyInputPost($title, $description, $shortdescription) //check if any field is empty
 {
     $error='';
        
        if(empty($title)||empty($description)||empty($shortdescription))
        {
            $result=true;
            $error="empty input";
        }
        else
        {
            $result=false;
        }

    return $result;
 }

 function createPost($conn,$username, $title, $category, $description, $shortdescription) 
 {
     $sql="INSERT INTO posts (username,title,category, description, short_description ) VALUES('$username','$title','$category','$description','$shortdescription');";
     mysqli_query($conn,$sql);
    
     
 }
/*
 function createPostID()
 {
     $lenght=rand(4,11);
     $number="";
     for($i=0; $i<$lenght; $i++)
     {
         $new_rand= rand(0,9);
         $number=$number. $new_rand;
     }
     return $number;
 }
*/
 

?>