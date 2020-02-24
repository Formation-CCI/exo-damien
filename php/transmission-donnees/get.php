<?php 
    /* var_dump($_GET); */
    if(isset($_GET['lang']))
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
<a href="get.php?lang=fr">Français</a>
<a href="get.php?lang=eng">Anglais</a>
<a href="get.php?lang=esp">Espagnol</a>