<?php
    // icon.php: takes care of it when user wants to change his picture
    session_start();

    // prevents unauthorized code execution
    if ($_SERVER['REQUEST_METHOD'] != 'POST') { exit("Nice try"); }

    require("connect.php");

    $icon   = filter($_POST["_icon"]);

    // admin icon can only be chosen by admins
    if (($icon == 0 && !$_SESSION["admin"]) || $icon > 6 || !is_numeric($icon))  {
        exit("message-picture | <b>no picture selected</b>");
    }

    $sql = "update users set icon=? where id=?";
    $check = $db->prepare($sql);
    $check->execute([$icon, $_SESSION["user_id"]]);

    exit("message-picture | <b>picture changed, loading...</b> | #66ff66 | 1000");
    
?>