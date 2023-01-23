<?php
    // createsubmit.php: this is run when a user tries to make a new thread
    session_start();

    // prevention of unauthorized code execution
    if ($_SERVER['REQUEST_METHOD'] != 'POST') { exit("Nice try"); }

    include_once("../../auth/connect.php");
    include("../dbio.php");
    include("../markup.php");

    // input sanitation
    $author = $_SESSION["user_id"];
    $title = filter($_POST["title"]);
    $text  = filter($_POST["text"]);
    $tags = filter($_POST["tags"]);
    $tags = str_replace(' ', '', $tags);

    // text markup
    $text = markup($text);
    
    // adds newly made thread to the database
    $thread = new_thread($author, $title, $text, $tags);

    // redirects user to his newly created thread
    exit("message-create | <b>thread created, loading...</b> | #66ff66 | /thread.php?id=$thread");

?>