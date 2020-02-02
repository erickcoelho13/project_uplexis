<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link href="../css/sheets.css" rel="stylesheet" type="text/css">
        <link href="../css/artigos.css" rel="stylesheet" type="text/css">
        <title>Artigos</title>
    </head>

    <body>
        <div class="container">
            <div class="search-article">
                <div class="form-container">
                    <div>
                        <p><span>Uplexis</span></p>
                        <p>Pesquise pelo Artigo que deseja Capturar do nosso blog.</p>
                    </div>

                    <form>
                        <div>
                            <label for="article">Artigo</label>
                            <input id="article" type="text" name="article" required>
                        </div>

                        <input class="button green" type="submit" value="Capturar">
                    </form>
                </div>
            </div>

            <div class="saved-article">
                <div>
                    <p><span>Uplexis</span></p>
                    <p>Aqui estão os artigos salvos em nossa base de dados</p>
                </div>

                <?php
                    include('../system/functions/connection.php');

                    $sql = "SELECT * FROM `artigos`";
                    $sqlQuery = mysqli_query($db, $sql);
                ?>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Link</th>
                            <th>Remover</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                            while($ln = mysqli_fetch_assoc($sqlQuery)) {
                        ?>
                        <tr>
                            <td><?php echo $ln['id']; ?></td>
                            <td><?php echo $ln['titulo']; ?></td>
                            <td><?php echo $ln['link']; ?></td>
                            <td><a href="../functions/php/func_delete_article.php?article=<?php echo $ln['id']; ?>">&#10006;</a></td>
                        </tr>
                        <?php
                            }
                        ?>

                    </tbody>

                </table>

            </div>
        </div>
        <script src="../libraries/js/jquery-3.4.1.min.js"></script>
        <script src="../functions/js/get_articles.js"></script>
    </body>

</html>
