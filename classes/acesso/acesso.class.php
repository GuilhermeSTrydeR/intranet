
<?php
    class Acesso{
   

        public function gravar($nome, $link, $ativo){

            global $pdo;
            $sql = "INSERT INTO acesso(nome, link, ativo) VALUES(:nome, :link, :ativo)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("nome", $nome);
            $sql->bindValue("link", $link);
            $sql->bindValue("ativo", $ativo);
         
            $sql->execute();
            
        }

        public function editar($id, $nome, $link, $ativo){

            global $pdo;
            $sql = "UPDATE acesso SET nome = :nome, link = :link, ativo = :ativo WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
 
            $sql->bindValue("nome", $nome);
            $sql->bindValue("link", $link);
            $sql->bindValue("ativo", $ativo);
          
            $sql->execute();

            
        }

        public function apagarAcesso($id){


            global $pdo;
            $sql = "UPDATE acesso SET excluido = '1' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            echo "<script>alert('Acesso Excluido com Sucesso!');</script>";
            $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_acesso';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

  
            
        }

        
        public function desabilitarAcesso($id){


            global $pdo;
            $sql = "UPDATE acesso SET ativo = '0' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_acesso';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
            
        }

        public function habilitarAcesso($id){


            global $pdo;
            $sql = "UPDATE acesso SET ativo = '1' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_acesso';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

  
            
        }
        
        

        public function retornaAtivo($id){
            global $pdo;
            
            $sql = "SELECT ativo FROM acesso WHERE id = '$id'";
            $stmt = $pdo->prepare( $sql );
            $stmt->bindParam( ':id', $id );        
            $stmt->execute();

            $res = $stmt->fetchColumn();
    
        
            return $res;

        }

    }
?>