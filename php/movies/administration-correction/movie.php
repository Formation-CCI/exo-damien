
<?php 
    $movies= json_decode(file_get_contents('movies.json'), true);
    $movies = $movies[$_GET['key']];
?>

<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <article>
                <div>
                <?php if(isset($erreur)): ?>
                    <p><?= $erreur ?></p>
                <?php endif; ?>
                    <h3><?= $movies['title'] ?></h3>
                    <img src="<?= $movies['cover'] ?>" alt="<?= $movies['title'] ?>">
                    <span><?= formatDuration($movies['duration']) ?></span>
                    <a href="movie.php?key=<?= $key ?>">
                        En savoir plus
                    </a>
                </div>
    </article>
</body>
</html> 