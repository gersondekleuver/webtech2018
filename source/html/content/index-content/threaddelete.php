<?php

    // deletes a thread using the given thread id which was linked to the thread.

    include("../../auth/connect.php");

    if ($_SERVER['REQUEST_METHOD'] != 'POST') { exit("Nice try"); }
    
    $sql = 'DELETE FROM threads WHERE id=?';

    $delete = $db->prepare($sql);
    $delete->execute([$_POST['thread_id']]);

?>