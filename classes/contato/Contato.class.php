
<?php
    class Contato{
     
        public function gravar($nome, $setor, $email, $telefone, $nasc){

            global $pdo;
            $sql = "INSERT INTO contato(nome, setor, email, telefone, nasc) VALUES(:nome, :setor, :email, :telefone, :nasc)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("nome", $nome);
            $sql->bindValue("setor", $setor);
            $sql->bindValue("email", $email);
            $sql->bindValue("telefone", $telefone);
            $sql->bindValue("nasc", $nasc);

            $sql->execute();
            
        }

        public function editar($id, $nome, $setor, $email, $telefone, $nasc){

            global $pdo;
            $sql = "UPDATE contato SET nome = :nome, setor = :setor, email = :email, telefone = :telefone, nasc = :nasc WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
          
            $sql->bindValue("nome", $nome);
            $sql->bindValue("setor", $setor);
            $sql->bindValue("email", $email);
            $sql->bindValue("telefone", $telefone);
            $sql->bindValue("nasc", $nasc);
     
            
            $sql->execute();

            echo "<script>alert('Contato Alterado com Sucesso!');</script>";
            $url = '/paginas/admin/main.php?pagina=../../classes/contato/visualizar_contato';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
            
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
        
        public function retornaAtivo($id){

            global $pdo;
            
            $sql = "SELECT ativo FROM contato WHERE id = '$id'";
            $stmt = $pdo->prepare( $sql );
            $stmt->bindParam( ':id', $id );        
            $stmt->execute();

            $res = $stmt->fetchColumn();
    
        
            return $res;



        }

        public function desabilitarContato($id){

            global $pdo;
            $sql = "UPDATE contato SET ativo = '0' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();
        


        }

        public function habilitarContato($id){
        
            global $pdo;
            $sql = "UPDATE contato SET ativo = '1' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();

           
        }
       

    }
?>