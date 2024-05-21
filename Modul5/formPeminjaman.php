<?php
require "koneksi.php";
require "model.php";

if (isset($_POST['submit'])) {
	$data = array(
		"id_peminjaman" => "'" . $_POST['id_peminjaman'] . "'",
		"tgl_pinjam" => "'" . $_POST['tgl_pinjam'] . "'",
		"tgl_kembali" => "'" . $_POST['tgl_kembali'] . "'",
		"id_member" => "'" . $_POST['id_member'] . "'",
		"id_buku" => "'" . $_POST['id_buku'] . "'"
	);
	insert($data, 'Peminjaman');
	header('location:Peminjaman.php');
}

$id = isset($_GET['id_peminjaman']) ? $_GET['id_peminjaman'] : '';
$data = selectdatabyid("peminjaman", $id, "id_peminjaman");
if (isset($_POST['edit'])) {
	$data = array(
		"id_peminjaman" => "'" . $_POST['id_peminjaman'] . "'",
		"tgl_pinjam" => "'" . $_POST['tgl_pinjam'] . "'",
		"tgl_kembali" => "'" . $_POST['tgl_kembali'] . "'",
		"id_member" => "'" . $_POST['id_member'] . "'",
		"id_buku" => "'" . $_POST['id_buku'] . "'"
	);
	update($data, 'peminjaman', $id, "id_peminjaman");
	header("location:Peminjaman.php");
}

if (isset($_POST['kembali'])) {
	header("location:Peminjaman.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Form Peminjaman</title>
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
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        select {
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
            background-color: #135D66;
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
        <?php if (isset($_GET['id_peminjaman']) || isset($_GET['judul_buku'])) : ?>
            <h1>Edit Peminjaman</h1>
            <form method="POST">
                <div>
                    <label>ID Peminjaman</label>
                    <input type="text" name="id_peminjaman" value="<?php echo $data['id_peminjaman']; ?>" required>
                </div>
                <div>
                    <label>Tanggal Peminjaman</label>
                    <input type="date" name="tgl_pinjam" value="<?php echo $data['tgl_pinjam']; ?>" required>
                </div>
                <div>
                    <label>Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" value="<?php echo $data['tgl_kembali']; ?>" required>
                </div>
                <div>
                    <label>Pilih ID Member</label>
                    <select name="id_member" required>
                        <?php
                        $result = selectalldata("member");
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<option value="' . $row['id_member'] . '">' . $row['id_member'] . ' - ' . $row['nama_member'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label>Pilih ID Buku</label>
                    <select name="id_buku" required>
                        <?php
                        $result = selectalldata("buku");
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<option value="' . $row['id_buku'] . '">' . $row['id_buku'] . ' - ' . $row['judul_buku'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="edit">Simpan Perubahan</button>
                <button type="submit" class="btn-secondary" value="ignore" formnovalidate name="kembali">Kembali</button>
            </form>
        <?php else : ?>
            <h1>Tambah Peminjaman</h1>
            <form method="POST">
                <div>
                    <label>ID Peminjaman</label>
                    <input type="text" name="id_peminjaman" required>
                </div>
                <div>
                    <label>Tanggal Peminjaman</label>
                    <input type="date" name="tgl_pinjam" required>
                </div>
                <div>
                    <label>Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" required>
                </div>
                <div>
                    <label>Pilih ID Member</label>
                    <select name="id_member" required>
                        <option value="" disabled selected>-- Pilih Member --</option>
                        <?php
                        $result = selectalldata("member");
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<option value="' . $row['id_member'] . '">' . $row['id_member'] . ' - ' . $row['nama_member'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label>Pilih ID Buku</label>
                    <select name="id_buku" required>
                        <option value="" disabled selected>-- Pilih Buku --</option>
                        <?php
                        $result = selectalldata("buku");
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<option value="' . $row['id_buku'] . '">' . $row['id_buku'] . ' - ' . $row['judul_buku'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="submit">Tambah Data</button>
                <button  class="btn-secondary" value="ignore" formnovalidate name="kembali">Kembali</button>
            </form>
        <?php endif; ?>
    </div>
</body>
