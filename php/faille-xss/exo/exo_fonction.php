<?php 
        $color = ['rouge', 'orange', 'jaune', 'vert'];
        $fruits = ['fraise', 'abricot', 'citron', 'citron'];
        $countries = ['fr' => 'France', 'en' => 'Angleterre', 'it' => 'Italie', 'es' => 'Espagne'];
        
        /* Exo 1 */
        echo "<h2>exo 1</h2>";
        $resultat = array_combine($color, $fruits);
        var_dump($resultat);
    
        /* Exo 2 */
        echo "<h2>exo 2</h2>";
        $exo2 = array_count_values($fruits);
        var_dump($exo2);

        /* Exo 3 */
        echo "<h2>exo 3</h2>";
        $exo3 = array_flip($countries);
        var_dump($exo3);
        
        /* Exo 4 */
        echo "<h2>exo 4</h2>";
        $exo4 = array_filter($fruits, function($fruits)
        {
            return $fruits == 'citron';
        });
        var_dump($exo4);

        /* Exo 5 */
        echo "<h2>exo 5</h2>";
        $numbers = range(1, 10);
        $exo5 = array_map(function($numbers)
        {
            return $numbers * $numbers;
        }
        , $numbers);
        var_dump($exo5);

        /* Exo 6 */
        echo "<h2>exo 6</h2>";
        array_push($fruits, 'framboise');
        var_dump($fruits);

        $framboise = array_pop($fruits);
        var_dump($fruits);

        array_unshift($fruits, $framboise);
        var_dump($fruits);

        /* Exo 7 */
        echo "<h2>exo 7</h2>";
        $semiColors = array_slice($color, 1, 2);
        var_dump($color);
        var_dump($semiColors);

        /* Exo 8 */
        echo "<h2>exo 8</h2>";
        $semiColors = array_splice($color, 1, 2);
        var_dump($color);
        var_dump($semiColors);
        $color = array_merge($color,$semiColors);
        var_dump($color);
        array_splice($color, 1, 2, ['bleu', 'violet']);
        var_dump($color);

        /* Exo 9 */
        echo "<h2>exo 9</h2>";
        $exo9 = array_unique($fruits);
        var_dump($exo9);

        /* Exo 10 */
        echo "<h2>exo 10</h2><br>";
        array_walk($countries, function($countries, $prefixe, $color)
        {
            echo "<p>Le pays " . $countries . " a pour préfixe " . $prefixe . " et la couleur " . array_rand($color) . ".</p><br>";
        }
        , $color);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <style>
        *
        {
            font-family: 'Sen', sans-serif;
        }
        h2, p
        {
            text-align: center;
        }
        .xdebug-var-dump
        {
            text-align: center;
        }
        small
        {
            font-size: 15px;
            color: #262626 !important;
        }
        font
        {
            font-size: 15px;
            color: #A6A6A6 !important;
        }
        b
        {
            font-size: 15px;
            color: #0468BF !important;
        }
        i
        {
            font-size: 15px;
            color: #57AAF2 !important;
        }
    </style>
</body>
</html>