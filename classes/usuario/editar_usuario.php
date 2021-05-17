<?php
        session_start();
        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o contato.class onde o comando para gravar no banco ja esta pronto
        require("usuario.class.php");

        //configuracoes basicas, nesse caso, configuracoes de fuso horario
        require("../../config/config.php");


        //aqui instanciamos a classe
        $u = new Usuario();

        // se caso foi digitado alguma senha no campo referente, essa nova senha sera salva
        if(isset($_POST["pass"]) && !empty($_POST["pass"])){


                $id = $_POST["id"];
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $pass = $_POST["pass"];
                $permissao = $_POST["permissao"];
                $telefone = $_POST["telefone"];
                $setor = $_POST["setor"];
                $configOuEdit = $_SESSION['configOuEdit'];

                $u->editar($id, $nome, $email, $pass, $permissao, $telefone, $setor);
                
        }

        // porem se nenhuma senha for digitada, a mesma senha sera preservada
        else{
                $id = $_POST["id"];
                $nome = $_POST["nome"];
                $email = $_POST["email"];

                $permissao = $_POST["permissao"];
                $telefone = $_POST["telefone"];
                $setor = $_POST["setor"];
                $configOuEdit = $_SESSION['configOuEdit'];
                
        
                $u->editarSemSenhaDigitada($id, $nome, $email, $permissao, $telefone, $setor);
                
        
        
                
                if($configOuEdit == 1){
                        $url = '../../';
                        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

                }
                elseif($configOuEdit == 0){
                        $url = '/paginas/admin/main.php?pagina=../../classes/usuario/visualizar_usuario';
                        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
                }
                
        }


      

        

?>