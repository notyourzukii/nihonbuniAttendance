<?php
include('connection.php');
$id=$_GET['id'];
$delete = mysqli_query($connect, "DELETE FROM data_member WHERE id='$id'");
if($delete)
header('Location:index.php');
else 
    echo 'gagal min';
?>