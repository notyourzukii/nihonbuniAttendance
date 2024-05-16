<?php
    include('connection.php');
    $id=$_GET['id'];
    $query = mysqli_query($connect, "SELECT * FROM data_member WHERE id='$id' LIMIT 1");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
</head>
<body>
    <!-- <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $results[0]['id']?>">
        <label for="">Nama</label><br>
        <input type="text" name="nama" id="" value="<?php echo $results[0]['nama']?>">
        <br><br>    
        <label for="">Kelas</label><br>
        <input type="text" name="kelas" id="" value="<?php echo $results[0]['kelas']?>">
        <br><br>
        <label for="">Kelasv eminatan</label><br>
        <select name="kelas_peminatan" id="">
            <option value="bahasa"<?php echo ($results[0]['kelas_peminatan']=='bahasa')?'selected':'';?>>bahasa</option>
            <option value="animanga"<?php echo ($results[0]['kelas_peminatan']=='animanga')?'selected':'';?>>animanga</option>
        </select>
        <br><br>
        <label for="">kehadiran</label><br>
        <select name="kehadiran" id="">
            <option value="M"<?php echo ($results[0]['kehadiran']=='M')?'selected':'';?>>hadir</option>
            <option value="I"<?php echo ($results[0]['kehadiran']=='I')?'selected':'';?>>Izin</option>
            <option value="S"<?php echo ($results[0]['kehadiran']=='S')?'selected':'';?>>Sakit</option>
        </select>        <br><br>
        <button type="submit">ganti min</button>
    </form> -->
</body>
</html>