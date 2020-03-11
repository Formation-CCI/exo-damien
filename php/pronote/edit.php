<?php

    include './php-include/bdd-connexion.php'; // Connexion à la base de donnée

    $reqnote = $dbh->prepare('INSERT INTO notes (idEtudiant, idMatiere, valeur) VALUES(?, ?, ?');
    $reqnote->execute([$_POST['etudiant'], $_POST['matiere'], $_POST['note']]);

    header('location:index.php'); // Redirection vers la page index
    exit;