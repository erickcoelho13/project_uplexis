<?php
    session_start();
    $idUsuario = $_SESSION['login'];

    $data = $_POST['data'];

    $decode = json_decode($data, true);

    include('../../system/functions/connection.php');


    $count = count($decode);

    $titulos = $decode;
    $links = $decode;

    for ($i = 1; $i <= $count; $i++) {
        $titulo = $titulos[$i][0];
        $link = $links[$i][1];

        $titulo = mysqli_real_escape_string($db, strip_tags(trim($titulo)));

        $sql = "INSERT INTO `artigos` VALUES(NULL, '$idUsuario', '$titulo', '$link')";

        $sqlQuery = mysqli_query($db, $sql);
    }

            echo 'Parabens, foram encontrados '.$count.' artigos. Todos foram salvos na base de dados.';
?>
