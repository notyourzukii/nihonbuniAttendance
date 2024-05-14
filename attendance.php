<?php
include('connection.php');
$tanggal = htmlspecialchars($_GET['tanggal']);
$stmt = mysqli_prepare($connect, "SELECT * FROM data_member WHERE tanggal=?");
mysqli_stmt_bind_param($stmt, "s", $tanggal);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
mysqli_stmt_bind_result($stmt, $id, $nama, $kelas, $kelas_peminatan, $kehadiran, $tanggal);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendance</title>
</head>
<body>
  <h1>Attendance Records for <?php echo $tanggal;?></h1>
  <table border="1">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Class</th>
        <th>Class Preference</th>
        <th>Attendance</th>
      </tr>
    </thead>
    <tbody>
      <?php while (mysqli_stmt_fetch($stmt)):?>
        <tr>
          <td><?php echo $id;?></td>
          <td><?php echo $nama;?></td>
          <td><?php echo $kelas;?></td>
          <td><?php echo $kelas_peminatan;?></td>
          <td><?php echo $kehadiran;?></td>
        </tr>
      <?php endwhile;?>
    </tbody>
  </table>
</body>
</html>