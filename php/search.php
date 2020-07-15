<?php
$host = host;
$username = user; 
$password = password;
$database = $_POST["database"];
$table = $_POST["table"];
$srno = $_POST['srno'];
$mysqli = new mysqli($host, $username, $password, $database); 
$query = "SELECT * FROM  `$table` WHERE `Sr_No` = '$srno'";
echo '<center><table cellpadding=5px class="table5" id="table5"> 
        <tr> 
            <th> <font face="Arial">Sr No</font> </th> 
            <th style="width:150px"> <font face="Arial">Date</font> </th> 
            <th> <font face="Arial">Order Qty</font> </th>
            <th style="width:150px"> <font face="Arial">Challan No</font> </th> 
            <th> <font face="Arial">Incoming Qty</font> </th> 
            <th> <font face="Arial">Outgoing Qty</font> </th> 
            <th> <font face="Arial">Rejected</font> </th>
            <th> <font face="Arial">Balance</font> </th>  
            <th style="width:150px"> <font face="Arial">TimeStamp</font> </th> 
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
                <td ><input type="text" disabled style="width:30px" value='.$field1name.'></td> 
                <td ><input type="date" disabled style="width:200px" value='.$field2name.'></td> 
                <td ><input type="number" disabled style="width:80px" value='.$field3name.'></td>
                <td ><input type="text" disabled style="width:150px" value='.$field4name.'></td> 
                <td ><input type="number" disabled style="width:80px" value='.$field5name.'></td> 
                <td ><input type="number" disabled style="width:80px" value='.$field6name.'></td> 
                <td ><input type="number" disabled style="width:70px" value='.$field7name.'></td> 
                <td ><input type="number" disabled style="width:80px" value='.$field8name.'></td> 
                <td ><input type="text" disabled style="width:150px" value='.$field9name.'></td> 
            </tr>
            <tr>                                                                                  
                <td ><input type="text" disabled style="width:30px" id="m-srno" value='.$field1name.' hidden></td> 
                <td ><input type="date" id="m-date" style="width:200px" value='.$field2name.'></td> 
                <td ><input type="number" style="width:80px" id="m-order-q" value= 0></td>
                <td ><input type="text" style="width:150px" id="m-challan-no" value='.$field4name.'></td> 
                <td ><input type="number" style="width:80px" id="m-in-q" value= 0></td> 
                <td ><input type="number" style="width:80px" id="m-out-q" value= 0></td> 
                <td ><input type="number" style="width:70px" id="m-reject-q" value= 0></td> 
                <td ><input type="number" disabled style="width:80px" hidden></td> 
                <td ><input type="text" disabled style="width:150px" hidden></td> 
            </tr>';
        echo '</table> </center>';
    }
    
}
else
{
    echo 'error';
}
?>