<?php
$con = mysqli_connect("localhost", "root", "", "ntpws");

if (!$con) {
    die("Neuspjelo povezivanje na bazu: " . mysqli_connect_error());
}

$search_term = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_term = mysqli_real_escape_string($con, $_POST['search_term']);
    
    $query = "SELECT name, lastname FROM users WHERE name LIKE '%$search_term%' OR lastname LIKE '%$search_term%' ORDER BY lastname ASC LIMIT 10";
    $result = mysqli_query($con, $query);
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pretraživanje korisnika</title>
</head>
<body>
    <h1>Pretraži korisnike</h1>
    
    <form action="" method="post">
        <label for="search_term">Unesite ime ili prezime:</label>
        <input type="text" name="search_term" id="search_term" required>
        <button type="submit">Pretraži</button>
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Rezultati pretraživanja:</h2>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>" . htmlspecialchars($row['name']) . " " . htmlspecialchars($row['lastname']) . "</p>";
            }
        } else {
            echo "<p>Nema rezultata za pojam '$search_term'.</p>";
        }
    }
    
    mysqli_close($con);
    ?>
</body>
</html>
