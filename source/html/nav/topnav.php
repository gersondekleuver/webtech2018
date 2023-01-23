<div class="topnav">
    <div class="logo">
        <a href="."><b>Coin Desk</b></a>
    </div>
    <div class="topnav-button">
        <input placeholder="Search" id="search"></input>
        <div class="dropnav" data-ref="drop-account" id="account">
            <?php 
                $status = $_SESSION["loggedin"] ? $_SESSION["username"] : "Account";
                echo $status;
            ?>
        </div>
        <div class="dropnav" data-ref="drop-menu" id="menu">☰</div>
    </div>
</div>
<div class="droppage" id="drop-account" style="display:none;">
    <?php 
        $status = $_SESSION["loggedin"] ? "user" : "guest"; 
        include("drop-" . $status . ".php"); 
    ?>
</div>     
<div class="droppage" id="drop-menu" style="display:none;">
    <input class="drop-content" id="search-small" placeholder="Search"></input>
    <div class="drop-content dropnav" data-ref="drop-account" id="account-small">
        <?php 
            $status = $_SESSION["loggedin"] ? $_SESSION["username"] : "Account";
            echo $status;
        ?>
    </div>
    <form method="POST" action="switch.php">
        <button class="drop-content" type="submit" id="themetoggle">Switch to <?php echo $_SESSION["theme"] == "day" ? "Night" : "Day"; ?> Mode</button>
    </form>
    <a class="drop-content" href="/thread.php?id=1">About</a>
    <a class="drop-content" href="/thread.php?id=2">Contact</a>
</div>