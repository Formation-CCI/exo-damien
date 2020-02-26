
<?php
    function translate($word, $direction) 
    {
        $dictionary = 
        [
            'cat' => 'chat',
            'dog' => 'chien',
            'hello' => 'bonjour',
            'name' => 'nom',
            'by' => 'par',
        ];
        $word = strtolower($word);
        if($direction == "eng")
            $dictionary = array_flip($dictionary);

        if(array_key_exists ($word, $dictionary))
        {
            if(!empty($word) AND !empty($dictionary))
                return $dictionary[$word];
        }
        else
            return false;
    } 
    $mot =  translate($_POST['word'],$_POST['direction']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traducteur PHP</title>
</head>
<body>
<h2>Traducteur PHP</h2>
    <form action="translator.php" method="post">
        <ul>
            <li><label>Mot : <input type="text" name="word" value="<?php if(isset($mot)){echo $mot;}?>"></label></li>
            <li><label>Sens de traduction : <select name="direction">
            <option value="eng">Français vers Anglais</option>
            <option value="fr">Anglais vers Français</option>
            </select></label></li>
            <li><input type="submit" value="Traduire"></li>
        </ul>
    </form>
</body>
</html>