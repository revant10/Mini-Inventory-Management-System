<?php
$host = host;
$username = user; 
$password = password;
$database = 'catalogue';
$table = 'tables';
$btype = $_POST["btype"];
$mysqli = new mysqli($host, $username, $password, $database); 
$query = "SELECT bucket, balance FROM $database.`$table` WHERE btype = '$btype'";
 
echo '<div id="table-v"><table cellpadding=2px> 
        <tr> 
            <th style="width:150px"> <font face="Arial">Bucket</font> </th> 
            <th style="width:150px"> <font face="Arial">Balance</font> </th> 
        </tr>';

if ($result = $mysqli->query($query)) 
{
    while ($row = $result->fetch_assoc()) 
    {
        $field1name = $row["bucket"];
        $field2name = $row["balance"];

        echo '<tr>                                                                                  
                <td>'.$field1name.'</td> 
                <td>'.$field2name.'</td> 
            </tr>';
        echo '</table></div>';
    }
    
}
else
{
    echo 'error';
} 
?>