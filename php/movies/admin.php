<?php

    $films = json_decode(file_get_contents('film.json'), true);
    
    /* ADD POST */
    if(array_key_exists('ajout', $_POST))
    {
        $newFilm=
        [
            $_POST['title']=>
            [
                    'title' => $_POST['title'],
                    'cover' => $_POST['cover'],
                    'duration' => $_POST['duree'],
                    'synopsis' => $_POST['synopsis'],
            ]
        ];
        $films = array_merge($films, $newFilm);
        file_put_contents('film.json', json_encode($films));
    }

    /* EDIT POST */
    if(array_key_exists('modif', $_POST))
    {
        $newFilm =
        [
            $_POST['newtitle']=>
            [
                    'title' => $_POST['newtitle'],
                    'cover' => $_POST['cover'],
                    'duration' => $_POST['duration'],
                    'synopsis' => $_POST['synopsis'],
            ]
        ];

        $films[$_POST['title']] = $newFilm[$_POST['newtitle']];
        file_put_contents('film.json', json_encode($films));
    }

    /* DELETE POST */
    if(array_key_exists('supprimer', $_POST))
    {
        unset($films[$_POST['titreFilm']]);
        file_put_contents('film.json', json_encode($films));
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies | Admin</title>
    <link rel="stylesheet" href="./css/style2.css">
    
</head>
<body>
    <article>
        <nav>
            <a href="index.php">Movies</a>
            <a href="admin.php">Administration</a>
        </nav>
        <br>
        <h3>Ajouter un film</h3>
        <br>
        <form action="" method="post">
            <input type="text" name="title">
            <input type="text" name="cover">
            <input type="text" name="duree">
            <input type="text" name="synopsis">
            <input type="submit" name="ajout" value="Ajouter un film">
        </form>
        <br>
        <h3>Modifier un film</h3>
            <?php foreach($films as $films): ?>
                <div class="movie">
                    <form action="" method="post">
                        <input type="hidden" name="title" value="<?= $films['title'] ?>">
                        <input type="text" name="newtitle" value="<?= $films['title'] ?>">
                        <input type="text" name="cover" value="<?= $films['cover'] ?>">
                        <input type="text" name="duration" value="<?= $films['duration']  ?>">
                        <input type="text" name="synopsis" value="<?= $films['synopsis'] ?>">
                        <input type="submit" name="modif" value="Modifier le film">
                    </form>
                    <form action="" method="post">
                        <input type="hidden" name="titreFilm" value="<?= $films['title'] ?>">
                        <input type="submit" name="supprimer" value="Supprimer">
                    </form>
                </div>
                <hr>
            <?php endforeach; ?>
    </article>
</body>
</html> 