<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobili</title>
</head>

<body>
    <h1>Lista vozila</h1>
    <?php
    $cars = array("Audi", "BMW", "Renault", "Citroen");

    echo "<p>Lista vozila:</p><ul>";
    foreach ($cars as $car) {
        echo "<li>$car</li>";
    }
    echo "</ul>";

    if (isset($_POST['car'])) {
        $selectedCar = $_POST['car'];
        echo "<div>Odabrali ste vozilo: <strong>$selectedCar</strong></div>";
    }
    ?>

    <form action="" method="post">
        <p>Odaberite vozilo:</p>
        <?php
        foreach ($cars as $car) {
            echo "<label><input type='radio' name='car' value='$car'> $car</label><br>";
        }
        ?>
        <input type="submit" value="Prikaži">
    </form>
</body>

</html>