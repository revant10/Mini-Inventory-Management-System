<?php 

$host = host;
$username = user; 
$password = password;
date_default_timezone_set("Asia/Kolkata");
$database = $_POST["database"];
$table = $_POST["table"];
$database_b = 'catalogue';
$srno = $_POST['srno'];
$date = $_POST["date"];
$order = $_POST["order"];
$challan =  $_POST["challan"];
$in = $_POST["in"];
$out = $_POST["out"];
$reject = $_POST["reject"];
$timestamp = date("d-M-Y")." ".date("H:i:s");

$mysqli = new mysqli($host, $username, $password, $database_b);
$query = "SELECT balance FROM $database_b.`tables` WHERE buckets = '$table'";
if($result = $mysqli->query($query))
{
    $row = $result->fetch_assoc(); 
    $old_balance = $row['balance'];
    $new_balance = ($old_balance + $in) - ($out + $reject);
    $query = "UPDATE $database_b.`tables` SET balance = $new_balance WHERE buckets = '$table'";
    if ($result = $mysqli->query($query))
    {
        $mysqli = new mysqli($host, $username, $password, $database);
        $query = "SELECT * FROM  $database.`$table` WHERE `Sr_No` = '$srno'";
        if($result = $mysqli->query($query))
        {
            ($row = $result->fetch_assoc()); 
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
            }
            $order_new = $field3name + $order;
            $incoming_new = $field5name + $in;
            $outgoing_new = $field6name + $out;
            $rejected_new = $field7name + $reject; 
            $mysqli = new mysqli($host, $username, $password, $database);
            $query = "UPDATE $database.`$table` SET `Date` = '$date', Order_Qty = $order_new, Challan_No = '$challan', Incoming_Qty = $incoming_new, Outgoing_Qty = $outgoing_new, Rejected = $rejected_new, Balance = $new_balance, `TimeStamp` = '$timestamp' WHERE `Sr_No` = '$srno'";
            if ($result = $mysqli->query($query))
            {
                $mysqli = new mysqli($host, $username, $password, 'catalogue');
                $query = "UPDATE catalogue.`transactions` SET `Date` = '$date', Order_Qty = $order_new, Challan_No = '$challan', Incoming_Qty = $incoming_new, Outgoing_Qty = $outgoing_new, Rejected = $rejected_new, Balance = $new_balance, `TimeStamp` = '$timestamp' WHERE `btype` = '$database' AND `Sr_No` = '$srno' AND `type` = '$table'";
                if ($result = $mysqli->query($query))
                {
                    echo '<table cellpadding=5px clas="table5" id="table6"> 
                    <tr> 
                    <th style="width:80px"> <font face="Arial">Sr No</font> </th> 
                    <th style="width:150px"> <font face="Arial">Date</font> </th> 
                    <th > <font face="Arial">Order Qty</font> </th>
                    <th style="width:150px> <font face="Arial">Challan No</font> </th> 
                    <th > <font face="Arial">Incoming Qty</font> </th> 
                    <th > <font face="Arial">Outgoing Qty</font> </th> 
                    <th > <font face="Arial">Rejected</font> </th> 
                    <th > <font face="Arial">Balance</font> </th> 
                    <th style="width:200px"> <font face="Arial">TimeStamp</font> </th> 
                    </tr>';

                    if ($result = $mysqli->query($query))
                    {
                        $mysqli = new mysqli($host, $username, $password, $database);
                        $query = "SELECT * FROM  $database.`$table` WHERE Sr_No = '$srno'";
                        if($result = $mysqli->query($query))
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
                                echo '</table>';
                            }
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
    
}
else
{
    echo 'error';
}
?>