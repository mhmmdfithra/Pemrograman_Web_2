<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAKTIKUM202</title>
</head>
<body>

<?php 
$nama=$nim=$jenisKelamin="";
$namaError=$nimError=$jenisKelaminError="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nama"])) {
        $namaError = "Isi Nama Terlebih Dahulu";
      } else {
        $nama = ($_POST["nama"]);
    }
    if (empty($_POST["nim"])) {
        $nimError = "NIM tidak boleh kosong";
      } else {
        $nim = ($_POST["nim"]);
    }
    if (empty($_POST["gender"])) {
        $jenisKelaminError = "jenis kelamin tidak boleh kosong";
      } else {
        $jenisKelamin = ($_POST["gender"]);
    }
}
function hasilOutput(){
    global $nama,$nim,$jenisKelamin;
    echo($nama."<br>");
    echo($nim."<br>");
    echo($jenisKelamin."<br>");

}
?>

<style>
    .error{
            color: red;
        }
</style>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <span>Nama :</span><input name="nama" type="text">
        <span class="error">*<?php echo($namaError)?></span><br>
        <span>Nim :</span><input name="nim" type="text">
        <span class="error">*<?php echo($nimError)?></span><br>
        <span>Jenis Kelamin :</span><span class="error">*<?php echo($jenisKelaminError)?></span><br>
        <input type="radio" name="gender" id="jenisKelamin" value="Laki - laki"<span>Laki - laki</span><br>
        <input type="radio" name="gender" id="jenisKelamin" value="Perempuan"><span>Perempuan</span><br>
        <input type="submit" name="Submit" id="">
    </form>

    <?php
    echo hasilOutput();
    ?>
    
</body>s
</html>