<?php
    session_start();
    include './php-include/bdd-connexion.php'; // Connexion à la base de donnée
    $query = 'SELECT filename FROM images';
    $sth = $dbh->query($query);
    $images = $sth->fetchAll();

    include('./php-include/index.phtml');