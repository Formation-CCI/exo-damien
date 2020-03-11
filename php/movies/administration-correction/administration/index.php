<?php
    $movies= json_decode(file_get_contents('../movies.json'), true);
    include 'index.phtml';
