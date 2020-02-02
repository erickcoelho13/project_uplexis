<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link href="../css/sheets.css" rel="stylesheet" type="text/css">
        <link href="../css/login.css" rel="stylesheet" type="text/css">
        <title>Login</title>
    </head>

    <body>
        <div class="form-container login">
            <?php
                if (isset($_SESSION['message'])) {
            ?>
            <div class="php-message">
                <?php
                    echo $_SESSION['message'];
                ?>
            </div>
            <?php
                    unset($_SESSION['message']);
                }
            ?>
            <div>
                <p><span>"Bem-vindo(a)"</span></p>
                <p>Informe seus dados para acessar sua conta.</p>
            </div>

            <form method="post" action="../functions/php/func_login.php">
                <div>
                    <label for="username">Usuário</label>
                    <input id="username" type="text" maxlength="20" name="username" required autofocus>
                </div>

                <div>
                    <label for="password">Senha</label>
                    <input id="password" type="password" maxlength="10" name="password" required>
                </div>

                <input class="button green" type="submit" value="Login">
            </form>

        </div>
    </body>
</html>
