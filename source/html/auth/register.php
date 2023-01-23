<?php
    // takes care of it when a guests wants to register

    // prevents unauthorized code execution
    if ($_SERVER['REQUEST_METHOD'] != 'POST') { exit("Nice try"); }

    require("connect.php");

    $email      = filter($_POST["_email"]);
    $username   = filter($_POST["_username"]);
    $password   = filter($_POST["_password"]);
    $password2  = filter($_POST["_password2"]);

    if ($password != $password2) {
        exit("message-register | <b>passwords do not match</b>");
    }

    if (strlen($password) < 8) {
        exit("auth | error | message-password | <b>invalid password</b>");
    }

    $sql = "select * from users where email=? or username=?";
    $check = $db->prepare($sql);
    $check->execute([$email, $username]);

    if (count($check->fetchAll()) > 0) {
        exit("message-register | <b>email and/or username already in use</b>");
    }

    $sql = "insert into users (email, username, password) values (?, ?, ?)";
    $register = $db->prepare($sql);
    $register->execute([$email, $username, password_hash($password, PASSWORD_BCRYPT)]);

    // success message
    exit("message-register | <b>registration completed, loading...</b> | #66ff66 | 1000");
    
?>