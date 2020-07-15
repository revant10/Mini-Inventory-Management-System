<?php 

$host = host;
$username = user; 
$password = password;
date_default_timezone_set("Asia/Kolkata");
$database = $_POST["database"];
$table = $_POST['table'];
$date = $_POST["date"];
$order = $_POST["order"];
$challan =  $_POST["challan"];
$in = $_POST["in"];
$out = $_POST["out"];
$reject = $_POST["reject"];
$timestamp = date("d-M-Y")." ".date("H:i:s");

$database_b = 'catalogue';
$mysqli = new mysqli($host, $username, $password, $database_b);

$query = "SELECT balance FROM $database_b.`tables` WHERE buckets = '$table'";
if ($result = $mysqli->query($query))
{
    $row = $result->fetch_assoc(); 
    $old_balance = $row['balance'];
    $new_balance = ($old_balance + $in) - ($out + $reject);

    $query = "UPDATE $database_b.`tables` SET balance = $new_balance WHERE buckets = '$table'";
    if ($result = $mysqli->query($query))
    {
        $mysqli = new mysqli($host, $username, $password, $database);
        $query = "INSERT INTO $database.`$table` (`Date`, `Order_Qty`, `Challan_No`, `Incoming_Qty`, `Outgoing_Qty`, `Rejected`, `Balance`, `TimeStamp`) VALUES ('$date', $order, '$challan', $in, $out, $reject, $new_balance, '$timestamp')";
        if ($result = $mysqli->query($query))
        {
            $srno  = $mysqli->insert_id;
            $mysqli = new mysqli($host, $username, $password, $database_b);
            $query = "INSERT INTO $database_b.`transactions` (`btype`, `type`,`Sr_No`, `Date`, `Order_Qty`, `Challan_No`, `Incoming_Qty`, `Outgoing_Qty`, `Rejected`, `Balance`, `TimeStamp`) VALUES ('$database', '$table', $srno, '$date', $order, '$challan', $in, $out, $reject, $new_balance, '$timestamp')";
            if ($result = $mysqli->query($query))
            {
                echo '<table cellpadding=2px clas="table"> 
                <tr> 
                <th style="width:80px"> <font face="Arial">Sr No</font> </th> 
                <th style="width:150px"> <font face="Arial">Date</font> </th> 
                <th > <font face="Arial">Order Qty</font> </th>
                <th style="width:150px"> <font face="Arial">Challan No</font> </th> 
                <th > <font face="Arial">Incoming Qty</font> </th> 
                <th > <font face="Arial">Outgoing Qty</font> </th> 
                <th > <font face="Arial">Rejected</font> </th>
                <th > <font face="Arial">Balance</font> </th> 
                <th style="width:200px"> <font face="Arial">TimeStamp</font> </th> 
                </tr>';
                $mysqli = new mysqli($host, $username, $password, $database);
                $query = "SELECT * FROM  $database.`$table` WHERE `Sr_No` = '$srno'";
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
                    }
                }
                else
                {
                    echo'error1';
                }
                echo '</table>';
            }
            else
            {
                echo'error2';
            }

            
        }
        else
        {
            echo'error3';
        }
    }
    else
    {
        echo'error4';
    }
    
}
else
{
    echo'error5';
}
?>