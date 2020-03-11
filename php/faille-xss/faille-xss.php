<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(array_key_exists('prenom', $_POST)):?>
        <p>Bonjour <?= htmlspecialchars($_POST['prenom']) ?></p>
        <?php endif ?>
    <form action="faille-xss.php" method="post">
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>