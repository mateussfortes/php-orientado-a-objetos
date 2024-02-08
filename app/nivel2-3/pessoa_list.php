<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de pessoas</title>
    <link href="css/form.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>

    <?php

        $host = 'postgres';
        $user = 'db_user';
        $pass = 'db_password';
        $db = 'livro';

        $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);

        $query = 'SELECT * FROM pessoa ORDER BY id';

        $result = $conn->query($query);

        $items = '';
       
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $item = file_get_contents('html/item.html');
            $item = str_replace('{id}', $row['id'], $item);
            $item = str_replace('{nome}', $row['nome'], $item);
            $item = str_replace('{endereco}', $row['endereco'], $item);
            $item = str_replace('{bairro}', $row['bairro'], $item);
            $item = str_replace('{telefone}', $row['telefone'], $item);
            $items.= $item;
        }

        $list = file_get_contents('html/list.html');
        $list = str_replace('{items}', $items, $list);
        print $list;

        $conn = null;

    ?>
    
    <a href="pessoa_form_insert.php">Inserir</a>

</body>
</html>