<?php
    $dados = $_POST;

    $host = 'postgres';
    $user = 'db_user';
    $pass = 'db_password';
    $db = 'livro';

    if($dados['id']) {
        
        try {

            $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
          
            $sql = "UPDATE pessoa SET nome = '{$dados['nome']}',
                endereco = '{$dados['endereco']}',
                bairro = '{$dados['bairro']}',
                telefone = '{$dados['telefone']}',
                email = '{$dados['email']}',
                id_cidade = '{$dados['id_cidade']}'
                WHERE id = {$dados['id']}";
    
            //var_dump($sql);
            
            //die;
            
            $conn->exec($sql);

            print 'Atualizado com sucesso';
        
            $conn = null;
    
        } catch(PDOException $e) {
    
            print "Erro!: ". $e->getMessage()."\n";
            
        }

    }


    
