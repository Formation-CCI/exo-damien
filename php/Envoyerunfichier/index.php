<?php

    if(array_key_exists('fichier', $_FILES))
    {
        if($_FILES['fichier']['error'] === 0)
        {
            if(in_array(mime_content_type($_FILES['fichier']['tmp_name']), ['image/png' , 'image/jpeg']))
            {
                if($_FILES['fichier']['size'] < 3000000)
                {
                    move_uploaded_file($_FILES['fichier']['tmp_name'], 'uploads/' . uniqid() . "." . pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION));
                    header('Location: ./');
                    exit;
                }
            }
        }
    }
    
    include('./php-include/index.phtml');