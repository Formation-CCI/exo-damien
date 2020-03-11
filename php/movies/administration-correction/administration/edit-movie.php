<?php

    $movies= json_decode(file_get_contents('../movies.json'), true);

    if(!empty($_POST))
    {
        $movies[$_POST['key']] =
        [
            'title' => $_POST['title'],
            'cover' => $_POST['cover'],
            'duration' => $_POST['duration'],
            'synopsis' => $_POST['synopsis'],
        ];
        file_put_contents('../movies.json', json_encode($movies));
        header('location:index.php');
        exit;
    }

    $movie = $movies[$_GET['key']];
    include 'edit-movie.phtml';