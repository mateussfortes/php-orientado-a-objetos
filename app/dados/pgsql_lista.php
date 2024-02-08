<?php 

$conn = pg_connect("host=postgres dbname=livro user=db_user password=db_password");

$query = 'SELECT codigo, nome FROM famosos';

$result = pg_query($conn, $query);

if($result) {
    
    while($row = pg_fetch_assoc($result)) {
        echo $row['codigo'] . '-' . $row['nome'] . "<br>\n";
    }

}


pg_close($conn);