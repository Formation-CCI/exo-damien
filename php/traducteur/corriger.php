<?php
    function translate($word, $direction)
    {
        $dictionary =
        [
            'cat' => 'chat',
            'dog' => 'chien',
            'monkey' => 'singe',
            'sea' => 'mer',
            'sun' => 'soleil'
        ];
        if($direction == 'en')
        {
            $dictionary = array_flip($dictionary);
        }
        if(array_key_exists($word, $dictionary))
        {
            return $dictionary[$word];
        }
        else
        {
            return false;
        }
    }
    if(array_key_exists('word', $_GET) AND array_key_exists('direction', $_GET))
    {
        $word = strtolower($_GET['word']);
        $direction = $_GET['direction'];
        $translatedWord = translate($word, $direction);
        if($translatedWord === false)
        {
            $message = 'Je ne connais pas le mot � '.$word.' �.';
        }
        else
        {
            $message = 'Le mot � '.$word.' � se traduit par � '.$translatedWord.' �.';
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Traducteur</title>
    </head>
    <body>
        <h1>Traducteur</h1>
        <?php if(isset($message)): ?>
            <p><?= $message ?></p>
        <?php else: ?>
            <form action="translator.php" method="get">
                <div>
                    <label for="word">Mot � traduire</label>
                    <input type="text" name="word" id="word">
                </div>
                <div>
                    <label for="direction">Sens de traduction</label>
                    <select name="direction" id="direction">
                        <option value="fr">Anglais -> Fran�ais</option>
                        <option value="en">Fran�ais -> Anglais</option>
                    </select>
                </div>
                <div>
                    <button type="submit">Traduire</button>
                </div>
            </form>
        <?php endif; ?>
    </body>
</html>