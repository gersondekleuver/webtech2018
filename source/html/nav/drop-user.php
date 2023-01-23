<div class="accountpage" id="account-settings">
    <div class="drop-content accountnav" data-ref="account-picture" id="picture-small">Change Picture</div>
    <div class="drop-content accountnav" data-ref="account-username" id="username-small">Change Username</div>
    <div class="drop-content accountnav" data-ref="account-password" id="password-small">Change Password</div>
    <form method="POST" action="auth/logout.php">
        <button class="drop-content" data-ref="account-logout" type="submit">Logout</button>
    </form>
</div>    
<div class="accountpage" id="account-picture">
    <div class="message" id="message-picture"></div> 
    <div class="drop-content picture-container">
        <?php 
            for ($i = 1; $i <= 6; $i++) {
                echo "<div class='picture-box'><button id='icon_$i'><img src='img/icon_$i.png'/></button></div>";
            }
            
        ?>
    </div>
    <form method="POST" action="auth/icon.php">
        <input type="hidden" name="_icon" value="0">
        <button class="change" type="submit">Change</button><div class="accountnav back" data-ref="account-settings">Back</div>
    </form>
</div>    
<div class="accountpage" id="account-username">
    <div class="message" id="message-username"></div> 
    <form method="POST" action="auth/username.php">
        <input class="drop-content" type="text" name="_username" placeholder="Desired Username" 
                pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{3,20}$"
                Title="Must be between 4-20 characters" required>
        <button class="change" type="submit">Change</button><div class="accountnav back" data-ref="account-settings">Back</div>
    </form>
</div> 
<div class="accountpage" id="account-password">
    <div class="message" id="message-password"></div> 
    <form method="POST" action="auth/password.php">
        <input class="drop-content" type="password" name="_oldpassword" placeholder="Current Password">
        <input class="drop-content" type="password" name="_password" placeholder="New Password"
                pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                Title="Must atleast be 8 characters and must contain atleast 1 number, upper and lower character" required>
        <input class="drop-content" type="password" name="_password2" placeholder="Confirm Password">
        <button class="change" type="submit">Change</button><div class="accountnav back" data-ref="account-settings">Back</div>
    </form>
</div> 