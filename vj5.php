<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pogodi broj</title>
</head>

<body>
    <h1>Pogodi broj između 1 i 9</h1>
    <form action="" method="post">
        <label for="broj">Unesite broj (1-9):</label>
        <input type="number" id="broj" name="broj" min="1" max="9" required><br><br>
        <input type="submit" name="submit" value="Provjeri">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $zamisljeniBroj = rand(1, 9);
        $korisnikovBroj = $_POST['broj'];
        if ($korisnikovBroj == $zamisljeniBroj) {
            echo "<h2>Čestitamo! Pogodili ste zamišljeni broj: " . $zamisljeniBroj . ".</h2>";
        } else {
            echo "<h2>Nažalost, niste pogodili. Zamišljeni broj je bio: " . $zamisljeniBroj . ".</h2>";
        }
    }
    ?>
</body>

</html>