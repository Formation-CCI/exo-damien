<?php
$dbh = new PDO('mysql:host=localhost;dbname=blogdemo;charset=utf8', 'root', '', 
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);
var_dump($dbh);

$query = 'SELECT * FROM redacteurs';
$sth = $dbh->query($query);
$redacteurs = $sth->fetchAll();
var_dump($redacteurs);

$query= 'SELECT * FROM redacteurs WHERE id = 1';
$sth = $dbh->query($query);
$redacteur = $sth->fetch();
var_dump($redacteur);

$query= 'SELECT * FROM redacteurs WHERE id =' . $_GET['redacteur'];// à ne jamais faire => injection sql
$sth = $dbh->query($query);
$redacteur = $sth->fetch();
var_dump($redacteur);

$query= 'SELECT * FROM redacteurs WHERE id = ?';
$sth = $dbh->prepare($query);
$sth->execute([$_GET['redacteur']]);
$redacteur = $sth->fetch();
var_dump($redacteur);

$query= 'SELECT * FROM redacteurs WHERE id = :redacteur';
$sth = $dbh->prepare($query);
$sth->execute([':redacteur' => $_GET['redacteur']]);// à ne jamais faire car l'execute car il transforme tout en chaine de caractère
$redacteur = $sth->fetch();
var_dump($redacteur);

$query= 'SELECT * FROM redacteurs WHERE id = :redacteur';
$sth = $dbh->prepare($query);
$sth->bindValue(':redacteur',  $_GET['redacteur'], PDO::PARAM_INT);// meilleur façon de faire car on peux choisir le type
$sth->execute();
$redacteur = $sth->fetch();
var_dump($redacteur);
?>