<?php 
$nilai=0;
$hasil=0;
$Celsius1=$Fahreheit1=$Rheamur1=$Kelvin1=0;
$Celsius2=$Fahreheit2=$Rheamur2=$Kelvin2=0;

function tampilkanInput(){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST["nilai"])){
        $nilai = ($_POST["nilai"]);
        $nilaiAwal=($_POST["nilaiAwal"]);
        $nilaiPerubahan=($_POST["nilaiPerubahan"]);
    }
    switch ($nilaiAwal) {
        case "Celsius":
            switch ($nilaiPerubahan) {
                case "Fahrenheit2":
                    $hasil = (($nilai * 9/5) + 32);
                    echo"$hasil", " &degF";
                    break;
                case "Rheamur2":
                    $hasil = $nilai * 4/5;
                    echo $hasil, " &degR";
                    break;
                case "Kelvin2":
                    $hasil = $nilai + 273.15;
                    echo $hasil, " K";
                    break;
                default:
                    $hasil = $nilai;
                    break;
            }
            break;
        case "Fahrenheit":
            switch ($nilaiPerubahan) {
                case 'Celsius2':
                    $hasil = ($nilai * 5/9) - 32;
                    echo $hasil, " &degC";
                    break;
                case 'Rheamur2':
                    $hasil = ($nilai -32) * 4/9;
                    echo $hasil, " &degR";
                    break;
                
                case 'Kelvin2':
                    $hasil=5/9*($nilai-32)+273.15;
                    echo $hasil, " K";
                    break;
            }
            break;
        case "Rheamur":
            switch ($nilaiPerubahan) {
                case 'Celsius2':
                    $hasil=5/4*($nilai);
                    echo $hasil, " &degC";
                break;
                case 'Fahrenheit2':
                    $hasil=(9/4*$nilai)+32;
                    echo"$hasil", " &degF";
                break;
                case 'Kelvin2':
                    $hasil=(5/4*$nilai)+273.15;
                    echo $hasil, " K";
                break;
            }
            break;

        case "Kelvin":
            switch ($nilaiPerubahan) {
                case 'Celsius2':
                    $hasil=$nilai-273.15;
                    echo $hasil, " &degC";
                    break;
                case 'Fahrenheit2':
                    $hasil=9/5*($nilai-273.15)+32;
                    echo"$hasil", " &degF";
                    break;
                case 'Rheamur2':
                    $hasil=4/5*($nilai-273.15);
                    break;
            }
            break;
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRAKTIKUM203</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <span>Output yang diinginkan :</span> <br>
        <span>Nilai : </span><input type="number" name="nilai" class="inputNilai"><br>
        <span>Dari : <br>
        <input type="radio" name="nilaiAwal" value="Celsius">Celsius
        <br>    
        <input type="radio" name="nilaiAwal" value="Fahrenheit">Fahrenheit 
        <br>
        <input type="radio" name="nilaiAwal" value="Rheamur">Rheamur
        <br>
        <input type="radio" name="nilaiAwal" value="Kelvin">Kelvin
        <br>
        <span>Ke :</span>
        <br>
        <input type="radio" name="nilaiPerubahan" value="Celsius2">Celsius 
        <br>
        <input type="radio" name="nilaiPerubahan" value="Fahrenheit2">Fahrenheit
        <br>
        <input type="radio" name="nilaiPerubahan" value="Rheamur2">Rheamur 
        <br>
        <input type="radio" name="nilaiPerubahan" value="Kelvin2">Kelvin
        <br>
        <input type="submit" name="submit" value="Konversi" id="">
    </form>
    <br>
    <h2>Hasil Konversi : <?php tampilkanInput()?></h2>
</body>
</html>
