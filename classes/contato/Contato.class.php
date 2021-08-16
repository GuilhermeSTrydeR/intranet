
<?php
    class Contato{
     
        public function gravar($nome, $setor, $email, $telefone){

            global $pdo;
            $sql = "INSERT INTO contato(nome, setor, email, telefone) VALUES(:nome, :setor, :email, :telefone)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("nome", $nome);
            $sql->bindValue("setor", $setor);
            $sql->bindValue("email", $email);
            $sql->bindValue("telefone", $telefone);

            $sql->execute();
            
        }

       

    }
?>