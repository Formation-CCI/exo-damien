
<?php 
    $films = json_decode(file_get_contents('film.json'), true);
    $films = $films[$_GET['key']];
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
                <div>
                <?php if(isset($erreur)): ?>
                    <p><?= $erreur ?></p>
                <?php endif; ?>
                    <h3><?= $films['title'] ?></h3>
                    <img src="<?= $films['cover'] ?>" alt="<?= $films['title'] ?>">
                    <span><?= formatDuration($films['duration']) ?></span>
                    <a href="movie.php?key=<?= $key ?>">
                        En savoir plus
                    </a>
                </div>
    </article>
</body>
</html> 