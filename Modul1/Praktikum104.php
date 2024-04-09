<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
table,th, td {
    border:1px solid black;}
</style>
    <table>
        <th>Daftar smartphone Samsung</th>
        <?php
    $smartphone = array("Samsung Galaxy S22", " Samsung Galaxy S22+", "Samsung Galaxy A02", "Samsung Galaxy Xcover");
    foreach ($smartphone as $smartphone) {
        echo"<tr></tr>";
        echo"<td>$smartphone</td>";
    }
    ?>
    </table>
</body>
</html>