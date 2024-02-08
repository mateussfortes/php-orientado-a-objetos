<?php 

class Cidade {

    public static function all() {

        $host = 'postgres';
        $user = 'db_user';
        $pass = 'db_password';
        $db = 'livro';
    
        $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    
        $query = 'SELECT id, nome FROM cidade';
    
        $result = $conn->query($query);
    
        return $result->fetchAll(PDO::FETCH_ASSOC);
                
    }


}