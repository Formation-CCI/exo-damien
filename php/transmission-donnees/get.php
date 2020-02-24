<?php 
    /* var_dump($_GET); */
    if(array_key_exists('lang', $_GET))
    {
        if($_GET['lang'] == "fr")
            $message = "Bonjour";

        if($_GET['lang'] == "eng")
            $message = "Hello";

        if($_GET['lang'] == "esp")
            $message = "Hola";
            
        if(isset($message))
            echo "<p>". $message . "</p>";
    }
?>
<a href="?lang=fr">Français</a>
<a href="?lang=eng">English</a>
<a href="?lang=esp">Español</a>