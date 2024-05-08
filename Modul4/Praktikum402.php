<?php  
$mahasiswa = 
[["nama" => "Andi", "nim" => "2101001", "uts" => 87, "uas" => 65],
 ["nama" => "Budi", "nim" => "2101002", "uts" => 76, "uas" => 79], 
 ["nama" => "Tono", "nim" => "2101003", "uts" => 50, "uas" => 41], 
 ["nama" => "Jessica", "nim" => "2101004", "uts" => 60, "uas" => 75],]; 
for ($i = 0; $i < count($mahasiswa); $i++) { 
    $mahasiswa[$i]["akhir"] = $mahasiswa[$i]["uts"] * 0.4 + $mahasiswa[$i]["uas"] * 0.6; 
    switch (true) { 
        case ($mahasiswa[$i]["akhir"] >= 80): 
            $mahasiswa[$i]["huruf"] = "A"; 
            break; 
        case ($mahasiswa[$i]["akhir"] > 70): 
            $mahasiswa[$i]["huruf"] = "B"; 
            break; 
        case ($mahasiswa[$i]["akhir"] > 60): 
            $mahasiswa[$i]["huruf"] = "C"; 
            break; 
        case ($mahasiswa[$i]["akhir"] > 50): 
            $mahasiswa[$i]["huruf"] = "D"; 
            break; 
        default: 
            $mahasiswa[$i]["huruf"] = "E"; 
    } 
} ?> 

<!DOCTYPE html> 
<html lang="en"> 
 
<head> 
    <style> 
        table,  tr,  td, 
        th { 
            border: solid 1px black; 
            border-collapse: collapse; 
            padding: 10px; 
            padding-right: 20px; 
        } 
    </style> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <title>Praktikum402</title> 
</head> 
 
<body> 
    <table> 
        <tr style="background-color: #D3D3D3;">
        <!-- menampilkan table header --> 
            <th>Nama</th> 
            <th>NIM</th> 
            <th>Nilai UTS</th> 
            <th>Nilai UAS</th> 
            <th>Nilai Akhir</th> 
            <th>Huruf</th> 
        </tr> 

        <?php for ($i = 0; $i < count($mahasiswa); $i++) { 
            echo "<tr>"; 
            echo "<td>" . $mahasiswa[$i]["nama"] . "</td>"; 
            echo "<td>" . $mahasiswa[$i]["nim"] . "</td>"; 
            echo "<td>" . $mahasiswa[$i]["uts"] . "</td>"; 
            echo "<td>" . $mahasiswa[$i]["uas"] . "</td>"; 
            echo "<td>" . $mahasiswa[$i]["akhir"] . "</td>"; 
            echo "<td>" . $mahasiswa[$i]["huruf"] . "</td>"; 
            echo "</tr>"; 
        } ?> 
    </table> 
</body> 
</html>