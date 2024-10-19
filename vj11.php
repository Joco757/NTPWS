<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prosti brojevi</title>
</head>

<body>
    <h1>Prosti brojevi manje od 100</h1>

    <?php
    function jeProst($broj)
    {
        if ($broj <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($broj); $i++) {
            if ($broj % $i == 0) {
                return false;
            }
        }
        return true;
    }

    echo "<ul>";
    for ($i = 2; $i < 100; $i++) {
        if (jeProst($i)) {
            echo "<li>$i</li>";
        }
    }
    echo "</ul>";
    ?>
</body>

</html>