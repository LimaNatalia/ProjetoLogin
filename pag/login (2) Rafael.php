<?php
    $response = [];
    require_once "connection/connection.php";
    
    $user['usu_email'] = $_POST['email'];
    $user['usu_senha'] = $_POST['password'];   


    if (empty($user['usu_email']) || empty($user['usu_senha']) ) {
        $response['status'] = '404';
        $response['message'] = 'Usuario ou senha invalidos!';
        echo json_encode($response); 
        return; 
    }
    
    if(empty($error)){   

        $query = $conn->prepare("SELECT * FROM usuario WHERE usu_email = :email && usu_senha = :password");
        $query->bindValue(':email', $user['usu_email'], PDO::PARAM_STR);
        $query->bindValue(':password', $user['usu_senha'], PDO::PARAM_STR);  
        $query->execute();

        $userdb = $query->fetch();

        if (empty($userdb)) {
            $response['status'] = '404';
            $response['message'] = 'Usuario ou senha invalidos!';
            $response['teste'] =  $userdb;

        } else {

            //verifica se ja tem vinculo com o conteudo
            $query = $conn->prepare("SELECT * FROM usuario_has_conteudo WHERE usuario_usu_id = :usuario_id AND conteudo_id = :conteudo_id");
            $query->bindValue(':conteudo_id', 1, PDO::PARAM_INT);
            $query->bindValue(':usuario_id', $userdb['usu_id'], PDO::PARAM_INT);
            $query->execute();
            $userCont = $query->fetch();   

            if ($userCont){
                $response['status'] = '200';
                $response['message'] = 'Usuario logado';
                $response['username'] = $userdb['usu_nome'];
                $response['user_id'] = $userdb['usu_id'];

                session_start();
                $login =  $userdb['usu_id'];
                $_SESSION['login'] = $login;

                //cookies
                setcookie("user",$login , time() + (10*365*24*60*60));
                setcookie("teste",'testeee' , time() + (10*365*24*60*60));
                
            }else{
                $response['status'] = '404';
                $response['message'] = 'preencha o formulario';           
            }
            
        }
    }

    echo json_encode($response);   
    
?>