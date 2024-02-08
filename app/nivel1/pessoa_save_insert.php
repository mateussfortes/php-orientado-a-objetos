<?php
    $dados = $_POST;

    $host = 'postgres';
    $user = 'db_user';
    $pass = 'db_password';
    $db = 'livro';

    try {
        $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);

        $query = 'SELECT max(id) as next FROM pessoa';
        
        $result = $conn->query($query);
         
        $next = (int) $result->fetch(PDO::FETCH_ASSOC)['next'] + 1;
    
        $sql = "INSERT INTO pessoa (id, 
            nome,
            endereco,
            bairro,
            telefone,
            email,
            id_cidade)
        VALUES ({$next},
            '{$dados['nome']}',
            '{$dados['endereco']}',
            '{$dados['bairro']}',
            '{$dados['telefone']}',
            '{$dados['email']}',
            '{$dados['id_cidade']}'
        )";

        //var_dump($sql);
        //die;
    
        $conn->exec($sql);
    
        $conn = null;

    } catch(PDOException $e) {

        print "Erro!: ". $e->getMessage()."\n";
        
    }

    
