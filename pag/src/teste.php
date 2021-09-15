<?php
include_once ('config.php');

$email = $_POST["email"];
$senha = $_POST["senha"];


$query = $conn->prepare ("UPDATE usuarios SET senha = :senha WHERE id = 111");
$query->execute();



?>