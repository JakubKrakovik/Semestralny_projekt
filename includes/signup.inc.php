<?php

if (isset($_POST["submit"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];


    require_once "db_log.php";
    require_once "functions.inc.php";

    if (emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) !== false){
        header("location: ../parts/signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false){
        header("location: ../parts/signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false){
        header("location: ../parts/signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdrepeat) !== false){
        header("location: ../parts/signup.php?error=differentpwd");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false){
        header("location: ../parts/signup.php?error=usernametaken");
        exit();
    }
    createUser($conn, $name, $email, $username, $pwd);

}else{
    header("location: ../parts/signup.php");
}