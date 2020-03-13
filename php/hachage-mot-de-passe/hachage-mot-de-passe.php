<?php
    $motDePasseEnClair = 'Test';
    $md5 = md5($motDePasseEnClair); //32 caractères 
    $sha1 = sha1($motDePasseEnClair);//40 caractères
    $hash = password_hash($motDePasseEnClair, PASSWORD_BCRYPT); //60 caractères
    $hash2 = password_hash($motDePasseEnClair, PASSWORD_BCRYPT);
    $motDePasseCorrect = password_verify($motDePasseEnClair, $hash);
    
    var_dump($md5);
    var_dump($sha1);
    var_dump($hash);
    var_dump($hash2);
    var_dump($motDePasseCorrect);
?>