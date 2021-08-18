
<?php
    class Aniversario{
     
        public function gravar($nome, $setor, $nasc){

            global $pdo;
            $sql = "INSERT INTO aniversario(nome, setor, nasc) VALUES(:nome, :setor, :nasc)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("nome", $nome);
            $sql->bindValue("setor", $setor);
            $sql->bindValue("nasc", $nasc);

            $sql->execute();
            
        }

        public function retornaAtivo($id){

            global $pdo;
            
            $sql = "SELECT ativo FROM aniversario WHERE id = '$id'";
            $stmt = $pdo->prepare( $sql );
            $stmt->bindParam( ':id', $id );        
            $stmt->execute();

            $res = $stmt->fetchColumn();
    
        
            return $res;

        }
        public function habilitarAniversario($id){
        
            global $pdo;
            $sql = "UPDATE aniversario SET ativo = '1' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();

        }

        public function desabilitarAniversario($id){

            global $pdo;
            $sql = "UPDATE aniversario SET ativo = '0' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();
        


        }

        public function desativarAniversario($id){
            
            global $pdo;
            $sql = "UPDATE aniversario SET excluido = '1' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            echo "<script>alert('Usuario Excluido com Sucesso!');</script>";
            $url = '/paginas/admin/main.php?pagina=../../classes/aniversarios/visualizar_aniversario';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

        }

        public function editar($id, $nome, $setor, $nasc){


            global $pdo;
            $sql = "UPDATE aniversario SET nome = :nome, setor = :setor, nasc = :nasc WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
 
            $sql->bindValue("nome", $nome);
            $sql->bindValue("setor", $setor);
            $sql->bindValue("nasc", $nasc);
            
            $sql->execute();
            echo "<script>alert('Aniversario alterado com sucesso!');</script>";
            $url = '/paginas/admin/main.php?pagina=../../classes/aniversarios/visualizar_aniversario';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
            
        }

    }
?>