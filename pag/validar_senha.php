<?php
include_once ('config.php');

/*$email = $_POST["email"];
$senha = $_POST["senha"];

$_SESSION['email'] = $email;
$_SESSION['senha'] = $senha;
   

$query = $conn->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
  $query->BindValue(':email', $email, PDO::PARAM_STR);
  $query->BindValue(':senha', $senha, PDO::PARAM_STR);
  $query->execute();
  $userCont = $query->fetch();
      
      
  if{
    $response['status'] = '404';
    $response['message'] = 'Usuario ou Senha não Encontrado!';
        
    echo json_encode($response);
  }*/
    $senha = $_POST["senha"];   

  $query = $conn->prepare ("UPDATE usuarios SET senha = :senha WHERE id = :id'");
  $query->BindValue(':senha', $senha, PDO::PARAM_STR);
  $query->BindValue(':id', 112);
  //$query->execute();
  $userCont = $query->fetch();


    if($userCont == 1){
    
    
    
    //$novasenha = $senha;
    $response['status'] = '200';
    $response['message'] = 'Senha alterada com sucesso!';

    echo json_encode($response);
  }
?>