<?php
include('connection.php');
$nama = htmlspecialchars($_POST['nama']);
$kelas = htmlspecialchars($_POST['kelas']);
$kelas_peminatan = htmlspecialchars($_POST['kelas_peminatan']);
$kehadiran = htmlspecialchars($_POST['kehadiran']);
$tanggal = htmlspecialchars($_POST['tanggal']);
$stmt = mysqli_prepare($connect, "INSERT INTO data_member SET nama=?, kelas=?, kelas_peminatan=?, kehadiran=?, tanggal=?");
mysqli_stmt_bind_param($stmt, "sssss", $nama, $kelas, $kelas_peminatan, $kehadiran, $tanggal);
mysqli_stmt_execute($stmt);

if(mysqli_stmt_affected_rows($stmt) > 0)
    header('Location:index.php');
else
    echo 'input gagal cuy';
?>