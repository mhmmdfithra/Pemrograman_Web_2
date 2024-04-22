<?php 
$nilai=0;
$hasil="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST["nilai"])){
        $nilai = ($_POST["nilai"]);
    }
    if ($nilai==0) {
        $hasil="Nol";
    }elseif ($nilai<10 && $nilai >0) {
        $hasil="Satuan";
    }elseif ($nilai>=10 && $nilai <20) {
        $hasil="Belasan";
    }elseif ($nilai>=20 && $nilai <100) {
        $hasil="Puluhan";
    }elseif ($nilai>=100 && $nilai <1000) {
        $hasil="Ratusan";
    }elseif ($nilai>=1000) {
        $hasil="Anda Menginput Melebihi Limit Bilangan";
    }
}

function hasilOutput(){
    global $hasil;
    echo($hasil);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK204</title>
    <style>
        .inputNilai{
            margin-left: 5px;
        }
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <span>Output yang diinginkan :</span> <br> <br>
        <span>Nilai : </span><input type="number" name="nilai" class="inputNilai"><br>
        <input type="submit" name="submit" value="Konversi" id="">
    </form>
    
    
    <br>
    <h2>Hasil  : <?php hasilOutput()?></h2>
</body>
</html>
