<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izračun varijable C</title>
</head>

<body>
    <h1>Izračunajte varijablu c</h1>

    <form action="" method="post">
        <label for="a">Unesite vrijednost a:</label>
        <input type="number" id="a" name="a" required><br><br>
        <label for="b">Unesite vrijednost b:</label>
        <input type="number" id="b" name="b" required><br><br>
        <input type="submit" name="submit" value="Pošalji">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = (3 * $a - $b) / 2;
        echo "<h2>Rezultat:</h2>";
        echo "<p>Vrijednost varijable c je: " . $c . "</p>";
    }
    ?>
</body>

</html>