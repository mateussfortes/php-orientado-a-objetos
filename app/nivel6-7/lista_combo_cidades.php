<?php

function lista_combo_cidades($id = null) {
    
    $output = "";

    $host = 'postgres';
    $user = 'db_user';
    $pass = 'db_password';
    $db = 'livro';

    $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);

    $query = 'SELECT id, nome FROM cidade';

    $result = $conn->query($query);

    if($result) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $check = ($row['id'] == $id) ? 'selected=1' : "";
            $output .= "<option $check value='{$row['id']}'>{$row['nome']} </option>"; 
        }
    }
    $conn = null;
    return $output;

    
}