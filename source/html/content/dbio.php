<?php 
    // this php file contains all functions related to putting data into and 
    // getting it from the database, once connected.

    include_once($_SERVER['DOCUMENT_ROOT'] . "/auth/connect.php");

    function get_thread_tags($thread_id){
        // takes thread id and returns array containing its tags

        global $db;

        $sql = 'SELECT * FROM tags WHERE thread_id = ?';
        $data = $db->prepare($sql);
        $data->execute([$thread_id]);
        $ptags = $data->fetchAll();

        $ptags = array_map(function ($entry) { return $entry['value']; }, $ptags);

        return $ptags;
    }

    function get_thread_tags_string($thread_id) {
        // returns a comma-separated string of the thread's tags

        global $db;
        
        $ptags = get_thread_tags($thread_id);
        $ptags = 
            array_map(function ($entry) {
                return $entry['value'];
            },
            $ptags);

        $ptags = array_map('strtolower', $ptags);
        $ptags = implode(', ', $ptags);

        return $ptags;
    }

    function get_post_upvotes_count($post_id) {
        // takes post id and returns the number of upvotes it has

        global $db;

        $sql = 'SELECT * FROM upvotes WHERE post_id=?';
        $upvote_data = $db->prepare($sql);
        $upvote_data->execute([$post_id]);
        $count = $upvote_data->rowCount();

        return $count;
    }

    function get_thread_from_id($thread_id) {
        // takes a thread id and returns a dictionary with its data

        global $db;

        $sql = 'SELECT * FROM threads WHERE threadID=?';
        $data = $db->prepare($sql);
        $data->execute([$thread_id]);
        $thread = $data->fetch();

        return $thread;
    }

    function get_post_from_id($post_id) {
        // takes post id and returns a dictionary with its data

        global $db;

        $sql = 'SELECT * FROM posts WHERE ID=?';
        $data = $db->prepare($sql);
        $data->execute([$post_id]);
        $post = $data->fetch();

        return $post;
    }

    function get_username($user_id) {
        // takes user id and returns the associated username

        global $db;

        $sql = 'SELECT * FROM users WHERE id=?';
        $mainframe_data = $db->prepare($sql);
        $mainframe_data->execute([$user_id]);
        $hacked = $mainframe_data->fetch();

        return $hacked['username'];
    }

    function get_rowcount($id = false) {
        // variable function 

        global $db;

        if ($id) {
            $sql = 'SELECT * FROM posts WHERE thread_id=?';
            $data = $db->prepare($sql);
            $data->execute([$id]);
        } else {
            $sql = 'SELECT * FROM threads';
            $data = $db->prepare($sql);
            $data->execute();
        }
        return $data->rowCount();
    }

    function new_thread($user_id, $title, $text, $tags) {
        // creates new thread in the database and returns the thread id

        global $db;

        // new thread
        $sql = 'INSERT INTO threads(title) VALUES(?)';
        $thread = $db->prepare($sql);
        $thread->execute([$title]);
        $thread_id = $db->lastInsertId();

        // new post
        $sql = 'INSERT INTO posts(thread_id, user_id, text) VALUES(?, ?, ?)';
        $post = $db->prepare($sql);
        $post->execute([$thread_id, $user_id, $text]);
        $post_id = $db->lastInsertId();
        
        // update thread
        $sql = 'UPDATE threads SET post_id=? WHERE id=?';
        $thread = $db->prepare($sql);
        $thread->execute([$post_id, $thread_id]);

        // :: tags creation ::
            // removes all whitespaces
            $tags = explode(',', $tags);
            // beginning of sql query
            $sql = 'INSERT INTO tags(thread_id, value) VALUES';
            // preparing batch insertion of tags-post_id pairs part of query
            $values = array();
            foreach ($tags as $tag) {
                array_push($values, "('$thread_id', '$tag')");
            }
            // query finalizing
            $sql = $sql . implode(', ', $values);
            $post = $db->prepare($sql);
            $post->execute();
        // :: end tags creation ::
        return $thread_id;
    }

    function tag_array_to_href($array) {
        // takes a array of thread tags and returns hrefs pointing to the search page

        $links = array();
        foreach ($array as $tag){
            array_push($links, "<a class='link' href='search.php?tags=$tag'>$tag</a>");
        }
        echo implode(', ', $links);
    }

    function fetch_posts($thread_id) {
        // generates html code for all posts with given thread_id
        global $db;

        $start = isset($_GET['page']) ? (intval($_GET['page']) - 1) * 5 : 0;

        $sql = 'SELECT * FROM posts WHERE thread_id=? LIMIT ?, 5';
        $post_data = $db->prepare($sql);
        $post_data->bindValue(1, $thread_id);
        $post_data->bindValue(2, (int) $start, PDO::PARAM_INT);
        $post_data->execute(); 

        // foreach loop printing all posts one at a time
        $posts = $post_data->fetchAll();
        foreach($posts as $post) {
            $user_id = $post['user_id'];
            $text = $post['text'];
            $date = $post['date'];
            $id = $post['id'];
        
            $sql = 'SELECT * FROM upvotes WHERE post_id=?';
            $upvote_data = $db->prepare($sql);
            $upvote_data->execute([$id]);
            $upvotes = $upvote_data->rowCount();

            $sql = 'SELECT * FROM users WHERE id=?';
            $user_data = $db->prepare($sql);
            $user_data->execute([$user_id]);
            $user = $user_data->fetch();
            $pic = $user['icon']; 
            $name = $user['username'];

            printPost($name, $text, $upvotes, $date, $pic, $id);
        }
    }

    function get_thread_title($thread_id) {
        // take thread_id and returns thread title
        global $db;
        
        $sql = 'SELECT * FROM threads WHERE id=?';
        $target = $db->prepare($sql);
        $target->execute([$thread_id]);
    
        $row = $target->fetch();
        return $row['title'];
    }

    function check_lock($id) {
        // checks if a thread is locked
        global $db;

        $sql = 'SELECT * FROM threads WHERE id=?';
        $target = $db->prepare($sql);
        $target->execute([$id]);
        
        $row = $target->fetch();
        return $row['locked'];

    }
?>