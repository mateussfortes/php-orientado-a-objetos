<?php 

class Pessoa {

    private static $conn;

    public static function getConnection() {

        if(empty(self::$conn)) {

            $conexao = parse_ini_file('config/livro.ini');
            $host = $conexao['host'];
            $user = $conexao['user'];
            $pass = $conexao['pass'];
            $db = $conexao['db'];
            
            self::$conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
            
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return self::$conn;

        }

    }

    public static function save($pessoa) {

        $conn = self::getConnection();

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

        $conn = self::getConnection();

        $query = "SELECT * FROM pessoa WHERE id='{$id}'";

        $result = $conn->query($query);

        return $result->fetch();

    }

    public static function all() {

        $conn = self::getConnection();

        $query = 'SELECT * FROM pessoa ORDER BY id';

        $result = $conn->query($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function delete($id) {
        
        $conn = self::getConnection();
            
        $sql = "DELETE FROM pessoa WHERE id = {$id}";
    
        $result = $conn->exec($sql);
        
        $conn = null;

        return $result;
    }

}