<?php

    session_start();

    // prevents unauthorized execution of all following php code
    if ($_SERVER['REQUEST_METHOD'] != 'POST') { exit("Nice try"); } 

    // switches between day and night mode depending on the current active color mode
    $mode = $_SESSION["theme"] == "day" ? "night" : "day";
    $_SESSION["theme"] = $mode;

    // stores a cookie to save user prefferences 
    setcookie("theme", $mode, strtotime('+1 year'), '/');

?>