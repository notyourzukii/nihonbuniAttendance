<?php
    include('connection.php');
    $query = mysqli_query($connect, "SELECT * FROM data_member");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    header("Content-type:application/vnd-ms-excel");
    header("Content-Disposition:attachment; filename=rekap.xls");
?>
<table border="1">
        <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Kelas Peminatan</th>
            <th>Kehadiran</th>
        </tr>
<?php foreach ($results as $result) :?>
        <tr>
            <td><?php echo $result ['nama']?></td>
            <td><?php echo $result ['kelas']?></td>
            <td><?php echo $result ['kelas_peminatan']?></td>
            <td><?php echo $result ['kehadiran']?></td>
            
        </tr>
<?php endforeach;?>
</table>