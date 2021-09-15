<?php


$host ='localhost';
$usuario = 'nlima';
$senha = "212100";
$bancodedados = 'formulario';

try{
    $conn = new PDO('mysql:host='.$host.';port=8889;dbname='.$bancodedados.'', $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    }
  
  catch (Exception $e) {  
    $error = $e;      
    $response['status'] = '400';
    $response['message'] = 'Erro na solitação, tente mais tarde!';      
    }
?>