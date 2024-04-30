<?php
function hasilOutput(){
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["batas_bawah"]) && isset($_POST["batas_atas"])) {
        $batas_bawah = $_POST["batas_bawah"];
        $batas_atas = $_POST["batas_atas"];

        // Validasi batas_bawah lebih kecil dari batas_atas
        if ($batas_bawah >= $batas_atas) {
            echo "<p>Batas bawah harus lebih kecil dari batas atas.</p>";
        } else {
            echo "<p>Deret bilangan:</p>";
            $bilangan = $batas_bawah;
            do {
                // Jika bilangan ditambah 7 adalah kelipatan 5
                if (($bilangan + 7) % 5 == 0) {
                    echo "<img src='soal3.png' alt='gambar' width ='25px' >";
                } else {
                    echo "$bilangan ";
                }
                $bilangan++;
            } while ($bilangan <= $batas_atas);
        }
    }
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cek Bilangan Kelipatan 5</title>
</head>
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="batas_bawah">Batas Bawah Deret:</label>
        <input type="number" name="batas_bawah" id="batas_bawah" required>
        <br>
        <label for="batas_atas">Batas Atas Deret:</label>
        <input type="number" name="batas_atas" id="batas_atas" required>
        <br>
        <button type="submit" name="submit">Cek Bilangan</button>
    </form>

    <?php echo hasilOutput();?>
</body>
</html>
