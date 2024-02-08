<?php
    $dados = $_GET;

    $host = 'postgres';
    $user = 'db_user';
    $pass = 'db_password';
    $db = 'livro';

    if(!empty($dados['id'])) {
        
        try {

            $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
          
            $sql = "DELETE FROM pessoa WHERE id = {$dados['id']}";
    
            //var_dump($sql);
            
            //die;
            
            $conn->exec($sql);

            print 'Deletado com sucesso';
        
            $conn = null;
    
        } catch(PDOException $e) {
    
            print "Erro!: ". $e->getMessage()."\n";
            
        }

    }


    
