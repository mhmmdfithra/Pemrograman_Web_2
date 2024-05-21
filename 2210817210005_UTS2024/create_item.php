<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Item</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex; /* Center the form horizontally */
      justify-content: center;
      align-items: center;
      min-height: 100vh; /* Set minimum height for viewport */
      background-image:url(img/backgroun_create.jpg); /* Light gray background */
    }

    form {
      background-color: #FFE6E6; /* White background for the form */
      padding: 50px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
      max-width: 350px; /* Limit form width */
      margin-bottom: 10px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      

    }

    input[type="number"] {
      width: 100%;
      padding: 10px ;
      border: 1px solid #ccc;
      border-radius: 3px;
      margin-bottom: 20px;
      background-color: rgba(187, 58, 255, 0.36)
    }

    button[type="submit"] {
      background-color: #9b59b6; /* Purple button color */
      color: #fff; /* White button text */
      padding: 10px 105px;
      border: none;
      border-radius: 5px;
      cursor: pointer; /* Indicate clickable button */
      transition: background-color 0.2s ease-in-out; /* Smooth hover effect */
    }

    button[type="submit"]:hover {
      background-color: #80479e; /* Darken button on hover */
    }
    header {
            background: linear-gradient(90deg, rgba(0, 0, 0, 0.5) 0%, rgba(117, 35, 160, 0.67) 100%);
            color: white;
            padding: 20px;
            width: 100%;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            font-size: 1.8em;
            position: fixed;
            top: 0;
            left: 0;
            z-index:1000;
    }
    .logo{
      width: 200px;
      height: 200px; /* Adjust the width as needed */
      margin-bottom: 20px;
      justify-content: center;
      align-items: center;
      padding: 70px;
    }

  </style>
</head>
<body>
  <form action="add_item.php" method="POST">
    <h1>JUAL BUAH-BUAHAN</h1>
    <img src="img/logo.png" alt="Logo" class="logo">
    <label for="item_count">Jumlah Item:</label>
    <input type="number" id="item_count" name="item_count" min="1" max="6" required><br>
    <button type="submit">Tambah</button>
  </form>
</body>
</html>