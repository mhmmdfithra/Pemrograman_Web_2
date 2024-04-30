<?php 
$nilai=0;
$link="";
$j=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST["nilai"])){
        $nilai = ($_POST["nilai"]);
    }
    if(!empty($_POST["link"])){
        $link = ($_POST["link"]);
    }
    
}
function hasilOutput(){
    global $i,$j,$nilai,$link;
    $i = $nilai;
    while ($i > 0) {
        $j = $nilai;
        while ($j > $i) {
            echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp");
            $j--;
        }
        $k = 0;
        while ($k < $i) {
            echo("<img src='$link'>");
            $k++;
        }
        echo("<br>");
        $i--;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK302</title>
    <style>
        img{
            width: 25px;
        }
        
    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <span>Tinggi : </span><input type="number" name="nilai" class="inputNilai"><br>
        <span>Alamat Gambar : </span><input type="text" name="link" class="link"><br>
        <input type="submit" name="submit" value="Cetak" id="">
    </form>
    
    <br>
    <?php hasilOutput()?>  
</body>
</html>