<?php
require "Koneksi.php";
require "Model.php";

if (!empty($_GET['id_peminjaman'])) {
  $id_peminjaman = $_GET['id_peminjaman'];
  deletedata("peminjaman", $id_peminjaman, "id_peminjaman");
  header('location:Peminjaman.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 1);
            max-width: 1000px;
            width: 100%;
            margin: 20px;
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
        .center {
            text-align: center;
        }
        .btn{
          display: inline-block;
            padding: 8px 16px;
            margin: 4px;
            font-size: 14px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #135D66;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .btn-danger {
            background-color: #f44336;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .btn-danger:hover {
            background-color: #d32f2f;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
    </style>
</head>
<body>
  <div class="container">
  <h2 style="text-align:center">Peminjaman</h2>
  
    <table>
        <thead>
            <tr>
                <th>ID Peminjaman</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Kembali</th>
                <th>ID Member</th> <!-- Tambah kolom ID Member -->
                <th>ID Buku</th> <!-- Tambah kolom ID Buku -->
                <th colspan="2" class="center">Aksi</th> <!-- Menggabungkan dua kolom aksi menjadi satu -->
            </tr>
        </thead>
        <tbody>
        <?php
        $result = selectalldata("peminjaman");
        while ($data = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $data['id_peminjaman'] ?></td>
                <td><?php echo $data['tgl_pinjam'] ?></td>
                <td><?php echo $data['tgl_kembali'] ?></td>
                <td><?php echo $data['id_member'] ?></td> <!-- Tambah baris untuk menampilkan ID Member -->
                <td><?php echo $data['id_buku'] ?></td> <!-- Tambah baris untuk menampilkan ID Buku -->
                <td class="action">
                <a href="FormPeminjaman.php?id_peminjaman=<?php echo $data['id_peminjaman']; ?>"><button class="btn">Edit</button></a>
                <a href="Peminjaman.php?id_peminjaman=<?php echo $data['id_peminjaman']; ?>" onclick="return confirm('Hapus data?')"><button class="btn btn-danger">Hapus</button></a>
                </td>  
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <br></br>
    <div style="text-align: center;">
      <a href="formpeminjaman.php"><button class="btn">Tambah Data Peminjaman</button></a>
      <a href="index.php"><button class="btn btn-secondary">Kembali</button></a>
    </div>
  </div>
   
</body>
</html>