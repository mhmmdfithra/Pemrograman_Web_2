<!-- view_item.php -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_item = $_POST['item_name'];
    $harga_item = $_POST['item_prices'];
    $gambar_item = $_FILES['item_image'];

    // Direktori upload
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $uploaded_files = [];
    for ($i = 0; $i < count($nama_item); $i++) {
        if ($gambar_item['error'][$i] == 0) {
            $target_file = $target_dir . basename($gambar_item["name"][$i]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Validasi tipe file
            if (in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
                if (move_uploaded_file($gambar_item["tmp_name"][$i], $target_file)) {
                    $uploaded_files[] = $target_file;
                }
            } else {
                die("Error: Hanya file gambar (jpg, jpeg, png, gif) yang diperbolehkan. File tidak valid: " . $gambar_item["name"][$i] . ".");
            }
        }
    }
} else {
    header("Location: create_item.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Items</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-image: url(img/background.jpg);
            /* background: linear-gradient(to bottom, #BC7FCD, #F0F0F0); */
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        h1 {
            text-align: center;
            color: #444;
            background-color: #FFE6E6;
            border: 5px solid #f0f0f0; /* Adjust border width and color as needed */
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .card {
            background-color: #fff;
            width: 300px;
            height: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            position: relative;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8);
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card img {
            max-width: 100%;
            max-height: 100%;
            border-bottom: 1px solid #ddd;
        }
        .card .nama {
            /* background-color: #FFE6E6; */
            color: black;
            font-weight: bold;
            padding: 10px;
            text-align: center;
            width: 100%;
            box-sizing: border-box;
            background-color: rgba(187, 58, 255, 0.36);
        }
        .card .price {
            /* background-color: #FFEAE3; */
            color: #0F0F0F;
            border-top: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            width: 100%;
            box-sizing: border-box;
            position: absolute;
            bottom: 0;
            background-color: rgba(187, 58, 255, 0.36);
        }
    </style>
</head>
<body>
    <h1>Buah Buahan</h1>
    <div class="container">
        <?php for ($i = 0; $i < count($nama_item); $i++): ?>
            <div class="card">
                <div class="nama"><?= htmlspecialchars($nama_item[$i]) ?></div>
                <img src="<?= htmlspecialchars($uploaded_files[$i]) ?>" alt="<?= htmlspecialchars($nama_item[$i]) ?>">
                <div class="price">Rp <?= number_format(htmlspecialchars($harga_item[$i]), 0, ',', '.') ?></div>
            </div>
        <?php endfor; ?>
    </div>
</body>
</html>
