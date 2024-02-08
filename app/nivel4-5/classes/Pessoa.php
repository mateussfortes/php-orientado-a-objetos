<?php 

class Pessoa {

    public static function save($pessoa) {

        $host = 'postgres';
        $user = 'db_user';
        $pass = 'db_password';
        $db = 'livro';

        $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(empty($pessoa['id'])) {

            $query = 'SELECT max(id) as next FROM pessoa';
        
            $result = $conn->query($query);
                
            $pessoa['id'] = (int) $result->fetch(PDO::FETCH_ASSOC)['next'] + 1;

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
        
        } 
        else {

            $sql = "UPDATE pessoa SET nome = '{$pessoa['nome']}',
                endereco = '{$pessoa['endereco']}',
                bairro = '{$pessoa['bairro']}',
                telefone = '{$pessoa['telefone']}',
                email = '{$pessoa['email']}',
                id_cidade = '{$pessoa['id_cidade']}'
            WHERE id = {$pessoa['id']}";

        }

        return $conn->exec($sql);

    }

    public static function find($id) {

        $host = 'postgres';
        $user = 'db_user';
        $pass = 'db_password';
        $db = 'livro';

        $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM pessoa WHERE id='{$id}'";

        $result = $conn->query($query);

        return $result->fetch();

    }

    public static function all() {

        $host = 'postgres';
        $user = 'db_user';
        $pass = 'db_password';
        $db = 'livro';

        $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);

        $query = 'SELECT * FROM pessoa ORDER BY id';

        $result = $conn->query($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function delete($id) {
        
        $host = 'postgres';
        $user = 'db_user';
        $pass = 'db_password';
        $db = 'livro';

        $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
            
        $sql = "DELETE FROM pessoa WHERE id = {$id}";
    
        $result = $conn->exec($sql);
        
        $conn = null;

        return $result;
    }

}