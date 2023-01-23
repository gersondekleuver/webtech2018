<?php 
    // postbox.php: takes care of the html for displaying the posts of a thread
    
    include_once("auth/connect.php");
    include_once("content/dbio.php");
?>

<div class="divider">  
    <div class="main-content">  
        <div class="threadbox">
            <div class="threadmenu">
                <div class="threadtitle">
                    <?php 
                        $title = get_thread_title($_GET["id"]);
                        if ($title) { echo $title; } else { exit("Thread not found"); }
                    ?>
                </div>
                <div class="threadmenubuttons"></div>
                <?php       
                    $id = $_GET['id'];
                    $current = isset($_GET['page']) ? intval($_GET['page']) : 1;
                    $previous = $current - 1;
                    $next = $current + 1;
                    $page_count = ceil(get_rowcount($id) / 5);

                    echo "<a class='threadmenubutton' id='pagecount'>$current/$page_count</a>";
                    
                    if ($previous > 0) {
                        echo "<a class='threadmenubutton' href='?id=$id&page=1'><<</a>";
                        echo "<a class='threadmenubutton' href='?id=$id&page=$previous'><</a>";
                    }

                    if ($current < $page_count) {
                        echo "<a class='threadmenubutton' href='?id=$id&page=$next'>></a>";
                        echo "<a class='threadmenubutton' href='?id=$id&page=$page_count'>>></a>";
                    }
                ?>
            </div>
            <?php 
                include("post.php"); 
                fetch_posts($_GET["id"]);
                include("postreply.php");
            ?>
        </div>
    </div>
    <?php include("content/sidebar.php"); ?>
</div>