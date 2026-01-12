<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
$ch = curl_init(API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// file_get_contents
// $result = file_get_contents(API_URL)
$result = curl_exec($ch);
$data = json_decode($result, true);
$ch = null;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<main>
    <h2>Próximas peliculas del MCU</h2>
    <!-- <pre style="font-size: 8px; overflow: scroll; height: 250px;">
        <?php //var_dump($data) ?>
    </pre> -->
    <section>
        <img src="<?= $data["poster_url"]; ?>" width='200'  alt='<?= $data["title"] ?>'>
    </section>
    <hgroup>
        <h2><?= $data['title']; ?>se estrena en <?= $data['days_until']; ?> días</h2>
        <p>Fecha de estreno: <?= $data['release_date'] ?></p>
        <p>Tipo: <?= $data['type'] ?></p>
        <p>La siguiente es <?= $data['following_production']['title']; ?></p>
    </hgroup>

</main>


<style>
    *{
        box-sizing: border-box;
    }

    h1{
        font-size: 12px;
    }

    img{
        border-radius: 5px;
        box-shadow: 0 10px 10px 0px rgb(71, 71, 71);
    }

    section{
        display: flex;
        justify-content: center;
    }

    hgroup{
        justify-content: center;
        text-align: center;
    }
</style>