<?php 
function listNama(){
 if(isset($_POST["urutKata"])) :
    $nama1 = $_POST["nama1"];
    $nama2 = $_POST["nama2"];
    $nama3 = $_POST["nama3"];
    
    if ($nama1 < $nama2 and $nama1 < $nama3) {
        if ($nama2 < $nama3) {
            echo "$nama1 <br>";
            echo "$nama2 <br>";
            echo "$nama3";
        } else {
            echo "$nama1 <br>";
            echo "$nama3 <br>";
            echo "$nama2";
        }
    } elseif ($nama2 < $nama1 and $nama2 < $nama3) {
        if ($nama1 < $nama3) {
            echo "$nama2 <br>";
            echo "$nama1 <br>";
            echo "$nama3";
        } else {
            echo "$nama2 <br>";
            echo "$nama3 <br>";
            echo "$nama1";
        }
    } else {
        if ($nama1 < $nama2) {
            echo "$nama3 <br>";
            echo "$nama1 <br>";
            echo "$nama2";
        } else {
            echo "$nama3 <br>";
            echo "$nama2 <br>";
            echo "$nama1";
        }
    }
endif;
}
?>

<html
<head>
    <title>PRAKTIKUM 201</title>
    <style>
        .inputNama{
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <form method="POST" action="">  
        <span>Nama : 1</span><input type="text" name="nama1" class="inputNama"><br>
        <span>Nama : 2</span><input type="text" name="nama2" class="inputNama"><br>
        <span>Nama : 3</span><input type="text" name="nama3"class="inputNama"><br>
        <input type="submit" name="urutKata" value="Urutkan" id="">
    </form>
    <br>
    <p><?php echo listNama();?></p>
</body>
</html>
