<?php
    // username.php: takes care of it when user wants to change his username
    session_start();

    // prevents unauthorized code execution
    if ($_SERVER['REQUEST_METHOD'] != 'POST') { exit("Nice try"); }

    require("connect.php");

    $username = filter($_POST["_username"]);

    if (strlen($username) < 4) {
        exit("message-username | <b>invalid username</b>");
    }

    $sql = "select * from users where username=?";
    $check = $db->prepare($sql);
    $check->execute([$username]);

    // 'username already taken' check
    if ($check->rowCount() > 0) {
        exit("message-username | <b>username already in use</b>");
    }

    $sql = "update users set username=? where id=?";
    $check = $db->prepare($sql);
    $check->execute([$username, $_SESSION["user_id"]]);

    $_SESSION["username"] = $username;

    exit("message-username | <b>username changed, loading...</b> | #66ff66 | 1000");

?>