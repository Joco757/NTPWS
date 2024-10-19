<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status dućana</title>
</head>

<body>
    <h1>Status dućana</h1>
    <?php
    function ducan($stanje = "otvoren")
    {
        echo "Dućan je $stanje.";
    }

    $datetime = new DateTime();
    $currentHour = (int)$datetime->format('H');
    $currentDay = $datetime->format('l');

    $praznici = [
        '01-01',
        '06-01',
        '31-03',
        '01-04',
        '17-04',
        '01-05',
        '30-05',
        '22-06',
        '05-08',
        '15-08',
        '01-11',
        '18-11',
        '25-12',
        '26-12',
    ];

    $currentDate = $datetime->format('m-d');

    if (in_array($currentDate, $praznici)) {
        ducan("zatvoren");
    } else {
        if ($currentDay === 'Saturday') {
            if ($currentHour >= 9 && $currentHour < 14) {
                ducan("otvoren");
            } else {
                ducan("zatvoren");
            }
        } elseif ($currentDay === 'Sunday') {
            ducan("zatvoren");
        } else {
            if ($currentHour >= 8 && $currentHour < 20) {
                ducan("otvoren");
            } else {
                ducan("zatvoren");
            }
        }
    }
    ?>
</body>

</html>