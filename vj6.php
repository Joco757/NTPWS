<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
</head>

<body>
    <h1>Kalkulator</h1>
    <form action="" method="post">
        <label for="broj1">Unesite prvi broj:</label>
        <input type="number" id="broj1" name="broj1" step="any" required><br><br>

        <label for="broj2">Unesite drugi broj:</label>
        <input type="number" id="broj2" name="broj2" step="any" required><br><br>

        <input type="submit" name="operation" value="Zbrajanje (+)">
        <input type="submit" name="operation" value="Oduzimanje (-)">
        <input type="submit" name="operation" value="Množenje (*)">
        <input type="submit" name="operation" value="Dijeljenje (/)">
    </form>

    <?php
    if (isset($_POST['operation'])) {
        $broj1 = $_POST['broj1'];
        $broj2 = $_POST['broj2'];
        $operation = $_POST['operation'];
        $result = "";

        switch ($operation) {
            case "Zbrajanje (+)":
                $result = $broj1 + $broj2;
                break;
            case "Oduzimanje (-)":
                $result = $broj1 - $broj2;
                break;
            case "Množenje (*)":
                $result = $broj1 * $broj2;
                break;
            case "Dijeljenje (/)":
                if ($broj2 != 0) {
                    $result = $broj1 / $broj2;
                } else {
                    $result = "Dijeljenje s nulom nije dozvoljeno.";
                }
                break;
            default:
                $result = "Neispravna operacija.";
        }

        echo "<h2>Rezultat: " . $result . "</h2>";
    }
    ?>
</body>

</html>