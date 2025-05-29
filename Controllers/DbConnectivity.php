<?php
session_start();
try {
    $db = mysqli_connect('localhost', 'root', '', 'koyil');
    // $db = mysqli_connect('localhost', 'katpakavinayagar_mainTempleRoot', 'TvQHfav7)q6$', 'katpakavinayagar_mainTemple');
    if (!$db) {
        throw new Exception("Database connection failed");
    }
} catch (Exception $er) {
    //echo $er->getMessage();
    $_SESSION['error'] = $er->getMessage();
    header('Location: /error');
}

?>