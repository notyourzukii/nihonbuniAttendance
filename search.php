<?php
include('connection.php');
$keyword = $_GET['keyword'];
$query = mysqli_query($connect, "SELECT * FROM data_member WHERE nama='$keyword'");
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <a href="add.php">Tambah Data</a>
    <form action="search.php" method="get">
        <input type="text" name="keyword" placeholder="Keyword...." value="<?php echo $_GET['keyword']?>">
        <button type="submit">Search</button>
    </form>
    <br>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Kelas Peminatan</th>
            <th>Kehadiran</th>
            <th>Opsi</th>
        </tr>
<?php foreach ($results as $result) :?>
        <tr>
            <td><?php echo $result ['nama']?></td>
            <td><?php echo $result ['kelas']?></td>
            <td><?php echo $result ['kelas_peminatan']?> <i class='bx bxs-check-circle'></i> </td>
            <td><?php echo $result ['kehadiran']?></td>
            <td>
                <a href="edit.php?id=<?php echo $result['id']?>">edit</a>
                <a href="delete.php?id=<?php echo $result['id']?>">hapus</a>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
</body>
</html>