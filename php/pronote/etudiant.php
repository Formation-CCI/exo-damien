<?php

    include './php-include/bdd-connexion.php'; // Connexion à la base de donnée

    $query = 'SELECT * FROM notes INNER JOIN etudiants ON etudiants.id = notes.idEtudiant INNER JOIN matieres ON matieres.id = notes.idMatiere WHERE etudiants.id = ? ORDER BY libelle';
    $sth = $dbh->prepare($query);
    $sth->execute([$_GET['key']]);
    $matieres = $sth->fetchAll(); // Affichage des matières + les notes

    $query = 'SELECT ROUND(SUM(notes.valeur) / COUNT(notes.valeur)) AS MGE, matieres.libelle, matieres.coefficiant FROM notes INNER JOIN matieres ON matieres.id = notes.idMatiere WHERE notes.idEtudiant = ? GROUP BY notes.idMatiere ORDER BY matieres.libelle';
    $sth = $dbh->prepare($query);
    $sth->execute([$_GET['key']]);
    $moyenneEtudiant = $sth->fetchAll(); // Affichage de la moyenne des notes pour chaque matière de l'étudiant
    
    $query = 'SELECT ROUND(SUM(notes.valeur) / matieres.coefficiant) AS MGM, matieres.libelle, matieres.coefficiant FROM notes INNER JOIN matieres ON matieres.id = notes.idMatiere GROUP BY notes.idMatiere';
    $sth = $dbh->prepare($query);
    $sth->execute([$_GET['key']]);
    $moyenneGeneralMatiere = $sth->fetchAll(); // Affichage de la moyenne général pour chaque matière de l'étudiant

    $query = 'SELECT ROUND(SUM(notes.valeur) / matieres.coefficiant) AS MG, matieres.libelle, matieres.coefficiant AS coef FROM notes INNER JOIN matieres ON matieres.id = notes.idMatiere WHERE notes.idEtudiant = ? GROUP BY notes.idMatiere ';
    
    $sth = $dbh->prepare($query);
    $sth->execute([$_GET['key']]);
    $moyenneGeneral = $sth->fetchAll(); // Affichage de la moyenne général
    var_dump($moyenneEtudiant, $moyenneGeneral);
    foreach($moyenneEtudiant as $formoyenne) 
    {
        if(isset($stock))
        {
            $formoyenne['MGE'] += $stock;
        }
        $stock = $formoyenne['MGE'];
        if(isset($stockcoef))
        {
            $formoyenne['coefficiant'] += $stockcoef;
        }
        $stockcoef = $formoyenne['coefficiant'];
    }
    var_dump($stock, $stockcoef);
    echo $stock / $stockcoef;
    include './php-include/etudiant.phtml'; // Insertion de la page etudiant