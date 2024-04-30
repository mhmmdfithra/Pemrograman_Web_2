<?php
function cetakString($string) {
    $result ='';
    $length = strlen($string);
    for ($i = 0; $i < $length; $i++) {
        $char = $string[$i];
        $result .= strtoupper($char).str_repeat(strtolower($char), $length - 1).'';
    }
    return trim($result);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cetak String</title>
</head>
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" id="string" name="string">
        <input type="submit" value="Submit" name="submit">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $input = $_POST['string'];
        echo "<h2>Input :</h2>";
        echo ($_POST['string']);
        echo "<h2>Output :</h2>";
        echo cetakString($input);
    }
    ?>
</body>
</html>
