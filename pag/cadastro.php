<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="shortcut icon" href="img/manole-logo.png"type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
   
</head>
<script>
    function fMasc(objeto,mascara) {
            obj=objeto
            masc=mascara
            setTimeout("fMascEx()",1)
        }
        function fMascEx() {
            obj.value=masc(obj.value)
        }
        function mTel(tel) {
            tel=tel.replace(/\D/g,"")
            tel=tel.replace(/^(\d)/,"($1")
            tel=tel.replace(/(.{3})(\d)/,"$1)$2")
            if(tel.length == 9) {
                tel=tel.replace(/(.{1})$/,"-$1")
            } else if (tel.length == 10) {
                tel=tel.replace(/(.{2})$/,"-$1")
            } else if (tel.length == 11) {
                tel=tel.replace(/(.{3})$/,"-$1")
            } else if (tel.length == 12) {
                tel=tel.replace(/(.{4})$/,"-$1")
            } else if (tel.length > 12) {
                tel=tel.replace(/(.{4})$/,"-$1")
            }
            return tel;
        }
    
        function mCPF(cpf){
            cpf=cpf.replace(/\D/g,"")
            cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
            cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
            cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
            return cpf
        }
</script>
<body>
    <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	?>
    <div id="container">
<fieldset>
    <img width="80px" height="60px" src="img/manole-logo.png">

    <section class="content">
    <h3>Realize seu Cadastro</h3>

    <form method="POST" href="validar.php">
        
        <div class="inputBox">
            <input class="inputUser" type="text" id="nome" maxlength="110" required>
            <label for="nome" class="labelInput">Nome completo:</label>
        </div><p>
        
        <div class="inputBox">
            <input type="text" onkeydown="javascript: fMasc( this, mCPF )" name="cpf" id="cpf" class="inputUser" maxlength="14" required>
            <label for="cpf" class="labelInput">CPF:</label>
        </div><p>
        
        <div class="inputBox">
            <input type="tel" onkeydown="javascript: fMasc( this, mTel )" name="telefone" id="tel" class="inputUser" maxlength="14" required>
            <label for="telefone" class="labelInput">Telefone:</label>
        </div><p>

        <div class="inputBox">
            <input type="text" name="voucher" id="voucher" class="inputUser" maxlength="6" required>
            <label for="voucher" class="labelInput">Voucher:</label>
        </div><p>
                
        <div class="inputBox">
            <input type="email" name="email" id="email" class="inputUser" maxlength="220" required>
            <label for="email" class="labelInput">Email:</label>
        </div><p>
                    
        <div class="inputBox">
            <input type="password" name="senha" id="senha" class="inputUser" maxlength="5" required>
            <label for="senha" class="labelInput">Senha:</label>
        </div><p>
        
        <div>
            <a href="https://politicas.manole.com.br/">Termos de Uso</a><br>
        </div>
        <input type="checkbox" id= "checkbox" name="checkbox" checked>
            <label> Li e Aceito Termos de Uso e Politicas de Privacidade</label><br>
        <div>
        <button type="button" onclick="envia()" class="btn btn-outline-danger">Cadastrar</button>
        </div>

    </form>
</fildset>
    </section>


<script src="src/teste.js"></script>
    
</div>
</body>
</html>
