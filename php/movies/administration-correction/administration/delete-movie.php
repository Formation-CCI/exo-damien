<?php
    $movies= json_decode(file_get_contents('../movies.json'), true);
    unset($movies[$_GET['key']]);
    file_put_contents('../movies.json', json_encode($movies));
    header('location:index.php');
    exit;