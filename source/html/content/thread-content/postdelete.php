<?php

    // deletes post by matching by using its id

    include("../../auth/connect.php");

    if ($_SERVER['REQUEST_METHOD'] != 'POST') { exit("Nice try"); }
    
    $sql = 'DELETE FROM posts WHERE id=?';

    $delete = $db->prepare($sql);
    $delete->execute([$_POST['post_id']]);

?>