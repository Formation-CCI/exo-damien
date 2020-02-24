<?php
    /* var_dump($_POST); */
    if(array_key_exists('nombre', $_POST))
        echo $_POST['nombre'] * 2;
?>
<form action="post.php" method="POST">
    <input type="number" name="nombre">
    <button type="submit">Multiplier par 2</button>
</form>