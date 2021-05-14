<?php
        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o contato.class onde o comando para gravar no banco ja esta pronto
        require("usuario.class.php");

        //configuracoes basicas, nesse caso, configuracoes de fuso horario
        require("../../config/config.php");

     
        //aqui instanciamos a classe
        $u = new Usuario();


        //aqui adicionamos um nivel basico de seguranca
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $permissao = $_POST["permissao"];
        $telefone = $_POST["telefone"];
        $setor = $_POST["setor"];
        
   
      


        $u->editar($id, $nome, $email, $pass, $permissao, $telefone, $setor);
        
       
       
        $url = '/paginas/admin/main.php?pagina=../../classes/usuario/visualizar_usuario';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
        

        

?>