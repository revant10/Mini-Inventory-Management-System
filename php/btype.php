<?php
$host = host;
$username = user; 
$password = password;
$database = "catalogue";
$table = "schemas";
$mysqli = new mysqli($host, $username, $password, $database); 
$query = "SELECT btype FROM  catalogue.`$table`";
echo'<option value="" selected disabled>Select Bucket Type</option>';
if ($result = $mysqli->query($query)) 
{

    while ($row = $result->fetch_assoc()) 
    {
        $field1name = $row["btype"];
        $str = strtolower($field1name);
        $val = trim($str," ");
        echo '<option value='.$val.'>'.$field1name.'</option>';
    }
    echo '</select></form>';
}
else
{
    echo 'error';
}
?>