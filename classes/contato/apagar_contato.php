<?php   
       
        $id = $_GET['id'];


        //requer o contato.class onde o comando para gravar no banco ja esta pronto
        require("Contato.class.php");
        
        //aqui instanciamos a classe
        $c = new Contato();
        
        $c->desativarContato($id);
       


?>