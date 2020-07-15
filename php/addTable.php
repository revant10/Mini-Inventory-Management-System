<?php
$host = host;
$username = user; 
$password = password;
$schema = $_POST["schema"];
$table = $_POST["table"];
$ob = $_POST["ob"];
date_default_timezone_set("Asia/Kolkata");
$mysqli = new mysqli($host, $username, $password);

$str1 = strtolower($schema);
$val1 = str_replace(" ", "", $str1);
$database = $schema;

$str2 = strtolower($table);
$val2 = str_replace(" ", "", $str2);

$timestamp = date("d-M-Y")." ".date("H:i:s");

$mysqli = new mysqli($host, $username, $password, $schema); 

$query = "CREATE TABLE `$val1`.`".$val2."` (`Sr_No` INT NOT NULL AUTO_INCREMENT, `Date` DATE NULL, `Order_Qty` INT NULL, `Challan_No` VARCHAR(45) NULL, `Incoming_Qty` INT NULL, `Outgoing_Qty` INT NULL, `Rejected` INT NULL, `Balance` INT NULL, `TimeStamp` VARCHAR(45) NULL, PRIMARY KEY (`Sr_No`))";
if ($result = $mysqli->query($query)) 
{
    $database_b = 'catalogue';
    $mysqli = new mysqli($host, $username, $password, $database_b);
    $query = "INSERT INTO catalogue.`tables` (btype, bucket, buckets, balance, timestamp) VALUES ('$val1','$table', '$val2', '$ob', '$timestamp')";
    if ($result = $mysqli->query($query))
    {
        echo'<img src="../img/done.png" height="200px" width="200px">';
    }
    else
    {
        echo 'error';
    }

}

else
{
    echo 'error';
}
?>