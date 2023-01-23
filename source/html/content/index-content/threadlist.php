<?php
    
    include_once("auth/connect.php");
    include_once("content/dbio.php");

    function threadprint($id, $title, $author, $upvotecount, $date, $tags, $replycount) { 
        // uses correct grammar
        $upvote_text = $upvotecount == 1 ? "upvote" : "upvotes";

        $reply_text = $replycount == 1 ? "reply" : "replies";

        // checks if user is an admin if true loads two additional buttons; delete and lock
        if (isset($_SESSION['admin']) && $_SESSION['admin'] > 0) {
            $removebutton = 
            "<form method='POST' class='threadbutton' action='content/index-content/threaddelete.php'>
            <input type='hidden' name='thread_id' value=" . $id . ">
            <button class='threadbuttoncount adminbutton'>️🗑️</button>
            </form>";

            $locked = check_lock($id);
            $lockaction = $locked == '1' ? "🔒" : "🔓";

            $lockbutton = 
            "<form method='POST' class='threadbutton' action='content/index-content/threadlock.php'>
            <input type='hidden' name='thread_id' value=" . $id . ">
            <input type='hidden' name='locked' value=" . $locked . ">
            <button class='threadbuttoncount adminbutton'>$lockaction</button>
            </form>";
            $adminbox = "<div class='threadbuttons'>".$removebutton.$lockbutton."</div>";

        } 
        else {$adminbox = '';}
        
        echo "
        <div class='threadlist'>
            <div class='box thread'>
                <div class='threadcontent'>
                    <div class='threadtags'>tags:   ", tag_array_to_href($tags) ,"</div>
                    <div class='threadcontainer'>
                        <a class='threadtext' href='thread.php?id=", $id, "'>", $title, "</a>
                        ",$adminbox,"

                        <div class='threadbuttons'>
                            <div class='threadbutton'>
                                <div class='threadbuttoncount'>", $replycount ,"</div>
                                <div class='threadbuttontext'>", $reply_text ,"</div>
                            </div>

                            <div class='threadbutton'>
                                <div class='threadbuttoncount'>", $upvotecount ,"</div>
                                <div class='threadbuttontext'>", $upvote_text ,"</div>
                            </div>
                        </div>
                    </div>
                    <div class='threadinfo'>
                        <div class='author'>by:   ", $author ,"</div>
                        <div class='date'>", substr($date, 0, 10) ,"</div>
                    </div>
                </div>
            </div>
        </div>";
    }

    if (isset($_GET['sort']) && $_GET['sort'] === 'top') {
        // sort by upvotes, highest first
        $sql = 
            'SELECT threads.* , COUNT(upvotes.post_id) AS votes
            FROM threads
            LEFT JOIN upvotes ON upvotes.post_id = threads.post_id
            GROUP BY (threads.id)
            ORDER BY votes DESC
            LIMIT ?, 5';  
        
    }
    else if (isset($_GET['sort']) && $_GET['sort'] === 'hot') {
        // sort by upvotes, highest first and only recent ones
        $sql = 
            // :: OG GERSON ::
            'SELECT threads.* , COUNT(1) AS votes
            FROM threads, upvotes, posts
            WHERE threads.post_id = upvotes.post_id
            AND threads.post_id = posts.id 
            AND DATEDIFF(posts.date, now()) >= 0
            GROUP BY (threads.id)
            ORDER BY votes DESC
            LIMIT 5';

    }
    else { 
        // sort by date, newest first
        $sql = 
            'SELECT threads.* 
            FROM threads, posts
            WHERE threads.post_id = posts.id
            ORDER BY posts.date DESC
            LIMIT ?, 5';
    
    }

    $start = isset($_GET['page']) ? (intval($_GET['page']) - 1) * 5 : 0;

    $thread_data = $db->prepare($sql);
    $thread_data->bindValue(1, (int) $start, PDO::PARAM_INT);
    $thread_data->execute();
    $threads = $thread_data->fetchAll();

    foreach($threads as $thread) {
        $threadID = $thread['id'];
        $title = $thread['title'];
        $op = $thread['post_id'];
        
        $post = get_post_from_id($op);

        $author = get_username($post['user_id']);
        $date = $post['date'];
        $replycount = intval(get_rowcount($threadID) - 1);
        $upvotecount = get_post_upvotes_count($op);
        $tags = get_thread_tags($threadID);

        threadprint($threadID, $title, $author, $upvotecount, $date, $tags, $replycount);
    }

?>