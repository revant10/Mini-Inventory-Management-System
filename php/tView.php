<?php
$host = host;
$username = user; 
$password = password;
$database = schema;
$table = 'transactions';
$sDate = $_POST['sDate'];
$eDate = $_POST['eDate'];

date_default_timezone_set("Asia/Kolkata");
$timestamp = "[".date("d-M-Y")."_".date("H:i:s")."]";
$filename = 'Data'.$timestamp;
$output = '';
$mysqli = new mysqli($host, $username, $password, $database);
$query = "SELECT * FROM  $database.`$table` WHERE `Date` >= '$sDate' AND `Date` <= '$eDate'";
echo '<div id="table-v"><table cellpadding=2px> 
        <tr> 
            <th style="width:80px"> <font face="Arial">Sr No</font> </th> 
            <th style="width:150px"> <font face="Arial">Date</font> </th> 
            <th style="width:100px"> <font face="Arial">Order Qty</font> </th>
            <th style="width:175px"> <font face="Arial">Challan No</font> </th> 
            <th style="width:150px"> <font face="Arial">Incoming Qty</font> </th> 
            <th style="width:150px"> <font face="Arial">Outgoing Qty</font> </th> 
            <th style="width:100px"> <font face="Arial">Rejected</font> </th> 
            <th style="width:100px"> <font face="Arial">Balance</font> </th> 
            <th style="width:200px"> <font face="Arial">TimeStamp</font> </th> 
        </tr>';

if ($result = $mysqli->query($query)) 
{
    while ($row = $result->fetch_assoc()) 
    {
        $field1name = $row["Sr_No"];
        $field2name = $row["Date"];
        $field3name = $row["Order_Qty"];
        $field4name = $row["Challan_No"];
        $field5name = $row["Incoming_Qty"];
        $field6name = $row["Outgoing_Qty"];
        $field7name = $row["Rejected"];
        $field8name = $row["Balance"];
        $field9name = $row["TimeStamp"];

        echo '<tr>                                                                                  
                <td>'.$field1name.'</td> 
                <td>'.$field2name.'</td> 
                <td>'.$field3name.'</td>
                <td>'.$field4name.'</td> 
                <td>'.$field5name.'</td> 
                <td>'.$field6name.'</td> 
                <td>'.$field7name.'</td> 
                <td>'.$field8name.'</td>
                <td>'.$field9name.'</td>  
            </tr>';
    };
    
}; 
echo '</table></div>
<br>
<form method="POST" action="../php/tExport.php">
    <input type="date" name="sDate" value='.$sDate.' hidden>
    <input type="date" name="eDate" value='.$eDate.' hidden>
    <button type="submit" id="#exportB" style="width:200px; float:right; opacity:1">Export to Excel</button>
</form>';
?>