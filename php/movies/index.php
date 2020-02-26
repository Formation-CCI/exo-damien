<?php

    $films = json_decode(file_get_contents('film.json'), true);

    function formatDuration($duration)
    {
        $hours = intval($duration/60);
        $minutes = $duration%60;
        if($hours > 0)
        {
            return $hours . 'h' . $minutes . 'min';
        }
        else
        {
            return $minutes . 'min';
        }
    }
    if(array_key_exists('nom', $_GET) AND !empty($_GET['nom']))
    {
        foreach($films as $key => $film)
        {
            if(stripos($film['title'], $_GET['nom']) === false)
            {
                unset($films[$key]);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <article>
        <form action="" method="get">
            <input type="text" name="nom" id="">
            <input type="text" name="temps" id="">
            <input type="submit" value="filtrer">
        </form>
            <?php foreach($films as $films): ?>
                <div>
                <?php if(isset($erreur)): ?>
                    <p><?= $erreur ?></p>
                <?php endif; ?>
                    <h3><?= $films['title'] ?></h3>
                    <img src="<?= $films['cover'] ?>" alt="<?= $films['title'] ?>">
                    <span><?= formatDuration($films['duration']) ?></span>
                </div>
            <?php endforeach; ?>
    </article>
</body>
</html> 