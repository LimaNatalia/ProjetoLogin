<?php
	function verifica_dados($conn){
		if(isset($_POST['env']) && $_POST['env'] == "form"){
			$email = addslashes($_POST['email']);
			$query = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
			$query->bindValue("s", $email, PDO::PARAM_STR);
			$query->execute();
			$userCont = $query->fetch();
		
			if($userCont > 0){
				$dados = $userCont->fetch();
				add_dados_recover($conn, $email);
			}else{
				
			}
		}
	}

	function add_dados_recover($conn, $email){
		$senha = (rand());
		$query = $conn->prepare("INSERT INTO recover_solicitation (email, senha) VALUES (?, ?)");
		$query->bindValue("ss", $email, $senha, PDO::PARAM_STR);
		$query->execute();

		if($query->affected_rows > 0){
			enviar_email($conn, $email, $senha);
		}
	}

	function enviar_email($conn, $email, $senha){
		$destinatario = $email;

		$subject = "RECUPERAR SENHA";
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		$message = "<html><head>";
		$message .= "
			<h2>Você solicitou uma nova senha?</h2>
			<hr>
			<h3>Se sim, aqui está o link para você recuperar a sua senha:</h3>
			<p>Para recuperar sua senha, acesse este link: <a href='".sitedir."?pagina=alterar&senha={$senha}'>".sitedir."?pagina=alterar&senha={$senha}</a></p>
			<hr>
			<h5>Não foi você quem solicitou? Se não ignore este email, porém alguém tentou alterar seus dados.</h5>
			<hr>
			Atenciosamente, Tutoriais e Informática.
		";

		$message .="</head></html>";

		if(mail($destinatario, $subject, $message, $headers)){
			echo "<div class='alert alert-success'>Os dados foram enviados para o seu email. Acesse para recuperar.</div>";
		}else{
			echo "<div class='alert alert-danger'>Erro ao enviar</div>";
		}
	}

	function verifica_senha($conn, $senha){
	$query = $conn->prepare("SELECT * FROM recover_solicitation WHERE senha = ? AND status = 0");
	$query->bindValue("s", $senha, PDO::PARAM_STR);
	$query->execute();
		$get =$query->get_result();
		$total = $get->num_rows;

		if($total > 0){
			if(isset($_POST['env']) && $_POST['env'] == "upd"){
			$nsenha = addslashes($_POST['senha']);
			
			$dados = $get->fetch_assoc();
			atualiza_senha($conn, $dados['email'], $nsenha);
			deleta_senhas($conn, $dados['email']);
			echo "<br><div class='alert alert-success'>Senha alterada com sucesso.</div>";
			redireciona("?pagina=inicio");
			}
		}else{
			echo "<br><div class='alert alert-danger'>senha inválida.</div>";
		}
	}

	function atualiza_senha($conn, $email, $senha){
	$query = $conn->prepare("UPDATE usuarios SET senha = ? WHERE email = ?");
	$query->bindValue("ss", $senha, $email, PDO::PARAM_STR);
	$query->execute();

		if($query->affected_rows > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleta_senhas($conn, $email){
		$query = $conn->prepare("DELETE FROM recover_solicitation WHERE email = ?");
		$query->bindValue("s", $email, PDO::PARAM_STR);
		$query->execute();

		if($query->affected_rows > 0){
			return true;
		}else{
			echo $conn->error;
		}
	}

	function redireciona($dir){
		echo "<meta http-equiv='refresh' content='3; url={$dir}'>";
	}

?>