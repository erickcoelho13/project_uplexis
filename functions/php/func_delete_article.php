<?php

    if ($_GET) {
        if (isset($_GET['article'])) {
            $article = $_GET['article'];
            include('../../system/functions/connection.php');

            $sql = "DELETE FROM `artigos` WHERE `id` = '$article'";
            $sqlQuery = mysqli_query($db, $sql);

            header('location: ../../site/');
        }
    }

?>
