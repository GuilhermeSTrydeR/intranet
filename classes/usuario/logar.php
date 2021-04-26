<?php
    session_start();

    if(!isset($_POST['user']) && !isset($_POST['pass'])){

        header("Location: /");

    }

    if(isset($_POST["user"]) && !empty($_POST["user"]) && isset($_POST["pass"]) && !empty($_POST["pass"])){
        
        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o Usuario.class onde se encontra o comando para buscar no banco
        require("usuario.class.php");

        //aqui instanciamos a classe Usuario
        $u = new Usuario();

        $pass = addslashes($_POST["pass"]);
        $user = $_POST['user'];
        
        $_SESSION['user'] = $user;
        $_SESSION['permissao'] = $u->permissao($user);
        $_SESSION['nome'] = $u->nome($user);
        $_SESSION['email'] = $u->email($user);
        $_SESSION['telefone'] = $u->telefone($user);
        $_SESSION['id'] = $u->id($user);
        
        // BLOCO DE LOGIN USUARIO COMUM
        if($u->login($user, $pass) == true && $u->permissao($user) == 1){

            $_SESSION['logado'] = 1;
            header("location: ../../paginas/admin/main.php");
        
        }

        // BLOCO DE LOGIN USUARIO SUPERVISOR
        if($u->login($user, $pass) == true && $u->permissao($user) == 2 && $u->verificaExclusao($user) == 0){

            $_SESSION['logado'] = 1;
            header("location: ../../paginas/supervisor/main.php");
            
        }

        //BLOCO DE LOGIN USUARIO ADMINISTRADOR
        if($u->login($user, $pass) == true && $u->permissao($user) == 3 && $u->verificaExclusao($user) == 0){
            
            $_SESSION['logado'] = 1;
            header("location: ../../paginas/admin/main.php");
            
        }
   

        else{
   
            echo "<script>alert('Usuário ou senha invalidos! por favor digite novamente.');</script>";
            $url = '../../index.php';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
    
        }

    }

    else{
   
        echo "<script>alert('algo deu errado!, entre em contato com o administrador do sistema');</script>";
        $url = '../../index.php';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

    }

?>
