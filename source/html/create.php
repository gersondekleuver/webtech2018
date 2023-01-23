<?php 
    // prevents guests from creating threads
    include("auth.php"); 
    if (!$_SESSION['loggedin']){ exit("<b>you need to be logged in to create a thread</b>"); }
?>

<!DOCTYPE html>
<html lang="en-US">
<!-- create.php: contains main html code for the page to create a thread -->
<?php include("head.php"); ?>

<body>
    <?php include("nav/topnav.php"); ?>
    <div class="divider">
        <div class="main-content">
            <div class="threadmenu">
                <div class="threadtitle">
                    New Thread
                </div>
            </div>
            <?php include("content/create-content/createform.php");?>
        </div>
        <?php include("content/sidebar.php"); ?>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/nav.js" onload="nav = new Nav; nav.init();"></script>    
    <script src="js/icon.js" onload="icon = new Icon; icon.init();"></script>
    <script src="js/form.js"></script>
    <script src="js/search.js"></script>
    <script src="js/reply.js" onload="reply = new Reply;"></script>
</body>

</html>