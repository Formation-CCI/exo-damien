<?php

    include './php-include/bdd-connexion.php'; // Connexion à la base de donnée

    $query = 'SELECT prenom, nom FROM etudiants WHERE id = ?';
    $sth = $dbh->prepare($query);
    $sth -> bindValue(1, $_GET['id'], PDO::PARAM_INT);
    $sth->execute();
    $etudiant = $sth->fetch(); // Affichage du nom et prénom de l'étudiant
    if($etudiant === false)
        exit('Cet étudiant n\'est pas dans la base de données.');

    $query = 'SELECT matieres.libelle, matieres.coefficiant, ROUND(AVG(notes.valeur), 2) AS moyenne FROM matieres INNER JOIN notes ON matieres.id = notes.idMatiere WHERE notes.idEtudiant = ? GROUP BY notes.idMatiere';
    $sth = $dbh->prepare($query);
    $sth -> bindValue(1, $_GET['id'], PDO::PARAM_INT);
    $sth->execute();
    $matieres = $sth->fetchAll(); // Affichage des matières et des notes
    
    if(count($matieres) > 0)
    {
        $sommeCoefficiants = 0;
        $sommeMoyenneAvecCoefficiant = 0;
        foreach($matieres as $matiere)
        {
            $sommeMoyenneAvecCoefficiant += $matiere['moyenne'] * $matiere['coefficiant'];
            $sommeCoefficiants += $matiere['coefficiant'];
        }
        $etudiant['moyenneGeneral'] = $sommeMoyenneAvecCoefficiant / $sommeCoefficiants;
    } // Calcul de la moyenne général
    
    include './php-include/etudiant.phtml'; // Insertion de la page etudiant