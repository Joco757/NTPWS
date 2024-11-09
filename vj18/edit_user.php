<?php
$con = mysqli_connect("localhost", "root", "", "ntpws");

if (!$con) {
    die("Neuspjelo povezivanje na bazu: " . mysqli_connect_error());
}

$user_id = (int)$_GET['id'];

$userQuery = "SELECT * FROM users WHERE id = $user_id";
$userResult = mysqli_query($con, $userQuery);

if (mysqli_num_rows($userResult) == 0) {
    die("Korisnik ne postoji.");
}

$userData = mysqli_fetch_assoc($userResult);

$countryQuery = "SELECT id, country_name FROM country";
$countryResult = mysqli_query($con, $countryQuery);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $country_id = (int)$_POST['country_id'];

    $updateQuery = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', country_id = $country_id 
                    WHERE id = $user_id";

    if (mysqli_query($con, $updateQuery)) {
        echo "<p>Podaci korisnika uspješno ažurirani!<p>";
        echo "<a href='user_list.php'>Povratak na popis korisnika</a>";
        exit;
    } else {
        echo "<p>Greška pri ažuriranju: " . mysqli_error($con) . "</p>";
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Uredi korisnika</title>
</head>
<body>
    <h2>Uredi korisnika</h2>
    <form action="" method="post">
        <label for="firstname">Ime:</label>
        <input type="text" id="firstname" name="firstname" value="<?= htmlspecialchars($userData['firstname']) ?>" required><br><br>
        
        <label for="lastname">Prezime:</label>
        <input type="text" id="lastname" name="lastname" value="<?= htmlspecialchars($userData['lastname']) ?>" required><br><br>
        
        <label for="country_id">Država:</label>
        <select id="country_id" name="country_id" required>
            <?php while ($row = mysqli_fetch_assoc($countryResult)): ?>
                <option value="<?= $row['id'] ?>" <?= $row['id'] == $userData['country_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($row['country_name']) ?>
                </option>
            <?php endwhile; ?>
        </select><br><br>
        
        <button type="submit">Spremi promjene</button>
    </form>
    <br>
    <a href="user_list.php">Povratak na popis korisnika</a>
</body>
</html>
