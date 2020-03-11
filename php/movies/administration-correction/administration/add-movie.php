<?php

    if(!empty($_POST))
    {
        $movies= json_decode(file_get_contents('../movies.json'), true);
        $movies[$_POST['key']] =
        [
            'title' => $_POST['title'],
            'cover' => $_POST['cover'],
            'duration' => $_POST['duration'],
            'synopsis' => $_POST['synopsis'],
        ];
        file_put_contents('../movies.json', json_encode($movies));
        header('location:index.php');
        exit; //stop la lecture du fichier, toujours mettre un exit après un header location
    }
    
    include 'add-movie.phtml';