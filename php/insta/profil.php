<?php
    session_start();
    if(!array_key_exists('authentification', $_SESSION))
    {
        header('Location: connexion.php');
        exit;
    }
    else
    {
        include './php-include/bdd-connexion.php'; // Connexion à la base de donnée
        $query = 'SELECT id, filename FROM images WHERE idUser = ?';
        $sth = $dbh->prepare($query);
        $sth -> bindValue(1, $_SESSION['authentification'], PDO::PARAM_INT);
        $sth->execute();
        $images = $sth->fetchAll();

        // Envoie d'image
        if(array_key_exists('fichier', $_FILES))
        {
            if($_FILES['fichier']['error'] === 0)
            {
                if(in_array(mime_content_type($_FILES['fichier']['tmp_name']), ['image/png' , 'image/jpeg']))
                {
                    if($_FILES['fichier']['size'] < 3000000)
                    {
                        $urlPicture = $_SESSION['authentification'] . "-" . uniqid() . "." . pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);

                        $query = 'INSERT INTO images (filename, idUser) VALUES(?, ?)';
                        $sth = $dbh->prepare($query);
                        $sth -> bindValue(1, $urlPicture, PDO::PARAM_STR);
                        $sth -> bindValue(2, $_SESSION['authentification'], PDO::PARAM_INT);
                        $sth->execute();

                        move_uploaded_file($_FILES['fichier']['tmp_name'], 'img/' . $urlPicture);

                        header('Location: profil.php'); 
                        exit;
                    }
                }
            }
        }
        // Supprimer une image
        if(!empty($_POST))
        {
            $query = 'DELETE FROM images WHERE id = ?';
            $sth = $dbh->prepare($query);
            $sth -> bindValue(1, $_POST['idImage'], PDO::PARAM_INT);
            $sth->execute();
            header('Location: profil.php'); 
            exit;
        }
        
        include('./php-include/profil.phtml');
    }