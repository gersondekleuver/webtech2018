<?php
    // password.php: takes care of it when user wants to change his password
    
    session_start();

    if ($_SERVER['REQUEST_METHOD'] != 'POST') { exit("Nice try"); }

    require("connect.php");

    $oldpassword = filter($_POST["_oldpassword"]);
    $password    = filter($_POST["_password"]);
    $password2   = filter($_POST["_password2"]);

    if ($password != $password2) {
        exit("auth | error | message-password | <b>passwords do not match</b>");
    }

    if (strlen($password) < 8) {
        exit("auth | error | message-password | <b>invalid password</b>");
    }

    $sql = "select * from users where id=?";
    $check = $db->prepare($sql);
    $check->execute([$_SESSION["user_id"]]);   
    $check = $check->fetch();

    if (!password_verify($oldpassword, $check["password"])) {
        exit("message-password | <b>incorrect current password</b>");
    }

    $sql = "update users set password=? where id=?";
    $check = $db->prepare($sql);
    $check->execute([password_hash($password, PASSWORD_BCRYPT), $_SESSION["user_id"]]);    

    exit("message-password | <b>password changed, loading...</b> | #66ff66 | 1000");

?>