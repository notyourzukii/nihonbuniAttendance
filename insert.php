<?php
include('connection.php');
$id_member = htmlspecialchars($_POST['id_member']);
$kehadiran = htmlspecialchars($_POST['kehadiran']);
$tanggal = htmlspecialchars($_POST['tanggal']);
$stmt = mysqli_prepare($connect, "INSERT INTO data_kehadiran (id_member, kehadiran, tanggal) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sss", $id_member, $kehadiran, $tanggal);
mysqli_stmt_execute($stmt);

if(mysqli_stmt_affected_rows($stmt) > 0)
    header('Location:index.php');
else
    echo 'input gagal cuy';
?>
