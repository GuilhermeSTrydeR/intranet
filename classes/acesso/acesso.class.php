
<?php
    class Acesso{

        //essa funcao cria um novo grupo
        public function criarGrupo(){   

            global $pdo;
            $sql = "INSERT INTO acesso_grupo(id, nome, ativo) VALUES('1', 'Publico', '1')";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("nome", $nome);
         
            $sql->execute();
            
        }

        //essa funcao apaga(do banco) algum acesso, nao aconselhado usar!!!!!!
        public function truncateAcesso(){

            global $pdo;
            $sql = "TRUNCATE TABLE acesso_grupo";
            $sql = $pdo->prepare($sql);
         
            $sql->execute();
            
        }
   
        //essa funcao grava um novo acesso
        public function gravar($nome, $link, $ativo, $grupo, $permissao){

            global $pdo;
            $sql = "INSERT INTO acesso(nome, link, ativo, grupo, permissao) VALUES(:nome, :link, :ativo, :grupo, :permissao)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("nome", $nome);
            $sql->bindValue("link", $link);
            $sql->bindValue("ativo", $ativo);
            $sql->bindValue("grupo", $grupo);
            $sql->bindValue("permissao", $permissao);
         
            $sql->execute();
            
        }

        //essa funcao grava um novo grupod e acesso
        public function gravarGrupoAcesso($nome, $ativo, $permissao){

            global $pdo;
            $sql = "INSERT INTO acesso_grupo(nome, ativo, permissao) VALUES(:nome, :ativo, :permissao)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("nome", $nome);
            $sql->bindValue("ativo", $ativo);
            $sql->bindValue("permissao", $permissao);
         
            $sql->execute();
            
        }
        
        //essa funcao edita um acesso
        public function editar($id, $nome, $link, $ativo, $permissao, $grupo, $interno){

            global $pdo;
            $sql = "UPDATE acesso SET nome = :nome, link = :link, ativo = :ativo, permissao = :permissao, grupo = :grupo, interno = :interno WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
 
            $sql->bindValue("nome", $nome);
            $sql->bindValue("link", $link);
            $sql->bindValue("ativo", $ativo);
            $sql->bindValue("permissao", $permissao);
            $sql->bindValue("grupo", $grupo);
            $sql->bindValue("interno", $interno);
          
            $sql->execute();

            
        }
        
        //essa funcao edita um grupo de acessos
        public function editarGrupoAcesso($id, $nome, $ativo, $permissao, $interno){

            global $pdo;
            $sql = "UPDATE acesso_grupo SET nome = :nome, ativo = :ativo, permissao = :permissao, interno = :interno WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
 
            $sql->bindValue("nome", $nome);
            $sql->bindValue("ativo", $ativo);
            $sql->bindValue("permissao", $permissao);
            $sql->bindValue("interno", $interno);
          
            $sql->execute();

            
        }

        //essa funcao altera de 0 para 1 a coluna excluido da tabela acesso, fazendo assim com que aquele acesso fique inativo e nao apareca para o usuario, porem ainda vai estar registrado no banco
        public function apagarAcesso($id){


            global $pdo;
            $sql = "UPDATE acesso SET excluido = '1' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();


            $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_acesso';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

  
            
        }

        //essa funcao troca de 0 para 1 a coluna excluido da tabela acesso_grupo, fazendo assim com que aquele grupo de acesso fique inativo e nao apareca para o usuario, porem ainda vai estar registrado no banco
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

        

        //essa funcao altera de 1 para 0 a coluna ativo da tabela acesso, fazendo assim com que aquele acesso fique ativo e apareca para o usuario
        public function desabilitarAcesso($id){


            global $pdo;
            $sql = "UPDATE acesso SET ativo = '0' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            // $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_acesso';
            // echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
            
        }
        
        //essa funcao troca de 1 para 0 a coluna ativo da tabela acesso_grupo, fazendo assim com que aquele grupo de acesso fique ativo e apareca para o usuario
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

        public function retornaPermissaoAcesso($id){
            global $pdo;
            
            $sql = "SELECT permissao FROM acesso WHERE id = '$id'";
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