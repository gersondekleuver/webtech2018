<?php 

    require("auth.php"); 
    include_once("content/searchresults.php");

    $tags = array();

    if (isset($_GET['tags'])) {
        $tags = explode(",",$_GET['tags']);
    }

?>

<!DOCTYPE html>
<html lang="en-US">
<!-- search.php: contains main html code for the search page -->
<?php include("head.php"); ?>

<body>
    <?php include("nav/topnav.php"); ?>
    <div class="divider">
        <div class="main-content">
            <div class="threadmenu">
                <div class="threadtitle">
                    <?php 
                        echo "Searching for '" . implode(', ', $tags) . "'";
                    ?>
                </div>
                <div class="threadmenubuttons">
                </div>      
                <?php

                        if (!isset($_GET['tags'])){
                            exit();
                        }

                        $current = isset($_GET['page']) ? intval($_GET['page']) : 1 ;
                        $previous = $current - 1;
                        $next = $current + 1;

                        $searchresults = get_search_results($tags, $current);

                        $page_count = ceil(count($searchresults) / 5);

                        if ($page_count > 0) {
                            echo "<a class='threadmenubutton' id='pagecount'>$current/$page_count</a>";
                        }

                        if ($previous > 0) {
                            echo "<a class='threadmenubutton' href='?tags=".$_GET['tags']."&page=$previous'><</a>";
                        }

                        if ($current < $page_count) {
                            echo "<a class='threadmenubutton' href='?tags=".$_GET['tags']."&page=$next'>></a>";
                        } 

                ?>
            </div>
            <div class="threadbox">
                <?php
                    print_search_results($searchresults, $tags, $current);
                ?>  
            </div>            
        </div>
        <?php include("content/sidebar.php"); ?>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/nav.js" onload="nav = new Nav; nav.init();"></script>    
    <script src="js/icon.js" onload="icon = new Icon; icon.init();"></script>
    <script src="js/form.js"></script>
    <script src="js/search.js"></script>
        
</body>

</html>