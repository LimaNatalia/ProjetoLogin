async function envia(){
    var nome = document.getElementById('nome').value;
    var cpf = document.getElementById('cpf').value;
    var tel = document.getElementById('tel').value;
    var voucher = document.getElementById('voucher').value;
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;
    

    if(nome == ""){
        alert("Campo Nome inválido!");
        return;
    }
    if(cpf == "" || cpf.length < 14){
        alert("Campo CPF inválido!");
        return;
    }
    if(tel == "" || tel.length < 14){
        alert("Campo Telefone inválido!");
        return;
    }
   
    if(voucher == ""){
        alert("Preencha o Campo Voucher corretamente!");
        return;
    }
    if(email == "" || email.indexOf('@') == -1 ){
        alert('Preencha o campo E-mail.');
        formuser.email.focus();
        return;
    }
    if(senha == "" || senha.length < 5){
        alert("Preencha o Campo senha!");
        return;
    }     
    
    //console.log('Nome: '+nome +'\n'+'CPF: '+cpf +'\n'+'Telefone: '+tel +'\n'+'Email: '+email +'\n'+'\n'+ 'Cadastro Feito!!'); 

    let formData = new FormData()
    formData.append('nome', nome)
    formData.append('cpf', cpf)
    formData.append('telefone', tel)
    formData.append('voucher', voucher)
    formData.append('email', email)
    formData.append('senha', senha)

//é usada para esperar até que uma função retorne seu resultado sem bloquear o fluxo do programa
    await fetch('validar.php', {
        method: 'POST',
        body: formData
    }).then(result => {
        console.log(
            result
        )
        result
        .json()
        .then(res => {
            console.log(
                res
            )
            if(res.status== '400'){
                alert("Usuario Já Cadastrado!");
            }else{
                alert("Cadastro Feito!");
                window.location.href="/projetologin/index.php";
            }
        })
    
    })
}