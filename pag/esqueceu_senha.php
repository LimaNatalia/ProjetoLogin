<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="teste1.css">
    <link rel="shortcut icon" href="img/manole-logo.png"type="image/x-icon">

</head>
<body>
<div class="container">
    <img width="80px" height="60px" src="img/manole-logo.png">

    <form method="POST" action="validar_senha.php">
    <div>
        <input class="field" id= "email" type="email" name="email" placeholder="Email Cadastrado:"><p>          
    </div>
    <div>
        <input class="field" id="senha" type="password" name="senha" placeholder="Digite sua nova senha:"><br>
    </div>
    <div>
        <input type="submit" name="Recuperar" value="Alterar">
    </div>
    </form>

    <script src="script_senha.js"></script>
</body>
</div>
</html>
