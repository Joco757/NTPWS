<?php
$baseTitle = "Da Vincijev kod";
$baseLink = "https://hr.wikipedia.org/";

$title = $baseTitle;
$link = $baseLink . "Da_Vincijev_kod";
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Opis kriminalističkog trilera <?php echo $title; ?>">
    <meta name="keywords" content="Da Vincijev kod, Dan Brown, američki pisac, knjiga">
    <title><?php echo $title; ?></title>
</head>

<body>
    <h1><?php echo $title; ?></h1>
    <p><?php echo $title; ?> je kriminalistički triler američkog pisca Dana Browna.</p>
    <p>Više informacija možete pronaći na <a href="<?php echo $link; ?>" target="_blank">Wikipediji</a>.</p>
</body>

</html>