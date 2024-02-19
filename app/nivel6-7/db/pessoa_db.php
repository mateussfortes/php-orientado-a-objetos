<?php 

function lista_pessoas() {
    
    $host = 'postgres';
    $user = 'db_user';
    $pass = 'db_password';
    $db = 'livro';

    $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);

    $query = 'SELECT * FROM pessoa ORDER BY id';

    $result = $conn->query($query);

    $row = $result->fetchAll(PDO::FETCH_ASSOC);

    $conn = null;

    return $row;

}

function exclui_pessoas($id) {

    $host = 'postgres';
    $user = 'db_user';
    $pass = 'db_password';
    $db = 'livro';

    $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
          
    $sql = "DELETE FROM pessoa WHERE id = {$dados['id']}";
   
    $result = $conn->exec($sql);
    
    $conn = null;

    return $result;

}

function get_pessoa($id) {

    $host = 'postgres';
    $user = 'db_user';
    $pass = 'db_password';
    $db = 'livro';

    $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    
    $id = (int) $_GET['id'];

    $query = "SELECT * FROM pessoa WHERE id='{$id}'";

    $result = $conn->query($query);

    $pessoa = $result->fetch(PDO::FETCH_ASSOC);

    $conn = null;

    return $pessoa;

}

function get_next_pessoa() {

    $host = 'postgres';
    $user = 'db_user';
    $pass = 'db_password';
    $db = 'livro';

    $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);

    $query = 'SELECT max(id) as next FROM pessoa';
        
    $result = $conn->query($query);
        
    $next = (int) $result->fetch(PDO::FETCH_ASSOC)['next'] + 1;

    $conn = null;

    return $next;

}

function insert_pessoa($pessoa) {
    $host = 'postgres';
    $user = 'db_user';
    $pass = 'db_password';
    $db = 'livro';

    $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);

    $sql = "INSERT INTO pessoa (id, 
        nome,
        endereco,
        bairro,
        telefone,
        email,
        id_cidade)
    VALUES ({$pessoa['id']},
        '{$pessoa['nome']}',
        '{$pessoa['endereco']}',
        '{$pessoa['bairro']}',
        '{$pessoa['telefone']}',
        '{$pessoa['email']}',
        '{$pessoa['id_cidade']}'
    )";

    $result = $conn->exec($sql);

    $conn = null;

    return $result;

}

function update_pessoa($pessoa) {

    $host = 'postgres';
    $user = 'db_user';
    $pass = 'db_password';
    $db = 'livro';

    $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);

    $sql = "UPDATE pessoa SET nome = '{$pessoa['nome']}',
    endereco = '{$pessoa['endereco']}',
    bairro = '{$pessoa['bairro']}',
    telefone = '{$pessoa['telefone']}',
    email = '{$pessoa['email']}',
    id_cidade = '{$pessoa['id_cidade']}'
    WHERE id = {$pessoa['id']}";

    //var_dump($sql);
    
    //die;
    
    $result = $conn->exec($sql);

    return $result;

}