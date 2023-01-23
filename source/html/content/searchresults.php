<?php
    // searchresults.php: this contains the functions called in search.php
    // to perform a search operation.

    include_once("auth/connect.php");
    include_once("content/dbio.php");

    function get_search_results($tags, $page){
        // SQL query returning every thread with at least one matching tag
        global $db;
        
        $qtags = ($tags != null ? '("'.implode('","',$tags).'")' : null);

        $sql = "
            SELECT threads.* FROM
            threads, tags
            WHERE threads.id = tags.thread_id
            AND tags.value IN $qtags
            ";

        $data = $db->prepare($sql);
        $data->execute();
        $threads = $data->fetchAll();
        return $threads;
    }

    function print_search_results($threads, $tags, $page){
        // echoes html for search results for given threads, tags and page 
        // number

        $start = ($page - 1) * 5;

        foreach(array_slice($threads, $start, 5, true) as $thread) {
            $post = get_post_from_id($thread['post_id']);
            
            // post data import
            $post_id = $post['id'];  
            $author = get_username($post['user_id']);
            $upvotes = get_post_upvotes_count($post_id);
            $date = $post['date'];
            $text = $post['text'];
            // thread data import
            $thread_id = $thread['id']; 
            $replycount = intval(get_rowcount($thread_id) - 1);
            // $thread = get_thread_from_id($thread_id);
            $title = $thread['title'];
            
            // puts tag value of db rows in an array
            $ptags = get_thread_tags($thread_id);    
            // turns all chars in array to lower case chars
            $ptags = array_map('strtolower', $ptags);
            // mtags for matching tags of current post
            $mtags = array_intersect($tags, $ptags);

            // actual printing of a single result
            resprint($thread_id, $title, $author, $upvotes, $date, $text, $mtags, $ptags, $replycount);
        }
    }

    function resprint($threadID, $title, $author, $upvotes, $date, $text, $mtags, $ptags, $replycount) { 
        // echoes html for single search result

        $upvote_text = $upvotes == 1 ? "upvote" : "upvotes";
        $reply_text = $replycount == 1 ? "reply" : "replies";

        // rendering admin controls based on whether user is an admin
        if (isset($_SESSION['admin']) && $_SESSION['admin'] > 0) {
            $removebutton = 
            "<form method='POST' class='threadbutton' action='content/index-content/threaddelete.php'>
            <input type='hidden' name='thread_id' value=" . $threadID . ">
            <button class='threadbuttoncount adminbutton'>️🗑️</button>
            </form>";

            $locked = check_lock($threadID);
            $lockaction = $locked == '1' ? "🔒" : "🔓";

            $lockbutton = 
            "<form method='POST' class='threadbutton' action='content/index-content/threadlock.php'>
            <input type='hidden' name='thread_id' value=" . $threadID . ">
            <input type='hidden' name='locked' value=" . $locked . ">
            <button class='threadbuttoncount adminbutton'>$lockaction</button>
            </form>";
            $adminbox = "<div class='threadbuttons'>".$removebutton.$lockbutton."</div>";

        } else { $adminbox = ''; }

        echo "
        <div class='threadlist'>
            <div class='box thread'>
                <div class='threadcontent'>
                    <div class='threadtags'>Tags ", tag_array_to_href($mtags), " found in ", tag_array_to_href($ptags),"</div>
                    <div class='threadcontainer'>
                        <a class='threadtext' href='thread.php?id=", $threadID, "'>", $title, "</a>
                        ",$adminbox,"
                        <div class='threadbuttons'>
                            <div class='threadbutton'>
                                <div class='threadbuttoncount'>", $replycount ,"</div>
                                <div class='threadbuttontext'>$reply_text</div>
                            </div>
                            <div class='threadbutton'>
                                <div class='threadbuttoncount'>", $upvotes ,"</div>
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

?>
