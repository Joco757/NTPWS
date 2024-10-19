<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izračun ocjene</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="number"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            background-color: #f9f9f9;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Izračun konačne ocjene</h1>
    <form action="" method="post">
        <label for="kolokvij1">Ocjena I. kolokvija (1-5):</label>
        <input type="number" id="kolokvij1" name="kolokvij1" min="1" max="5" required><br>

        <label for="kolokvij2">Ocjena II. kolokvija (1-5):</label>
        <input type="number" id="kolokvij2" name="kolokvij2" min="1" max="5" required><br>

        <input type="submit" name="submit" value="Izračunaj">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $kolokvij1 = $_POST['kolokvij1'];
        $kolokvij2 = $_POST['kolokvij2'];

        if (($kolokvij1 >= 1 && $kolokvij1 <= 5) && ($kolokvij2 >= 1 && $kolokvij2 <= 5)) {
            $prosjek = ($kolokvij1 + $kolokvij2) / 2;
            if ($kolokvij1 >= 2 && $kolokvij2 >= 2) {
                echo "<div class='result success'>
                        <h2>Prosječna ocjena: " . round($prosjek, 2) . "</h2>
                        <h2>Konačna ocjena: " . round($prosjek, 0) . "</h2>
                    </div>";
            } else {
                echo "<div class='result error'>
                        <h2>Jedan od kolokvija je negativan. Krajnja ocjena je 1 (negativna).</h2>
                    </div>";
            }
        } else {
            echo "<div class='result error'>
                    <h2>Ocjene moraju biti između 1 i 5!</h2>
                </div>";
        }
    }
    ?>
</body>

</html>