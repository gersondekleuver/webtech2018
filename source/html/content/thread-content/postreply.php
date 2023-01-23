<?php
    // postreply.php: contains the html for the reply form at the bottom of every thread
    
    include_once("auth/connect.php");
    include_once("content/dbio.php");
?>

<div class="box" id="reply"> 
    <script>function test() {return 1 == 2;}</script>
    <form id="postreply" method="POST" action="content/thread-content/reply_post.php">
        <?php 
            // makes sure guest cannot reply
            $placeholder = $_SESSION['loggedin'] ? 'Enter your reply here' : 'you have to login to reply';
            $lock = check_lock($_GET['id']);

            // makes sure a locked thread cannot be replied on
            if ($lock) {
                $placeholder = 'This thread has been locked by an admin';
                $disable = 'readonly';
                $buttons =  ['', '', ''];
            } else {  
                $disable = '';
                $buttons= ['onclick="reply.textMarkup(\'*\')"', 'onclick="reply.textMarkup(\'^\')"', 'onclick="reply.textLink()"'];
            }

            echo "
            <textarea id='replytext' type='text' name='text' placeholder='$placeholder' $disable required></textarea >
            <input type='hidden' name='thread_id' value=",$_GET['id'],">
            <input type='hidden' name='author' value=",isset($_SESSION['user_id']),">
            <input type='hidden' name='lock' value=$lock>";
        ?>
        <div id="postreplyoptions">
            <div id="postreplymarkup">
                <button type="button" class="replymarkup" <?php echo $buttons[0]; ?>>B</button>
                <button type="button" class="replymarkup" <?php echo $buttons[1]; ?>>I</button>
                <button type="button" class="replymarkup" <?php echo $buttons[2]; ?>>L</button>
            </div>
            <button type="reset" class="postreplybutton">Cancel</button>
            <button type="submit" class="postreplybutton">Post</button>
        </div>
    </form>
</div>