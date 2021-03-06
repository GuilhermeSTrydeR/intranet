<?php

    $db="localhost";
    $usuario="root";
    $password="";
    $banco="unimedtc_intranet";

    global $pdo;

    try{
        $pdo = new PDO("mysql:dbname=".$banco."; host".$db, $usuario, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->query("SELECT * FROM usuarios");
        $sql->execute();

        // verificar o numero de registro cadastrados no banco
        // echo $sql->rowCount();

    }catch(PDOException $e){
        // echo "<h4>ERRO: NÃO FOI POSSIVEL SE CONECTAR AO BANCO DE DADOS: ".$e->getMessage()."</h4>";
        //em vez da mensagem de erro, será exibido essa tela de erro
        include("paginas/erros/conexao_banco.php");
        exit;

    }

?>