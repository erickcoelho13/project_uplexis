<?php
    //informaçoes para se conectar ao banco de dados
    $host = '';
    $username = '';
    $password = '';
    $dbname = 'projeto_erick_uplexis';

    //conectando ao banco de dados
    $db = mysqli_connect($host, $username, $password, $dbname);

    if (!$db) {
        echo 'erro ao conectar ao banco de dados';
        die;
    }

    mysqli_set_charset($db, 'utf8');

?>
