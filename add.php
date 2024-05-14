<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add</title>
</head>
<body>
    <form action="insert.php" method="post">
        <input type="hidden" name="id">
        <label for="">Nama</label><br>
        <input type="text" name="nama" id="">
        <br><br>
        <label for="">kelas</label><br>
        <input type="text" name="kelas" id="">
        <br><br>
        <label for="">kelas_peminatan</label><br>
        <select name="kelas_peminatan" id="">
            <option value="bahasa">bahasa</option>
            <option value="animanga">animanga</option>
        </select>
        <br><br>
        <label for="">tanggal ekskul</label><br>
        <input type="date" name="tanggal" id="">
        
        <br><br>
        <label for=""></label><br>
        <select name="kehadiran" id="">
            <option value="M">hadir</option>
            <option value="I">Izin</option>
            <option value="S">Sakit</option>
        </select>

        <br><br>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>