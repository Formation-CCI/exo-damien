<?php

    $films = json_decode(file_get_contents('film.json'), true);

    function formatDuration($duration)
    {
        $hours = intval($duration/60);
        $minutes = $duration%60;
        if($hours > 0)
            return $hours . 'h' . $minutes . 'min';
        else
            return $minutes . 'min';
    }
    if(array_key_exists('nom', $_GET) AND !empty($_GET['nom']))
    {
        foreach($films as $key => $film)
        {
            if(stripos($film['title'], $_GET['nom']) === false)
                unset($films[$key]);
        }
    }
    if(array_key_exists('temps', $_GET) AND !empty($_GET['temps']))
    {
        foreach($films as $key => $film)
        {
            if($film['duration'] > $_GET['temps'])
                unset($films[$key]);
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <article>
        <nav>
            <a href="index.php">Movies</a>
            <a href="admin.php">Administration</a>
        </nav>
        <form action="" method="get">
            <input type="text" name="nom" id="" placeholder="triée par nom">
            <input type="text" name="temps" id="" placeholder="triée par durée">
            <input type="submit" value="filtrer">
        </form>
            <?php foreach($films as $films): ?>
                <div class="movie">
                    <h3><?= $films['title'] ?></h3>
                    <div class="flex-post">
                        <img src="<?= $films['cover'] ?>" alt="<?= $films['title'] ?>" />
                        <p><?= $films['synopsis'] ?></p>
                    </div>
                    <div class="duree">
                        <p><?= formatDuration($films['duration']) ?></p>
                    </div>
                    <?php 
                    if(isset($key))
                    :?>
                        <a href="movie.php?key=<?= $key ?>">
                        <img src="" alt=""/>
                        <?php 
                    endif
                    ?>
                </div>
            <?php endforeach; ?>
    </article>
</body>
</html> 