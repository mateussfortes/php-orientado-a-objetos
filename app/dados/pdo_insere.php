<?php 

try {

    $conn = new PDO('pgsql:dbname=livro;user=postgres;password=;host=localhost');

    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (1, 'Érico Veríssimmo)");

    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (2, 'John Lennon)");

    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (3, 'Mahatma Gandhi')");

    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (4, 'Ayrton Senna')");

    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (5, 'Ayrton Senna')");

    $conn = null;

} catch(PDOException $e) {

    print "Erro!: ". $e->getMessage()."\n";
    
}