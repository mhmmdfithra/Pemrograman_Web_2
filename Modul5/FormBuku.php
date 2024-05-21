<?php
require "Koneksi.php";
require "Model.php";
if (isset($_POST['submit'])) {
	$data = array(
		"id_buku" => "'" . $_POST['id_buku'] . "'",
		"judul_buku" => "'" . $_POST['judul_buku'] . "'",
		"penulis" => "'" . $_POST['penulis'] . "'",
		"penerbit" => "'" . $_POST['penerbit'] . "'",
		"tahun_terbit" => "'" . $_POST['tahun_terbit'] . "'"
	);
	insert($data, 'buku');
	header('location:Buku.php');
}

$id = isset($_GET['id_buku']) ? $_GET['id_buku'] : '';
$data = selectdatabyid("buku", $id, "id_buku");
if (isset($_POST['edit'])) {
	$data = array(
		"id_buku" => "'" . $_POST['id_buku'] . "'",
		"judul_buku" => "'" . $_POST['judul_buku'] . "'",
		"penulis" => "'" . $_POST['penulis'] . "'",
		"penerbit" => "'" . $_POST['penerbit'] . "'",
		"tahun_terbit" => "'" . $_POST['tahun_terbit'] . "'"
	);
	update($data, 'buku', $id, "id_buku");
	header("location:Buku.php");
}

if (isset($_POST['kembali'])) {
	header("location:Buku.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Form Buku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            background-image: url(img/backgroundform.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #CAF4FF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #A0DEFF;
        }

        button[type="submit"] {
            width: calc(100% - 20px);
            background-color: #135D66;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        button {
            width: calc(100% - 20px);
            background-color: #6c757d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if (isset($_GET['id_buku'])) : ?>
            <h1>Edit Buku</h1>
            <form method="POST">
                <div>
                    <label>ID</label>
                    <input type="text" name="id_buku" value="<?php echo $data['id_buku']; ?>" placeholder="Masukkan ID Buku" required>
                </div>
                <div>
                    <label>Judul</label>
                    <input type="text" name="judul_buku" value="<?php echo $data['judul_buku']; ?>" placeholder="Masukkan Judul Buku" required>
                </div>
                <div>
                    <label>Penulis</label>
                    <input type="text" name="penulis" value="<?php echo $data['penulis']; ?>" placeholder="Masukkan Penulis" required>
                </div>
                <div>
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" value="<?php echo $data['penerbit']; ?>" placeholder="Masukkan Penerbit" required>
                </div>
                <div>
                    <label>Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" value="<?php echo $data['tahun_terbit']; ?>" placeholder="Masukkan Tahun Terbit" required>
                </div>
                <button type="submit" name="edit">Simpan Perubahan</button>
                <button onclick="window.location.href='Buku.php';">Kembali</button>
            </form>
        <?php else : ?>
            <h1>Tambah Buku</h1>
            <form method="POST">
                <div>
                    <label>ID</label>
                    <input type="text" name="id_buku" placeholder="Masukkan ID Buku" required>
                </div>
                <div>
                    <label>Judul</label>
                    <input type="text" name="judul_buku" placeholder="Masukkan Judul Buku" required>
                </div>
                <div>
                    <label>Penulis</label>
                    <input type="text" name="penulis" placeholder="Masukkan Penulis" required>
                </div>
                <div>
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" placeholder="Masukkan Penerbit" required>
                </div>
                <div>
                    <label>Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" placeholder="Masukkan Tahun Terbit" required>
                </div>
                <button type="submit" name="submit">Tambah Data</button>
                <button onclick="window.location.href='Buku.php';">Kembali</button>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>