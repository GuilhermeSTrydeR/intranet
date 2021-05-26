
<?php
    class Acesso{

        
        public function criarGrupo(){

            global $pdo;
            $sql = "INSERT INTO acesso_grupo(id, nome, ativo) VALUES('1', 'Publico', '1')";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("nome", $nome);
         
            $sql->execute();
            
        }

        public function truncateAcesso(){

            global $pdo;
            $sql = "TRUNCATE TABLE acesso_grupo";
            $sql = $pdo->prepare($sql);
         
            $sql->execute();
            
        }
   

        public function gravar($nome, $link, $ativo, $grupo){

            global $pdo;
            $sql = "INSERT INTO acesso(nome, link, ativo, grupo) VALUES(:nome, :link, :ativo, :grupo)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("nome", $nome);
            $sql->bindValue("link", $link);
            $sql->bindValue("ativo", $ativo);
            $sql->bindValue("grupo", $grupo);
         
            $sql->execute();
            
        }
        public function gravarGrupoAcesso($nome, $ativo, $permissao){

            global $pdo;
            $sql = "INSERT INTO acesso_grupo(nome, ativo, permissao) VALUES(:nome, :ativo, :permissao)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("nome", $nome);
            $sql->bindValue("ativo", $ativo);
            $sql->bindValue("permissao", $permissao);
         
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

        public function editarGrupoAcesso($id, $nome, $ativo, $permissao){

            global $pdo;
            $sql = "UPDATE acesso_grupo SET nome = :nome, ativo = :ativo, permissao = :permissao WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
 
            $sql->bindValue("nome", $nome);
            $sql->bindValue("ativo", $ativo);
            $sql->bindValue("permissao", $permissao);
          
            $sql->execute();

            
        }

        

        public function apagarAcesso($id){


            global $pdo;
            $sql = "UPDATE acesso SET excluido = '1' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();


            $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_acesso';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

  
            
        }

        public function apagarGrupoAcesso($id){


            global $pdo;
            $sql = "UPDATE acesso_grupo SET excluido = '1' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            $sql = "UPDATE acesso SET excluido = '1' WHERE grupo = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();


            // $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_grupo_acesso';
            // echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

  
            
        }

        

        
        public function desabilitarAcesso($id){


            global $pdo;
            $sql = "UPDATE acesso SET ativo = '0' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            // $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_acesso';
            // echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
            
        }

        public function desabilitarGrupoAcesso($id){


            global $pdo;
            $sql = "UPDATE acesso_grupo SET ativo = '0' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            // $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_acesso';
            // echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
            
        }

        public function habilitarAcesso($id){


            global $pdo;
            $sql = "UPDATE acesso SET ativo = '1' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            // $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_acesso';
            // echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

  
            
        }

        public function habilitarGrupoAcesso($id){


            global $pdo;
            $sql = "UPDATE acesso_grupo SET ativo = '1' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            // $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_acesso';
            // echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

  
            
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

        public function retornaPermissao($id){
            global $pdo;
            
            $sql = "SELECT permissao FROM acesso_grupo WHERE id = '$id'";
            $stmt = $pdo->prepare( $sql );
            $stmt->bindParam( ':id', $id );        
            $stmt->execute();

            $res = $stmt->fetchColumn();
    
        
            return $res;

        }

        public function retornaGrupoAtivo($id){
            global $pdo;
            
            $sql = "SELECT ativo FROM acesso_grupo WHERE id = '$id'";
            $stmt = $pdo->prepare( $sql );
            $stmt->bindParam( ':id', $id );        
            $stmt->execute();

            $res = $stmt->fetchColumn();
    
        
            return $res;

        }

      

        public function retornaNome($id){
            global $pdo;
            
            $sql = "SELECT nome FROM acesso_grupo WHERE id = '$id'";
            $stmt = $pdo->prepare( $sql );
            $stmt->bindParam( ':id', $id );        
            $stmt->execute();

            $res = $stmt->fetchColumn();
    
        
            return $res;

        }

    }
?>