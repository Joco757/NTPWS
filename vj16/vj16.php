<?php
$con = mysqli_connect("localhost", "root", "", "ntpws");

if (!$con) {
    die("Neuspjelo povezivanje na bazu: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $country = mysqli_real_escape_string($con, $_POST['country']);

    $query = "INSERT INTO users (firstname, lastname, email, username, password, country) 
              VALUES ('$firstname', '$lastname', '$email', '$username', '$password', '$country')";
    
    if (mysqli_query($con, $query)) {
        echo "<p>Registracija uspješna!<p>";
    } else {
        echo "<p>Greška: " . mysqli_error($con) . "</p>";
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Registracija korisnika</title>
</head>
<body>
    <h2>Registracija</h2>
    <form action="" method="post">
        <label for="firstname">Ime:</label>
        <input type="text" id="firstname" name="firstname" required><br><br>
        
        <label for="lastname">Prezime:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="username">Korisničko ime:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Lozinka:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="country">Država:</label>
        <select id="country" name="country" required>
            <option value="Croatia">Hrvatska</option>
            <option value="Serbia">Srbija</option>
            <option value="Bosnia and Herzegovina">Bosna i Hercegovina</option>
            <option value="Slovenia">Slovenija</option>
        </select><br><br>
        
        <button type="submit">Registriraj se</button>
    </form>
</body>
</html>
