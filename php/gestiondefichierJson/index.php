<?php 
    /* $months=
    [
        1 =>
        [
            'en' => 'January',
            'fr' => 'Janvier'
        ],
        2 =>
        [
            'en' => 'February',
            'fr' => 'Février'
        ],
        3 =>
        [
            'en' => 'March',
            'fr' => 'Mars'
        ],
        4 =>
        [
            'en' => 'April',
            'fr' => 'Avril'
        ],
        5 =>
        [
            'en' => 'Mai',
            'fr' => 'Mai'
        ],
        6 =>
        [
            'en' => 'June',
            'fr' => 'Juin'
        ],
        7 =>
        [
            'en' => 'July',
            'fr' => 'Juillet'
        ],
        8 =>
        [
            'en' => 'August',
            'fr' => 'Août'
        ],
        9 =>
        [
            'en' => 'September',
            'fr' => 'Septembre'
        ],
        10 =>
        [
            'en' => 'October',
            'fr' => 'Octobre'
        ],
        11 =>
        [
            'en' => 'November',
            'fr' => 'Novembre'
        ],
        12 =>
        [
            'en' => 'December',
            'fr' => 'Décembre'
        ]
    ];
    // crée un fichier json avec le contenu de months
    file_put_contents('months.json', json_encode($months)); */

    // on récupère le fichier json
    $months2 = json_decode(file_get_contents('months.json'), true);
    var_dump($months2);
?>