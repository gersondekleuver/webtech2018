<?php
    // reply_post.php: this is run after every submission of a reply to a thread

    session_start();
    
    // prevention of unauthorized code execution
    if ($_SERVER['REQUEST_METHOD'] != 'POST') { exit("Nice try"); }

    require_once('../../auth/connect.php'); 
    include('../markup.php');

    if ($_SESSION["loggedin"] && !$_POST['lock']) {        
        $user_id = $_SESSION["user_id"];
        
        // input sanitation
        $text = htmlspecialchars($_POST["text"]);
        $thread_id = htmlspecialchars($_POST["thread_id"]);

        // add all markup into the posted text
        $text = markup($text);
        $text = makeLink($text);

        // uploading post info to database
        $sql = 'INSERT INTO posts(thread_id, user_id, text) VALUES(?, ?, ?)';
        $post = $db->prepare($sql);
        $post->execute([$thread_id, $user_id, $text]);
    }
    else {
        exit('error');
    }

?>