<?php
    include('connection.php');
    $id = $_POST['id'];
    $nama = htmlspecialchars($_POST['nama']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $kelas_peminatan = htmlspecialchars($_POST['kelas_peminatan']);
    $kehadiran = htmlspecialchars($_POST['kehadiran']);
    $update = mysqli_query($connect,"UPDATE data_member SET nama='$nama', kelas='$kelas', kelas_peminatan='$kelas_peminatan', kehadiran='$kehadiran' WHERE id='$id'");
    if($update)
        header('Location:index.php');
    else
        echo 'input gagal cuy';
?>