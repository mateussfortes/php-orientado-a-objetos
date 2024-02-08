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

        print '<table border=1>';
        print '<thead>';
        print '<tr>';
        print '<th></th>';
        print '<th></th>';
        print '<th>Id</th>';
        print '<th>Nome</th>';
        print '<th>Endereço</th>';
        print '<th>Bairro</th>';
        print '<th>Telefone</th>';
        print '</tr>';
        print '</thead>';
        print '<tbody>';
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $nome = $row['nome'];
            $endereco = $row['endereco'];
            $bairro = $row['bairro'];
            $telefone = $row['telefone'];

            print '<tr>';
                print "<td align='center'>
                    <a href='pessoa_form_edit.php?id={$id}'>edit</a>
                </td>";
                print "<td align='center'>
                    <a href='pessoa_form_delete.php?id={$id}'>delete</a>
                </td>";
                print "<td align='center'>{$id}</td>";
                print "<td align='center'>{$nome}</td>";
                print "<td align='center'>{$endereco}</td>";
                print "<td align='center'>{$bairro}</td>";
                print "<td align='center'>{$telefone}</td>";
            print "</tr>";
        }

        print '</tbody>';
        print '</table>';
    
        $conn = null;

    ?>
    
    <a href="pessoa_form_insert.php">Inserir</a>

</body>
</html>