<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="pag/img/manole-logo.png"type="image/x-icon">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="pag/teste1.css">
</head>
<body>
    <fieldset>
    <img width="80px" height="60px" src="pag/img/manole-logo.png">
   
    <section>
    <div class="container">
    <form action="validarlogin.php" method="POST">

        <div class="inputBox">
            <input type="email" name="email" id="email" class="inputUser" required>
            <label for="email" class="labelInput">Login:</label>
        </div><p>
            
        <div class="inputBox">
            <input type="password" name="senha" id="senha" class="inputUser" required>
            <label for="senha" class="labelInput">Senha:</label>
        </div><p>

        <div>
            <a href="pag/esqueceu_senha.php">Esqueceu sua Senha?</a>
        </div>

        <div>
            <button type="button" value="Entrar" onclick="logar()" class="btn btn-outline-danger">Entrar</button><p>
        </div>
        </form>
    
       <a href="pag/cadastro.php"><button type="button" class="btn btn-outline-danger">Cadastrar</button></a>
    </div>
    </section>
    </fieldset>

    <script src="script.js"></script>
</body>
</html>