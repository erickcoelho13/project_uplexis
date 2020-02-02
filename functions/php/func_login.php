<?php

    session_start();

    if ($_POST) {
        if (isset($_POST['username']) && (isset($_POST['password']))) {
            include('../../system/functions/connection.php');

            $username = mysqli_real_escape_string($db, strip_tags(trim($_POST['username'])));
            $password = mysqli_real_escape_string($db, strip_tags(trim($_POST['password'])));
            // foi necessario utilizar funçoes para reforçar a segurança e garantir a manipulaçao de dados dentro do banco de dados

            $sql = "SELECT * FROM `usuario` WHERE `usuario` = '$username' AND `senha` = '$password'";
            $sqlQuery = mysqli_query($db, $sql);

            //verifica se  houve linha afetada pelo select
            if (mysqli_affected_rows($db) == 1) {
                $ln = mysqli_fetch_assoc($sqlQuery);

                $_SESSION['login'] = $ln['id'];
                header('location:../../site/');
                die;

            } else {
                if (mysqli_affected_rows($db) == 0) {
                    $_SESSION['message'] = 'Usuario não encontrado';
                    header('location:../../login/');
                } else {
                    echo 'Problema na base de dados';
                    die;
                }
            }
        } else {
            session_destroy();
            echo 'Acesso não autorizado.';
            die;
        }
    } else {
        //caso nada seja enviado, retorna à pg inicial
        session_destroy();
        echo 'Acesso não autorizado.';
        die;
    }


 ?>
