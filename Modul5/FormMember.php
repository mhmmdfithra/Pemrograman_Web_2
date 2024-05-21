<?php
require "Koneksi.php";
require "Model.php";
if (isset($_POST['submit'])) {
	$data = array(
		"id_member" => "'" . $_POST['id_member'] . "'",
		"nama_member" => "'" . $_POST['nama_member'] . "'",
		"nomor_member" => "'" . $_POST['nomor_member'] . "'",
		"alamat" => "'" . $_POST['alamat'] . "'",
		"tgl_mendaftar" => "'" . $_POST['tgl_mendaftar'] . "'",
		"tgl_terakhir_bayar" => "'" . $_POST['tgl_terakhir_bayar'] . "'"
	);
	insert($data, 'member');
	header('location:Member.php');
}

$id = isset($_GET['id_member']) ? $_GET['id_member'] : '';
$data = selectdatabyid("member", $id, "id_member");
if (isset($_POST['edit'])) {
	$data = array(
		"id_member" => "'" . $_POST['id_member'] . "'",
		"nama_member" => "'" . $_POST['nama_member'] . "'",
		"nomor_member" => "'" . $_POST['nomor_member'] . "'",
		"alamat" => "'" . $_POST['alamat'] . "'",
		"tgl_mendaftar" => "'" . $_POST['tgl_mendaftar'] . "'",
		"tgl_terakhir_bayar" => "'" . $_POST['tgl_terakhir_bayar'] . "'"
	);
	update($data, 'member', $id, "id_member");
	header("location:Member.php");
}

if (isset($_POST['kembali'])) {
	header("location:Member.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Form Member</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="datetime-local"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #A0DEFF;
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

        button:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if (isset($_GET['id_member'])) : ?>
            <h1>Edit Member</h1>
            <form method="POST">
                <div>
                    <label>ID</label>
                    <input type="text" name="id_member" value="<?php echo $data['id_member']; ?>" placeholder="Masukkan ID Member" required>
                </div>
                <div>
                    <label>Nama</label>
                    <input type="text" name="nama_member" value="<?php echo $data['nama_member']; ?>" placeholder="Masukkan Nama Member" required>
                </div>
                <div>
                    <label>Nomor</label>
                    <input type="text" name="nomor_member" value="<?php echo $data['nomor_member']; ?>" placeholder="Masukkan Nomor Member" required>
                </div>
                <div>
                    <label>Alamat</label>
                    <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" placeholder="Masukkan Alamat" required>
                </div>
                <div>
                    <label>Tanggal Mendaftar</label>
                    <input type="datetime-local" step="1" name="tgl_mendaftar" value="<?php echo date('Y-m-d\TH:i:s', strtotime($data['tgl_mendaftar'])); ?>" required>
                </div>
                <div>
                    <label>Tanggal Terakhir Bayar</label>
                    <input type="date" name="tgl_terakhir_bayar" value="<?php echo $data['tgl_terakhir_bayar']; ?>" required>
                </div>
                <button type="submit" name="edit">Simpan Perubahan</button>
                <button type="submit" class="btn-secondary" value="ignore" formnovalidate name="kembali">Kembali</button>
            </form>
        <?php else : ?>
            <h1>Tambah Member</h1>
            <form method="POST">
                <div>
                    <label>ID</label>
                    <input type="text" name="id_member" placeholder="Masukkan ID Member" required>
                </div>
                <div>
                    <label>Nama</label>
                    <input type="text" name="nama_member" placeholder="Masukkan Nama Member" required>
                </div>
                <div>
                    <label>Nomor</label>
                    <input type="text" name="nomor_member" placeholder="Masukkan Nomor Member" required>
                </div>
                <div>
                    <label>Alamat</label>
                    <input type="text" name="alamat" placeholder="Masukkan Alamat" required>
                </div>
                <div>
                    <label>Tanggal Mendaftar</label>
                    <input type="datetime-local" step="1" name="tgl_mendaftar" required>
                </div>
                <div>
                    <label>Tanggal Terakhir Bayar</label>
                    <input type="date" name="tgl_terakhir_bayar" required>
                </div>
                <button type="submit" class="submit" name="submit">Tambah Data</button>
                <button  class="btn-secondary" value="ignore" formnovalidate name="kembali">Kembali</button>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>
