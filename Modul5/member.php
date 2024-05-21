<?php
require "Koneksi.php";
require "Model.php";

if (!empty($_GET['id_member'])) {
  $id_member = $_GET['id_member'];
  deletedata("member", $id_member, "id_member");
  header('location:Member.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Member Perpus</title>
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
        h1 {
            text-align: center;
            margin-top: 0;
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
        <h1>Member</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Member</th>
                    <th>Nama</th>
                    <th>Nomor</th>
                    <th>Alamat</th>
                    <th>Tanggal Daftar</th>
                    <th>Tanggal Terakhir Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = selectalldata("member");
                while ($data = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $data['id_member'] ?></td>
                        <td><?php echo $data['nama_member'] ?></td>
                        <td><?php echo $data['nomor_member'] ?></td>
                        <td><?php echo $data['alamat'] ?></td>
                        <td><?php echo $data['tgl_mendaftar'] ?></td>
                        <td><?php echo $data['tgl_terakhir_bayar'] ?></td>
                        <td class="actions">
                            <a href="FormMember.php?id_member=<?php echo $data['id_member']; ?>" class="btn">Edit</a>
                            <a href="Member.php?id_member=<?php echo $data['id_member']; ?>" onclick="return confirm('Hapus data?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div style="text-align: center;">
            <a href="formmember.php" class="btn">Tambah Member</a>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</body>
</html>