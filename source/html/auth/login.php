<?php 
    // login.php: selfexplanatory name
    session_start();

    // prevents unauthorized code execution
    if ($_SERVER['REQUEST_METHOD'] != 'POST') { exit("Nice try"); }

    require("connect.php");

    $email      = filter($_POST["_email"]);
    $password   = filter($_POST["_password"]);    

    $sql = "select * from users where email=?";
    $login = $db->prepare($sql);
    $login->execute([$email]);
    $login = $login->fetch();

    if (password_verify($password, $login["password"])) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $login["username"];
        $_SESSION["user_id"] = $login["id"];
        $_SESSION["admin"] = $login["admin"];
    } else {
        exit("message-login | <b>wrong email and/or password</b>");
    }

?>
