<?php

    $host = '127.0.0.1';
    $userdb = 'rcena';
    $senhadb = '12341234';
    $banco = 'manole'; 

   /*  $host = 'manole.clo6xea6fg90.us-east-1.rds.amazonaws.com';
    $userdb = 'homolog';
    $senhadb = 'h2m0l1g4';
    $banco = 'integra_moodle_tray'; */

    try{
        $conn = new PDO('mysql:host='.$host.';dbname='.$banco.'', $userdb, $senhadb);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    }
    catch (Exception $e) {  
        $error = $e;      
        $response['status'] = '400';
        $response['message'] = 'Erro na solitação, tente mais tarde!';      
       
    }
  
    

?>