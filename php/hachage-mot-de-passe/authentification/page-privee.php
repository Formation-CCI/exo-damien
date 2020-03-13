<?php
    session_start();
    /* session_regenerate_id(); */
    if(!array_key_exists('authentification', $_SESSION))
    {
        header('Location: connexion.php');
        exit;
    }
    else
    {
        var_dump('page-privee');
    }