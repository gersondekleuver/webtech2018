<?php
    // logout.php: selfexplanatory name

    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] != 'POST') { exit("Nice try"); }

    session_destroy();

?>