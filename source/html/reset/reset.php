<?php
    // reset.php: contains php code for resetting password through the reset
    // email

    // prevents unauthorized execution of all following php code
    if ($_SERVER['REQUEST_METHOD'] != 'POST') { exit("Nice try"); } 

    include("../auth/connect.php");

    $id         = filter($_POST["_id"]);
    $password   = filter($_POST["_password"]);
    $password2  = filter($_POST["_password2"]);

    if ($password != $password2) {
        exit("error | message-reset | <b>passwords do not match</b>");
    }

    if (strlen($password) < 8) {
        exit("auth | error | message-password | <b>invalid password</b>");
    }

    // sql queries for updating the password
    $sql = "update users set password=? where id=?";
    $check = $db->prepare($sql);
    $check->execute([password_hash($password, PASSWORD_BCRYPT), $id]); or exit("message-register | <b>something went wrong, try again later</b>");

    $sql = "delete from resets where user_id=?";
    $remove = $db->prepare($sql);
    $remove->execute([$id]);
    
    exit("message-reset | <b>password reset complete, redirecting...</b> | #66ff66 | https://agile218.science.uva.nl/ | 1500");

?>