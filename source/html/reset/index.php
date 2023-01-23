<?php
    // index.php: contains main html for the reset-password-through-email form

    // unauthorized code execution prevention
    if ($_SERVER['REQUEST_METHOD'] != 'GET') { exit("Nice try"); }

    require("../auth/connect.php");

    // invalid request checks
    $id = $_GET["code"] or die("<b>Invalid request</b>");
    $token = $_GET["token"] or die("<b>Invalid request</b>");  

    // reset token expiration date check
    $sql = "select * from resets where user_id=? and DATEDIFF(expire_time, now()) >= 0";
    $check = $db->prepare($sql);
    $check->execute([$id]);

    if ($check->rowCount() == 0 || !password_verify($token, $check->fetch()["token"])) {
        exit("<b>Invalid request</b>");
    }

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Reset Password</title>
    <meta charset="utf-8">
    <meta name="description" content="Crypto Currency Forum">
    <meta name="keywords" content="UvA, Forum, Tech, Crypto">
    <meta name="author" content="Ingur, Scipio, Gerson, Jason">    
    <meta name="theme-color" content="#46494f">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="../css/reset.css">
</head>

<body>
    <!-- reset password form -->
    <div class="container">
        <h1>Reset Password</h1>
        <div class="message" id="message-reset"></div>    
        <form method="POST" action="reset.php">
            <input type="hidden" name="_id"  value="<?php echo $id; ?>">
            <input type="password" name="_password" placeholder="New Password"
                    pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                    Title="Must atleast be 8 characters and must contain atleast 1 number, upper and lower character" required>
            <input type="password" name="_password2" placeholder="Confirm Password" required>
            <button type="submit"">Submit</button>        
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/form.js"></script>
</body>

</html>