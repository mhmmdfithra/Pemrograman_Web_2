<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url(img/backgroundform.jpg);
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
            text-align: center;
            margin: 20px;
        }
        h1 {
            color: #135D66;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            
        }
        td {
            border: solid 1px #ddd;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .link-button img {
            width: 100px;
            height: auto;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .link-button img:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Perpustakaan TI</h1>
        <table align="center">
            <tr>
                <td><a href="Member.php" class="link-button"><img src="img/anggota.png" alt="Member"></a></td>
                <td><a href="Buku.php" class="link-button"><img src="img/buku.png" alt="Buku"></a></td>
                <td><a href="Peminjaman.php" class="link-button"><img src="img/peminjaman.png" alt="Peminjaman"></a></td>
            </tr>
        </table>
    </div>
</body>
</html>
