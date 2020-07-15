<?php  
$host = host;
$username = user; 
$password = password;
$database = 'catalogue';
$table = 'transactions';
$sDate = $_POST['sDate'];
$eDate = $_POST['eDate'];

date_default_timezone_set("Asia/Kolkata");
$timestamp = "[".date("d-M-Y")."_".date("H:i:s")."]";
$filename = $table.$timestamp;
$output = '';
$mysqli = new mysqli($host, $username, $password, $database);
$query = "SELECT * FROM  $database.`$table` WHERE `Date` >= '$sDate' AND `Date` <= '$eDate'";
if ($result = $mysqli->query($query))
{
    $output .= '
        <table class="table" border="1">  
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
            </tr>
    ';
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
        
        $output .= '
        <tr>  
            <td>'.$field1name.'</td> 
            <td>'.$field2name.'</td> 
            <td>'.$field3name.'</td>
            <td>'.$field4name.'</td> 
            <td>'.$field5name.'</td> 
            <td>'.$field6name.'</td> 
            <td>'.$field7name.'</td> 
            <td>'.$field8name.'</td>
            <td>'.$field9name.'</td>
        </tr>
        ';
    }
    $output .= '</table>';
    header("Content-type: application/vnd.ms-excel; name='excel'");
    header("Content-Disposition: attachment; filename=$filename.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo $output;
}
else
{
    echo 'error';
}
?>