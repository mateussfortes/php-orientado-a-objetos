<?php 

class Cidade {

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

    public static function all() {

        $conn = self::getConnection();
    
        $query = 'SELECT id, nome FROM cidade';
    
        $result = $conn->query($query);
    
        return $result->fetchAll(PDO::FETCH_ASSOC);
                
    }


}