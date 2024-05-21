<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jumlah_item = intval($_POST['item_count']);
    if ($jumlah_item < 1 || $jumlah_item > 6) {
        die("Jumlah item harus antara 1 dan 6.");
    }
} else {
    header("Location: create_item.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Item</title>
  <style>
    /* Body styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex; /* Center the form horizontally */
      justify-content: center;
      align-items: center;
      min-height: 100vh; /* Set minimum height for viewport */
      background-image: url(img/background.jpg);
    }

    /* Form styles */
    form {
      background-color: #FFE6E6; /* White background for the form */
      padding: 40px 100px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
      max-width: 350px; /* Limit form width */
    }


    /* Label styles */
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #333; /* Label text color */
    }

    /* Input styles */
    input[type="text"],
    input[type="number"],
    input[type="file"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      margin-bottom: 15px;
      background-color: rgba(187, 58, 255, 0.36)
    }

    /* Button styles */
    button[type="submit"] {
      background-color: #9b59b6; /* Purple button color */
      color: #fff; /* White button text */
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer; /* Indicate clickable button */
      transition: background-color 0.2s ease-in-out; /* Smooth hover effect */
    }

    button[type="submit"]:hover {
      background-color: #80479e; /* Darken button on hover */
    }
  </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
</head>
<body>
    <form action="view_item.php" method="POST" enctype="multipart/form-data">
        <?php for ($i = 0; $i < $jumlah_item; $i++): ?>
            <div>
                <label for="item_name<?= $i ?>">Nama Buah :</label><br>
                <input type="text" id="item_name<?= $i ?>" name="item_name[]" required><br>
                
                <label for="item_price<?= $i ?>">Harga Buah :</label><br>
                <input type="number" id="item_prices<?= $i ?>" name="item_prices[]" required><br>
                
                <label for="item_image<?= $i ?>">Gambar Buah :</label><br>
                <input type="file" id="item_image<?= $i ?>" name="item_image[]" accept="image/*" required><br>
            </div>
            <br>
        <?php endfor; ?>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
