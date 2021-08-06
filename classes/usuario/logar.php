<?php
    session_start();

    // os erros sao ocultados nessa pagina pois se alguem digitar alguma aspas vai acontecer um erro na hora de fazer a query no banco de dados, por isso foi retirado a exibicao de erros e feito um try catch logo abaixo
    error_reporting(0);
    ini_set(“display_errors”, 0 );

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


        try{

            $id = $u->id($user);
    
        }
        catch(PDOException $e){

            echo "<script>alert('Usuário ou senha invalidos! por favor digite novamente.');</script>";
            $url = '../../index.php';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
            
        }

       
        $_SESSION['user'] = $user;
        $_SESSION['permissao'] = $u->permissao($user);
      
        // nessa parte sera atribuido a variavel de sessao "permissaoString" sua permissao de usuario, afim de ser usado nas paginas mais a frente para indicar os diretorios de cada usuario logado, pois algumas telas necessitam da raiz do usuario, ex:  $url = '/paginas/admin/main.php?pagina=../../classes/informativo/visualizar_informativo'; note que exiustem um "admin" nesse diretorio com isso caso o usuario supervisor estivesse logado ele nao conseguiria ir para essa pagina pois quando fosse validar a sua permissao, a mesma iria ser divergente com a necessaria (2 != 3) e com isso voltaria para o diretorio: '/'
        switch($_SESSION['permissao']) {
            case 1:
                $_SESSION['permissaoString'] = 'comum';
                break;
            case 2:
                $_SESSION['permissaoString'] = 'supervisor';
                break;
            case 3:
                $_SESSION['permissaoString'] = 'admin';
                break;
        }

  

        $_SESSION['nome'] = $u->nome($user);
        $_SESSION['email'] = $u->email($user);
        $_SESSION['telefone'] = $u->telefone($user);
        $_SESSION['id'] = $u->id($user);
        
        // BLOCO DE LOGIN USUARIO COMUM
        if($u->login($user, $pass) == true && $u->permissao($user) == 1 && $u->verificaExclusao($user) == 0){

            if($u->verificaAtivo($id) == 1){

                $_SESSION['logado'] = 1;
                header("location: ../../paginas/comum/main.php");


            }
            else{
                echo "<script>alert('Usuário desativado!, por favor entre em contato com o Administrador do sistema!');</script>";
                $url = '../../index.php';
                echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

            }
        
        }

        // BLOCO DE LOGIN USUARIO SUPERVISOR
        elseif($u->login($user, $pass) == true && $u->permissao($user) == 2 && $u->verificaExclusao($user) == 0 ){

            if($u->verificaAtivo($id) == 1){

                $_SESSION['logado'] = 1;
                header("location: ../../paginas/supervisor/main.php");


            }
            else{
                echo "<script>alert('Usuário desativado!, por favor entre em contato com o Administrador do sistema!');</script>";
                $url = '../../index.php';
                echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

            }
            
        }

        //BLOCO DE LOGIN USUARIO ADMINISTRADOR
        elseif($u->login($user, $pass) == true && $u->permissao($user) == 3  && $u->verificaExclusao($user) == 0 ){
            
            if($u->verificaAtivo($id) == 1){

                $_SESSION['logado'] = 1;
                header("location: ../../paginas/admin/main.php");


            }
            else{
                echo "<script>alert('Usuário desativado!, por favor entre em contato com o Administrador do sistema!');</script>";
                $url = '../../index.php';
                echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

            }

            
            
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
