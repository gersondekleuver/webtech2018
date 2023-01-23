<?php 
    // connect.php: locates and finds sql config file stored outside of html scope

    $config = false;
    $dir = "";
    while ($config == false) {
        if (file_exists($dir . "mysql_config.xml")) {
            $config = simplexml_load_file($dir . "mysql_config.xml");
        }
        $dir = $dir . "../";
    }

    if ($config === false) {
        die("Error loading xml file");
    } else {
        $db = new PDO("mysql:host=$config->mysql_host;dbname=$config->mysql_database;charset=utf8",
        "$config->mysql_username", "$config->mysql_password")
        or die('Error connecting to mysql server');
    }

    function filter($input) {
        // returns clean text
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

?>