<?php
    session_start();

    //verificaçao de usuario
        if (!isset($_SESSION['login'])) {
            header('location:../login/');
        } else {
            include('artigos.php');
        }

?>
