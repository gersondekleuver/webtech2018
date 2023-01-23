<!-- createform.php: contains html for the form for creating a thread -->

<form method="POST" action="content/create-content/createsubmit.php" id="form-create">
    <input type="text" name="title" placeholder="Title" class="title" required>
    <!-- url can be used to prefill this tags field -->
    <input type="text" name="tags" placeholder="Comma-separated tags (min. 1)" class="title"  
        <?php if(isset($_GET['tags'])){ echo "value = '".$_GET['tags']."'"; }?> 
        required>
    <textarea id='replytext' type='text' name='text' placeholder="Text" class="title" required></textarea>
    <div id="postreplyoptions" style="margin-left:5px;margin-right:5px;margin-bottom:5px">
        <div id="postreplymarkup">
            <button type="button" class="replymarkup" onclick="reply.textMarkup('*')">B</button>
            <button type="button" class="replymarkup" onclick="reply.textMarkup('^')">I</button>
            <button type="button" class="replymarkup" onclick="reply.textLink()">L</button>
        </div>
        <button type="button" class="postreplybutton" onClick="javascript:history.go(-1)">Cancel</button>
        <button type="submit" class="postreplybutton">Post</button>
    </div>
</form>