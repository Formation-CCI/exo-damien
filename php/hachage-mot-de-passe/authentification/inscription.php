<?php

    if(!empty($_POST))
    {
        $email = trim($_POST['mail']); // Enleve les espaces
        $password = trim($_POST['motDePasse']);

        include './php-include/bdd-connexion.php'; // Connexion à la base de donnée

        $query = 'INSERT INTO users (mail, motDePasse) VALUES(?, ?)';
        $sth = $dbh->prepare($query);
        $sth -> bindValue(1, $email, PDO::PARAM_STR);
        $sth -> bindValue(2, password_hash($password, PASSWORD_BCRYPT), PDO::PARAM_STR);
        $sth->execute();

        header('Location: connexion.php');
        exit;
    }

    include('./php-include/inscription.phtml');