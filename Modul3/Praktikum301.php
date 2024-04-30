<?php
function outputHasil(){
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["jumlah"])) {
        $jumlah = $_POST["jumlah"];
        $i= 0;
        while ($i<$jumlah) {
            $urutan= $i + 1;
            $kelas = $i % 2 == 0 ? "merah" : "hijau";
            echo "<h2 class='$kelas'>Peserta ke-$urutan</h2>";
            $i++;
        }
    }
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum301</title>
    <style>
        .merah{
            color: red;
        }
        .hijau{
            color: green;
        }
    </style>
</head>
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <span>Jumlah Peserta : </span><input type="number" name="jumlah" id="jumlah"><br>
        <button type="submit" name="submit">Cetak</button>
    </form>
    
    <?php echo outputHasil()?>
    
</body>
</html>