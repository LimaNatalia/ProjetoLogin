async function logar(){
            
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;
    
    if(email == "" || email.indexOf('@') == -1 ){
        alert('Preencha o campo Login!');
        formuser.email.focus();
        return;
    }
    if(senha == "" || senha.length < 5){
        alert("Preencha o Campo senha!");
        return;
    }
    
    
    let formData = new FormData()
    formData.append('email', email);
    formData.append('senha', senha);

    await fetch ('validarlogin.php', {
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
                    if(res.status== '404'){
                        alert("Usuario ou Senha Invalidos!");
                        window.location = "index.php";
                    }else{
                        alert("Login Feito!");
                        window.location = "pag/livro.html";
                }
            })
    
    })
    
}