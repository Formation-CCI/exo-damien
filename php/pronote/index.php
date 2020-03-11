<?php

    include './php-include/bdd-connexion.php'; // Connexion à la base de donnée

    /* Affichage des étudiants */
    $query = 'SELECT id, prenom, nom FROM etudiants ORDER BY nom, prenom';
    $sth = $dbh->query($query);
    $etudiants = $sth->fetchAll();

    $query = 'SELECT id, libelle FROM matieres ORDER BY libelle';
    $sth = $dbh->query($query);
    $matieres = $sth->fetchAll();

    /* Formulaire */
    if(!empty($_POST))
    {
        $query = 'INSERT INTO notes (idEtudiant, idMatiere, valeur) VALUES(?, ?, ?)';
        $sth = $dbh->prepare($query);
        $sth -> bindValue(1, $_POST['idEtudiant'], PDO::PARAM_INT);
        $sth -> bindValue(2, $_POST['idMatiere'], PDO::PARAM_INT);
        $sth -> bindValue(3, $_POST['note'], PDO::PARAM_INT);
        $sth->execute();
        $succes = $sth->rowCount() == 1;
    }

    include './php-include/index.phtml'; // Insertion de la page index