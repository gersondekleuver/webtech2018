<div class="accountpage" id="account-login">
    <div class="message" id="message-login"></div> 
    <form method="POST" action="auth/login.php">
        <input class="drop-content" type="email" name="_email" placeholder="Email" required>   
        <input class="drop-content" type="password" name="_password" placeholder="Password" required> 
        <button class="drop-content" type="submit">Login</button>
    </form>
    <div class="drop-content split">
        <div class="accountnav" data-ref="account-register">Register</div><div class="accountnav" data-ref="account-forgot">Forgot Password?</div>
    </div>
</div>
<div class="accountpage" id="account-register">
    <div class="message" id="message-register"></div> 
    <form method="POST" action="auth/register.php">
        <input class="drop-content" type="email" name="_email" placeholder="Email"
                Title="Must be a valid email address" required>
        <input class="drop-content" type="text" name="_username" placeholder="Username" 
                pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{3,20}$"
                Title="Must be between 4-20 characters" required>
        <input class="drop-content" type="password" name="_password" placeholder="Password"
                pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                Title="Must atleast be 8 characters and must contain atleast 1 number, upper and lower character" required>
        <input class="drop-content" type="password" name="_password2" placeholder="Confirm Password" required>
        <button class="drop-content" type="submit"">Register</button>
    </form>
    <div class="drop-content split">
        <div class="accountnav" data-ref="account-login">Login</div><div class="accountnav" data-ref="account-forgot">Forgot Password?</div>
    </div>
</div>
<div class="accountpage" id="account-forgot">
    <div class="message" id="message-forgot"></div> 
    <form method="POST" action="auth/forgot.php">
        <input class="drop-content" type="email" name="_email" placeholder="Email"
                Title="Must be a valid email adress" required>
        <button class="drop-content" type="submit">Reset Password</button>
    </form>
    <div class="drop-content split">
        <div class="accountnav" data-ref="account-login">Login</div><div class="accountnav" data-ref="account-register">Register</div>
    </div>              
</div>   