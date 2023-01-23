<?php include("auth.php"); ?>

<!DOCTYPE html>
<html lang="en-US">
<!-- thread.php: contains main html code for displaying a thread -->
<?php include("head.php"); ?>

<body>
    <?php include("nav/topnav.php"); ?>
    <?php include("content/thread-content/postbox.php");?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/nav.js" onload="nav = new Nav; nav.init();"></script>    
    <script src="js/icon.js" onload="icon = new Icon; icon.init();"></script>
    <script src="js/reply.js" onload="reply = new Reply;"></script>
    <script src="js/form.js"></script>
    <script src="js/search.js"></script>
</body>

</html>