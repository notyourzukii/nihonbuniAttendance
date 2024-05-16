<?php
include('connection.php');
$queryMember = $connect->prepare("SELECT * FROM data_member");
$queryMember->execute();
$resultsMember = $queryMember->get_result()->fetch_all(MYSQLI_ASSOC);
$queryKehadiran = $connect->prepare("SELECT * FROM data_kehadiran");
$queryKehadiran->execute();
$resultsKehadiran = $queryKehadiran->get_result()->fetch_all(MYSQLI_ASSOC);

$saturdays = [];
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["month"])) {
    $selectedMonth = intval($_GET["month"]);
    $startDate = new DateTime('2024-08-01');
    $endDate = new DateTime('2025-07-31');
    while ($startDate <= $endDate) {
        if ($startDate->format('n') == $selectedMonth && $startDate->format('N') === '6') {
            $saturdays[] = $startDate->format('Y-m-d');
        }
        $startDate->modify('+1 day');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="js/jquery.min.js"></script>
    <link href="select2/dist/css/select2.min.css" rel="stylesheet">
    <script src="select2/dist/js/select2.min.js"></script>
    <title>Absensi</title>
</head>
<body>
    <a href="add.php">Absen</a>
    <a href="recap.php">Convert To Excel</a>

    <form action="search.php" method="get">
        <input type="text" name="keyword" placeholder="Keyword....">
        <button type="submit">Search</button>
    </form>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
        <select class="js-example-basic-single" name="month">
            <option value=8 <?php echo (isset($selectedMonth) && $selectedMonth == 8) ? 'selected' : ''; ?>>August</option>
            <option value=9 <?php echo (isset($selectedMonth) && $selectedMonth == 9) ? 'selected' : ''; ?>>September</option>
            <option value=10 <?php echo (isset($selectedMonth) && $selectedMonth == 10) ? 'selected' : ''; ?>>October</option>
            <option value=11 <?php echo (isset($selectedMonth) && $selectedMonth == 11) ? 'selected' : ''; ?>>November</option>
            <option value=12 <?php echo (isset($selectedMonth) && $selectedMonth == 12) ? 'selected' : ''; ?>>December</option>
            <option value=1 <?php echo (isset($selectedMonth) && $selectedMonth == 1) ? 'selected' : ''; ?>>January</option>
            <option value=2 <?php echo (isset($selectedMonth) && $selectedMonth == 2) ? 'selected' : ''; ?>>February</option>
            <option value=3 <?php echo (isset($selectedMonth) && $selectedMonth == 3) ? 'selected' : ''; ?>>March</option>
            <option value=4 <?php echo (isset($selectedMonth) && $selectedMonth == 4) ? 'selected' : ''; ?>>April</option>
            <option value=5 <?php echo (isset($selectedMonth) && $selectedMonth == 5) ? 'selected' : ''; ?>>May</option>
            <option value=6 <?php echo (isset($selectedMonth) && $selectedMonth == 6) ? 'selected' : ''; ?>>June</option>
            <option value=7 <?php echo (isset($selectedMonth) && $selectedMonth == 7) ? 'selected' : ''; ?>>July</option>
        </select>
        <button type="submit">Submit</button>
    </form>

    <?php if (isset($selectedMonth)): ?>
        <h3>
            <?php
            $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            echo htmlspecialchars($months[$selectedMonth - 1]);
            ?>
        </h3>
    <?php endif; ?>

    <?php if (!empty($saturdays)): ?>
        <table  border="1 solid black">
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Kelas Peminatan</th>
                <?php foreach ($saturdays as $saturday): ?>
                    <th><?php echo htmlspecialchars(date('d', strtotime($saturday))); ?></th>
                <?php endforeach; ?>
                <th>Opsi</th>
            </tr>
            <?php foreach ($resultsMember as $member): ?>
                <tr>
                    <td><?php echo htmlspecialchars($member['nama']); ?></td>
                    <td><?php echo htmlspecialchars($member['kelas']); ?></td>
                    <td><?php echo htmlspecialchars($member['kelas_peminatan']); ?></td>
                    <?php foreach ($saturdays as $saturday): ?>
                        <td>
                            <?php
                            $kehadiranFound = false;
                            foreach ($resultsKehadiran as $kehadiran) {
                                if ($kehadiran['tanggal'] == $saturday && $kehadiran['id_member'] == $member['id']) {
                                    echo htmlspecialchars($kehadiran['kehadiran']);
                                    $kehadiranFound = true;
                                    break;
                                }
                            }
                            if (!$kehadiranFound) echo "&nbsp;";
                            ?>
                        </td>
                    <?php endforeach; ?>
                    <td>
                        <a href="edit.php?id=<?php echo htmlspecialchars($member['id']); ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
</body>
</html>
