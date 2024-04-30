<?php 
$bintang = NULL; 
// melakukan pengecekkan apakah tombol submit ditekan, jika iya maka akan menyimpan data input 
if (isset($_POST['bintang'])) { 
    $bintang = $_POST['bintang']; 
} 
if (isset($_POST['tambah'])) {
    $bintang++; 
} 
if (isset($_POST['kurang'])) { 
    $bintang--; 
} 
?> 
<!-- Jika variabel $bintang tidak kosong, maka akan menampilkan jumlah bintang yang diminta --> 
<?php if (!empty($bintang)) { 
 echo "Jumlah Bintang : $bintang "."<br>";
  
}
echo"<br>";
for ($i = 0; $i < $bintang; $i++) { 
 echo "<img src='soal3.png' width=40px>"; 
};


if ($bintang == 0): ?> 
 <form action="" method="POST"> 
     Jumlah Bintang <input type="number" name="bintang" required><br> 
     <button type="submit">Submit</button><br> 
 </form> 

<!--  Jika variabel $bintang sudah di-set, maka menampilkan form untuk menambah atau mengurangi jumlah bintang yang sudah di-set sebelumnya --> 
<?php endif; 
if ($bintang != 0): ?> 
 <form action="" method="POST"> 
    <br>
     <button name="tambah">Tambah</button> 
     <input type='hidden' name='bintang' value='<?= $bintang; ?>' /> 
     <button name="kurang">Kurang</button> 
 </form> 
<?php endif; ?> 

<!DOCTYPE html> 
<html lang="en"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initialscale=1.0"> 
    <title>PRAKTIKUM304</title> 
</head>