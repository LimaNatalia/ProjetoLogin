async function recuperasenha(){
            
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;
    
    if(email == "" || email.indexOf('@') == -1 ){
        alert('Preencha o campo Login!');
        return false;
    }
    if(senha == "" || senha.length < 5){
        alert("Preencha o Campo senha!");
        return;
    }
    
    
    let formData = new FormData()
    formData.append('email', email);
    formData.append('senha', senha);

    await fetch ('validar_senha.php', {
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
                    
            })
    
    })
    
}