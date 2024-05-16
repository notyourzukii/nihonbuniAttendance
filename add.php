<?php
include('connection.php');

$queryNama = $connect->prepare("SELECT id, nama FROM data_member");
$queryNama->execute();
$resultNama = $queryNama->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.min.js"></script>
    <link href="select2/dist/css/select2.min.css" rel="stylesheet">
    <script src="select2/dist/js/select2.min.js"></script>
    <title>Add Attendance</title>
</head>
<body>
    <form action="insert.php" method="post">
        <input type="hidden" name="id">
        
        <label for="id_member">Nama</label><br>
        <select class="js-example-basic-single" name="id_member" id="id_member">
            <?php
            while ($data = $resultNama->fetch_assoc()) {
                echo "<option value='" . htmlspecialchars($data['id']) . "'>" . htmlspecialchars($data['nama']) . "</option>";
            }
            ?>
        </select>
        <br><br><br> 
        <label for="tanggal">Tanggal Ekskul</label><br>
        <input type="date" name="tanggal" id="tanggal">
        
        <br><br>
        
        <label for="kehadiran">Kehadiran</label><br>
        <select name="kehadiran" id="kehadiran">
            <option value="M">Hadir</option>
            <option value="I">Izin</option>
            <option value="S">Sakit</option>
        </select>

        <br><br>
        
        <button type="submit">Tambah</button>
    </form>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
</body>
</html>
