<?php
    include('connection.php');
    $query = mysqli_query($connect, "SELECT * FROM data_member");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Absensi</title>
</head>
<body>
    <a href="add.php">Absen</a><a href="recap.php">Convert To Excel</a>
    <form action="search.php" method="get">
        <input type="text" name="keyword" placeholder="Keyword....">
        <button type="submit">Search</button>
    </form>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
        <select name="month">
            <option value=1>January</option>
            <option value=2>February</option>
            <option value=3>March</option>
            <option value=4>April</option>
            <option value=5>May</option>
            <option value=6>June</option>
            <option value=7>July</option>
            <option value=8 selected>August</option>
            <option value=9>September</option>
            <option value=10>October</option>
            <option value=11>November</option>
            <option value=12>December</option>
        </select>
        <button type="submit">Submit</button>
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET["month"])) { 
                $selected = $_GET["month"]; 
                $startDate = new DateTime('2024-08-01');
                $endDate = new DateTime('2025-07-31');
                $saturdays = [];
                while ($startDate <= $endDate) {
                    if ($startDate->format('n') == $selected && $startDate->format('N') === '6') {
                        $saturdays[] = $startDate->format('Y-m-d');
                    }
                    $startDate->modify('+1 day');
                }
            }
            
        }      
    ?>
    <h3>
        <?php
            if (isset($_GET["month"])) {
            $selectedMonth = $_GET["month"];
            $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            echo $months[$selectedMonth - 1];
        }
        ?>
    </h3>
    <?php if (!empty($saturdays)):?>
        <table border="1 solid black">
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Kelas Peminatan</th>
                <?php
                    for ($i = 0; $i < count($saturdays); $i++) {
                        echo "<th>". date('d', strtotime($saturdays[$i])). "</th>";
                    }
                ?>
                <th>opsi</th>
            </tr>
            <?php foreach ($results as $result) :?>
            <tr>
                <td><?php echo $result ['nama']?></td>
                <td><?php echo $result ['kelas']?></td>
                <td><?php echo $result ['kelas_peminatan']?></td>
                <?php
                    for ($i = 0; $i < count($saturdays); $i++) {
                        if ($result['tanggal'] == $saturdays[$i]) {
                            echo "<td>". $result ['kehadiran']."</td>" ;
                        } else {
                            echo "<td>A</td>";
                        }
                    }
                ?>
                <td><?php echo $result ['tanggal']?></td>
                <td>
                    <a href="edit.php?id=<?php echo $result['id']?>">edit</a>
                    <a href="delete.php?id=<?php echo $result['id']?>">delete</a>
                </td>
            </tr>
<?php endforeach;?>
        </table>
    <?php endif;?>
</body>
</html>
