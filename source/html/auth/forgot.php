<?php
    // forgot.php: takes care of it when user has forgotten his password
    // and requests to reset it

    // prevents unauthorized code execution
    if ($_SERVER['REQUEST_METHOD'] != 'POST') { exit("Nice try"); }

    require("connect.php");

    $email = filter($_POST["_email"]);

    $sql = "select * from users where email=?";
    $check = $db->prepare($sql);
    $check->execute([$email]);

    if ($check->rowCount() == 0) {
        exit("message-forgot | <b>invalid/unknown email address</b>");
    }

    $check = $check->fetch();

    // generates and hashes a random 128 bit token
    $token = bin2hex(random_bytes(16));
    $hash = password_hash($token, PASSWORD_BCRYPT);

    $sql = "insert into resets (user_id, token, expire_time)
            values (?, ?, now() + interval 1 day)
            on duplicate key update token=?, expire_time=(now() + interval 1 day)";

    $reset = $db->prepare($sql);
    $reset->execute([$check["id"], $hash, $hash]);

    $code = $check["id"];
    $link = "https://agile218.science.uva.nl/reset/?code=$code&token=$token";
    mail($email, "RESET PASSWORD LINK", $link);

    exit("message-forgot | <b>reset password link send</b> | #66ff66 | 1000");

?>