<?php
$host = host;
$username = user; 
$password = password;
$schema = $_POST['schema'];
$mysqli = new mysqli($host, $username, $password); 
$str = strtolower($schema);
$val = str_replace(" ","", $str);
date_default_timezone_set("Asia/Kolkata");
$query = "CREATE SCHEMA `$val`";
if ($result = $mysqli->query($query)) 
{
    $query = "GRANT ALL PRIVILEGES ON * . * TO 'user'@'host'";
    if ($result = $mysqli->query($query))
    {
        $host = "localhost";
        $username = "vliw"; 
        $password = "everest@1951";
        $database = 'catalogue';
        $timestamp = date("d-M-Y")." ".date("H:i:s");
        $mysqli = new mysqli($host, $username, $password, $database);
        $query = "INSERT INTO catalogue.`schemas` (btype, timestamp) VALUES ('$schema', '$timestamp')";
        if ($result = $mysqli->query($query))
        {
            echo'<img src="../img/done.png" height="200px" width="200px">';
        }
        else
        {
            echo 'error1';
        }
    }
    else
    {
        echo 'error2';
    }
    
}
else
{
    echo 'error3';
}
?>