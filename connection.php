<?php
$connect = mysqli_connect('localhost', 'root', '', 'ni_db');
if (!$connect) 
    echo "Connection failed: ". mysqli_connect_error();

?>