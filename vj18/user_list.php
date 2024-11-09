<?php
$con = mysqli_connect("localhost", "root", "", "ntpws");

if (!$con) {
    die("Neuspjelo povezivanje na bazu: " . mysqli_connect_error());
}

$query = "SELECT users.id, users.firstname, users.lastname, users.email, users.username, country.country_name 
          FROM users 
          LEFT JOIN country ON users.country_id = country.id";
$result = mysqli_query($con, $query);

echo "<h2>Popis korisnika i država</h2>";
echo "<table border='1'>
        <tr>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Email</th>
            <th>Korisničko ime</th>
            <th>Država</th>
            <th>Uredi</th>
        </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>" . htmlspecialchars($row['firstname']) . "</td>
            <td>" . htmlspecialchars($row['lastname']) . "</td>
            <td>" . htmlspecialchars($row['email']) . "</td>
            <td>" . htmlspecialchars($row['username']) . "</td>
            <td>" . htmlspecialchars($row['country_name']) . "</td>
            <td><a href='edit_user.php?id=" . $row['id'] . "'>Uredi</a></td>
          </tr>";
}
echo "</table>";

mysqli_close($con);
?>
