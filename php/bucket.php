<?php
$host = host;
$username = user; 
$password = password;
$database = database_schema;
$table = table_name;
$mysqli = new mysqli($host, $username, $password, $database); 
$btype = $_POST["bucket"];
$query = "SELECT bucket FROM  $database.`$table` WHERE btype='".$btype."'";
echo'<option value="" selected disabled>Select Bucket</option>';
if ($result = $mysqli->query($query)) 
{
    
    while ($row = $result->fetch_assoc()) 
    {
        $field1name = $row["bucket"];
        $str = strtolower($field1name);
        $val = str_replace(" ","", $str);
        echo '<option value='.$val.'>'.$field1name.'</option>';
    }
}

?>