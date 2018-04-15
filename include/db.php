<?php
$conn=new mysqli("localhost","root","","newapp");
if($conn->connect_error)
    echo "connection failed to connect!!";
?>