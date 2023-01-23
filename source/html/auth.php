<?php 

    session_start();

    // sets most important session variables
    if (!isset($_SESSION["loggedin"])) {
        $_SESSION["loggedin"] = false;
        $_SESSION["theme"] = isset($_COOKIE["theme"]) ? $_COOKIE["theme"] : "day";
    }

?>