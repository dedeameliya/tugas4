<!DOCTYPE html>
<html>
<head>
    <title>Program Menghitung Rata-rata</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
    $nama = $email = $nilai1 = $nilai2 = $nilai3 = $error = "";
    $hasil = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = test_input($_POST["nama"]);
        $email = test_input($_POST["email"]);
        $nilai1 = test_input($_POST["nilai1"]);
        $nilai2 = test_input($_POST["nilai2"]);
        $nilai3 = test_input($_POST["nilai3"]);

        if (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
            $error .= "Nama hanya boleh berisi huruf dan spasi!<br>";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= "Format email tidak valid!<br>";
        }

        if (!is_numeric($nilai1)) {
            $error .= "Nilai 1 harus berupa angka!<br>";
        }

        if (!is_numeric($nilai2)) {
            $error .= "Nilai 2 harus berupa angka!<br>";
        }

        if (!is_numeric($nilai3)) {
            $error .= "Nilai 3 harus berupa angka!<br>";
        }

        if ($error == "") {
            $hasil = ($nilai1 + $nilai2 + $nilai3) / 3;
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>Program Menghitung Rata-rata</h2>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>">
            <br><br>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="<?php echo $email; ?>">
            <br><br>
            <label for="nilai1">Nilai 1:</label>
            <input type="text" name="nilai1" id="nilai1" value="<?php echo $nilai1; ?>">
            <br><br>
            <label for="nilai2">Nilai 2:</label>
            <input type="text" name="nilai2" id="nilai2" value="<?php echo $nilai2; ?>">
            <br><br>
            <label for="nilai3">Nilai 3:</label>
            <input type="text" name="nilai3" id="nilai3" value="<?php echo $nilai3; ?>">
            <br><br>
            <input type="submit" name="submit" value="Hitung">
            <input type="button" value="Refresh" onClick="window.location.reload();">
        </form>
    </div>

    <?php
    if ($error !== "") {
        echo "<div class='error'>" . $error . "</div>";
    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<div class='result'>";
        echo "<h3>Hasil Rata-rata:</h3>";
        echo "<p>Nama: " . $nama . "</p>";
        echo "<p>Email: " . $email . "</p>";
        echo "<p>Nilai 1: " . $nilai1 . "</p>";
        echo "<p>Nilai 2: " . $nilai2 . "</p>";
        echo "<p>Nilai 3: " . $nilai3 . "</p>";
        echo "<p>Rata-rata: " . $hasil . "</p>";
        echo "</div>";
    }
    ?>

</body>
</html>
