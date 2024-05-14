<!DOCTYPE html>
<html>
<head>
    <title>Get Value from Option</title>
</head>
<body>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="options">Select an option:</label>
        <select name="options">
            <option value=1>January</option>
            <option value=2>February</option>
            <option value=3>March</option>
        </select>
        <button type="submit">Submit</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["options"]) && !empty($_POST["options"])) {
            $selectedOption = $_POST["options"];
            
            
        }
    }

    ?>
    <table>
        <tr>
            <th>Nama</th>
            <th>Kelas</th>
        </tr>
        <tr>
            <td>
            </td>
        </tr>
        
    </table>
</body>
</html>
