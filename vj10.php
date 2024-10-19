<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prebrojavanje riječi</title>
</head>

<body>
    <h1>Prebrojavanje riječi</h1>
    <form action="" method="post">
        <label for="text">Unesite rečenicu:</label><br>
        <textarea id="text" name="text" rows="4" cols="50" required></textarea><br>
        <input type="submit" value="Prebroji riječi">
    </form>

    <?php
    if (isset($_POST['text'])) {
        $text = $_POST['text'];
        $wordCount = str_word_count($text);
        echo "<p>Broj riječi u rečenici je: <strong>$wordCount</strong></p>";
    }
    ?>
</body>

</html>