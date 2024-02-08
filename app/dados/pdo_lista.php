<?php 

try {

    $conn = new PDO('pgsql:dbname=livro;user=postgres;password=;host=localhost');

    $query = 'SELECT codigo, nome FROM famosos';

    $result = $conn->query($query);

    if($result) {
        
        while($row = $result->fetch(PDO::FETCH_OBJ)) {
            echo $row->codigo . '-' . $row->nome . "<br>\n";
        }

    }

    $conn = null;

} catch(PDOException $e) {

    print "Erro!: ". $e->getMessage()."\n";

}