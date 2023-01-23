<?php 

    function printPost($name, $text, $upvotes, $date, $pic, $id) {
        global $db;

        $sql = 'SELECT * FROM upvotes WHERE user_id=? AND post_id=?';
        $upvote_data = $db->prepare($sql);

        // Checks if post is already liked
        if (isset($_SESSION['user_id'])) {
            $upvote_data->execute([$_SESSION['user_id'],$id]);
            $voted = $upvote_data->rowCount();
        } else {
            $voted = 0;
        }

        // Changes upvote button collor if post is already liked
        $background = $_SESSION['theme'] == "day" ? "#46494f" : "#9b3939";
        $color = $_SESSION['theme'] == "day" ? "#fafafaaf" : "";
        $style = ($voted > 0 ? "style='background:$background;color:$color'" : "");    
        
        if (isset($_SESSION['admin']) && $_SESSION['admin'] > 0) {
            $removebutton = 
            "<form method='POST' class='postbutton' action='content/thread-content/postdelete.php'>
            <input type='hidden' name='post_id' value=" . $id . ">
            <button class='removebutton'>X</button>
            </form>";
        } else { $removebutton = ''; }

        // Store the quotes from the content
        $store = false;
        $text_cache = $text;
        $text = "";
        $quote = "";
        $quoteCount = 0;
        $splice = 0;
        for ($i = 0; $i < strlen($text_cache); $i++) {
            $char = $text_cache[$i];
            
            $text .= $char;
            if($store) {
                $quote .= $char;
            }

            if ($char == "@") {
                $store = true;
                $splice = $i;
            }
            else if ($char == "`") {
                $quoteCount += 1;
                if ($quoteCount % 2 == 0) {
                    $text = substr($text, 0, $splice) . "<span> <a class='quote'>@" . $quote . "</a></span>";
                    $quote = "";
                    $store = false;
                }
            }
        }
        $text = "<span nowrap>" . $text . "</span>";
        

        // Prints post with content
        echo "
        <div class='post box' id= 'post_",$id,"'>
            <div class='posterinfo'>
                <div class='posterpic'><img src='img/icon_$pic.png'/></div>
                <div class='postername'>",$name,"</div>
            </div>
            <div class='postcontent'>
                <div class='posttext'>",$text,"</div>
                <div class='postdescription'>
                    <button class='postreply' onclick='reply.userQuote(\"$name\", \"$id\")'>Reply</button>
                    <form method='POST' class='postbutton' action='content/thread-content/upvote.php'>
                        <input type='hidden' name='post_id' value=",$id,">
                        <button class='postupvotebutton' $style>",$upvotes,"</button>
                    </form>
                    <div class='postdate'>",$date,"</div>
                    ",$removebutton,"
                </div>
            </div>
        </div>";
    }
?>