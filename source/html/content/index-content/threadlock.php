<?php

    // function that locks or unlocks a thread by updating the value to 1 or 0

    include("../../auth/connect.php");

    if ($_SERVER['REQUEST_METHOD'] != 'POST') { exit("Nice try"); }

    $lock = $_POST['locked'] == '1' ? 0 : 1; 

    $sql = ' UPDATE threads SET locked=? WHERE id=?';
    $lock_data = $db->prepare($sql);
    $lock_data->bindValue(1, $lock, PDO::PARAM_INT);
    $lock_data->bindValue(2, $_POST['thread_id'], PDO::PARAM_INT);
    $lock_data->execute();

?>