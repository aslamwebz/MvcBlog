<?php
/**
 * phpblog functions.php.
 * Initial Version by: Em
 * Creation Date: 5/1/2021
 */
 

function dump($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function redirect($path){
    header("Location: $path");
}
?>