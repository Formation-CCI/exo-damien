<?php

    if(!empty($_POST))
    {
        $email = trim($_POST['mail']);
        $password = trim($_POST['motDePasse']);

        include './php-include/bdd-connexion.php'; // Connexion à la base de donnée

        $query = 'SELECT id, mail, motDePasse FROM users WHERE mail = ?';
        $sth = $dbh->prepare($query);
        $sth -> bindValue(1, $email, PDO::PARAM_STR);
        $sth->execute();
        $user = $sth->fetch();
        if($user !== false AND password_verify($password, $user['motDePasse']))
        {
            session_start(); // démarrer la session avant tout affichage de contenu
            $_SESSION['authentification'] = $user['id'];
            header('Location: page-privee.php');
            exit; 
        }
        else
        {
            $erreur = "Adresse mail ou mot de passe incorrect !";
            header('Location: connexion.php');
            exit;
        }
    }
    include('./php-include/connexion.phtml');