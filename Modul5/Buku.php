<?php
require "Koneksi.php";
require "Model.php";

if (!empty($_GET['id_buku'])) {
  $id_buku = $_GET['id_buku'];
  deletedata("buku", $id_buku, "id_buku");
  header('location:buku.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Buku Perpus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url(img/background.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .container {
            background-color: #CAF4FF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0,1);
        }
        h1 {
            text-align: center;
            margin-top: 0px;
            margin-bottom: 20px;
            color: #333;
        }
        table {
          border-collapse: collapse;
          width: 100%;
          margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: center;
            background-color: #BED7DC;
            border-bottom: 1px solid #ddd;
        }
        th {
          background-color: #B3C8CF;
          color: black;
        }
        tr:nth-child(even) {
            background-color: #B3C8CF;
        }
        .btn {
            display: inline-block;
            padding: 8px 12px;
            margin: 2px;
            font-size: 14px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #135D66;
            border: none;
            border-radius: 4px;
        }
        .btn-danger {
            background-color: #f44336;
        }
        .btn-secondary {
            background-color: #555;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .btn-danger:hover {
            background-color: #d32f2f;
        }
        .btn-secondary:hover {
            background-color: #444;
        }
        .actions {
            text-align: center;
            justify-content: center;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Buku</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Buku</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = selectalldata("buku");
                while ($data = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $data['id_buku'] ?></td>
                        <td><?php echo $data['judul_buku'] ?></td>
                        <td><?php echo $data['penulis'] ?></td>
                        <td><?php echo $data['penerbit'] ?></td>
                        <td><?php echo $data['tahun_terbit'] ?></td>
                        <td class="actions">
                            <a href="FormBuku.php?id_buku=<?php echo $data['id_buku']; ?>" class="btn">Edit</a>
                            <a href="Buku.php?id_buku=<?php echo $data['id_buku']; ?>" onclick="return confirm('Hapus data?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <div style="text-align: center;">
            <a href="formbuku.php" class="btn">Tambah Buku</a>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</body>
</html>
