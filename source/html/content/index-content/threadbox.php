<?php
    // threadbox.php: html code that renders a list of threads on the main page
    
    include_once("auth/connect.php");
    include_once("content/dbio.php");
?>

<div class="divider">
    <div class="main-content">
        <div class="threadbox">
            <div class="threadmenu">
                <div class="threadmenubuttons"> 
                    <a class="threadmenubutton" href='?sort=hot'>HOT</a>
                    <a class="threadmenubutton" href='?sort=top'>TOP</a>
                    <a class="threadmenubutton" href='?sort=new'>NEW</a>
                </div>
                <?php
                    // page numbers navigation
                    $sort = isset($_GET['sort']) ? $_GET['sort'] : "new" ;
                    $current = isset($_GET['page']) ? intval($_GET['page']) : 1 ;
                    $previous = $current - 1;
                    $next = $current + 1;
                    $page_count = ceil(get_rowcount() / 5);

                    if ($sort != "hot") {
                        echo "<a class='threadmenubutton' id='pagecount'>$current/$page_count</a>";
                    }

                    if ($previous > 0) {
                        echo "<a class='threadmenubutton' href='?sort=$sort&page=$previous'><</a>";
                    }

                    if ($current < $page_count && $sort != "hot") {
                        echo "<a class='threadmenubutton' href='?sort=$sort&page=$next'>></a>";
                    }        
                ?>
                <?php
                    // displays create button only when user is logged in
                    if ($_SESSION['loggedin']) { 
                        echo '
                        <div class="threadcreate">
                            <a class="threadmenubutton" href="create.php">＋</a> 
                        </div>';
                    }
                ?>
            </div>
            <?php include("content/index-content/threadlist.php") ?>
        </div>
    </div>
    <?php include("content/sidebar.php"); ?>
</div>