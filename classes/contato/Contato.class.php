
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

        public function editar($id, $nome, $setor, $email, $telefone){

            global $pdo;
            $sql = "UPDATE usuarios SET nome = :nome, setor = :setor, email = :email, telefone = :telefone WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
 
            $sql->bindValue("nome", $nome);
            $sql->bindValue("setor", $setor);
            $sql->bindValue("email", $email);
            $sql->bindValue("telefone", $telefone);
     
            
            $sql->execute();
            echo "<script>alert('Contato alterado com sucesso!');</script>";
            
        }

        public function desativarContato($id){
            
            global $pdo;
            $sql = "UPDATE contato SET excluido = '1' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            echo "<script>alert('Contato Excluido com Sucesso!');</script>";
            $url = '/paginas/admin/main.php?pagina=../../classes/contato/visualizar_contato';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

        }
        

       

    }
?>