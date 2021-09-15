<?php

  include_once ('config.php');
  
  //verifica se uma variável é existente ou se ela não possui o valor igual a null
  if(isset($_POST));{
    $nome = $_POST["nome"];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $voucher = $_POST['voucher'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
  
    //recupera dados de uma ou mais tabelas ou expressões
    $query = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $userCont = $query->fetch();

    if($userCont[0] > 0){
      $response['status'] = '400';
      $response['message'] = 'Email já Cadastrado!';

      //converte um objeto PHP para uma string JSON
      echo json_encode($response);

    }else{
      //adiciona um ou vários registros a uma tabela do banco de dados
      $query = $conn->prepare("INSERT INTO usuarios (nome, cpf, telefone, voucher, email, senha)
      VALUES ('$nome', '$cpf', '$telefone', '$voucher', '$email', '$senha')" );
      $query->bindValue(':nome', $nome, PDO::PARAM_STR);
      $query->bindValue(':cpf', $cpf, PDO::PARAM_STR);
      $query->bindValue(':telefone', $telefone, PDO::PARAM_STR);
      $query->bindValue(':voucher', $voucher, PDO::PARAM_STR);
      $query->bindValue(':email', $email, PDO::PARAM_STR);
      $query->bindValue(':senha', $senha, PDO::PARAM_STR);
      $query->execute();
      $userCont = $query->fetch(); 
    

        $response['status'] = '200';
        $response['message'] = 'Cadastro Feito!';
        $response['Usuario'] = $userCont;
        
        echo json_encode($response);
    }
}
?>