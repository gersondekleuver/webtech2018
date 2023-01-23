<?php

    session_start();

    if ($_SERVER['REQUEST_METHOD'] != 'POST') { exit("Nice try"); }

    include_once("../../auth/connect.php");

    if ($_SESSION['loggedin']) {

        $post_id = $_POST['post_id'];
        $user_id = $_SESSION['user_id'];

        // checks if user and post id are in same collom in upvotes
        $sql = 'SELECT * FROM upvotes WHERE post_id = ? AND user_id = ?';
        $upvote_data = $db->prepare($sql);
        $upvote_data->execute([$post_id, $user_id]);

        // if post hasnt been upvoted it becomes upvoted
        if ($upvote_data->rowCount() == 0) {
            $sql = 'INSERT INTO upvotes(post_id, user_id) VALUES(?, ?)';
            $upvote_data = $db->prepare($sql);
            $upvote_data->execute([$post_id, $user_id]);
        }
        // else it removes the upvote
        else {
            $sql = 'DELETE FROM upvotes WHERE post_id = ? AND user_id = ?';    
            $upvote_data = $db->prepare($sql);
            $upvote_data->execute([$post_id, $user_id]);
        }
    } else {
        exit("message-upvote | <b>you need to be logged in to vote</b>");
    }
    
?>