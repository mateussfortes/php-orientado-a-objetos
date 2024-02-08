<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar pessoa</title>
    <link href="css/form.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    
<?php 


    if(!empty($_REQUEST['action'])) {
    
        $host = 'postgres';
        $user = 'db_user';
        $pass = 'db_password';
        $db = 'livro';
        
        $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);

        if($_REQUEST['action'] == 'edit') {

            $id = (int) $_GET['id'];

            $query = "SELECT * FROM pessoa WHERE id='{$id}'";

            $result = $conn->query($query);

            $pessoa = $result->fetch(PDO::FETCH_ASSOC);

        }
        else if($_REQUEST['action'] == 'save') {
            $pessoa = $_POST;
            if(empty($_POST['id'])) {

                $query = 'SELECT max(id) as next FROM pessoa';
        
                $result = $conn->query($query);
                 
                $next = (int) $result->fetch(PDO::FETCH_ASSOC)['next'] + 1;

                $sql = "INSERT INTO pessoa (id, 
                    nome,
                    endereco,
                    bairro,
                    telefone,
                    email,
                    id_cidade)
                VALUES ({$next},
                    '{$pessoa['nome']}',
                    '{$pessoa['endereco']}',
                    '{$pessoa['bairro']}',
                    '{$pessoa['telefone']}',
                    '{$pessoa['email']}',
                    '{$pessoa['id_cidade']}'
                )";

                $result = $conn->exec($sql);

            }
            else {

                $sql = "UPDATE pessoa SET nome = '{$pessoa['nome']}',
                endereco = '{$pessoa['endereco']}',
                bairro = '{$pessoa['bairro']}',
                telefone = '{$pessoa['telefone']}',
                email = '{$pessoa['email']}',
                id_cidade = '{$pessoa['id_cidade']}'
                WHERE id = {$pessoa['id']}";
    
                //var_dump($sql);
                
                //die;
                
                $result = $conn->exec($sql);

            }

            print ($result) ? 'Registro salvo com sucesso!' : 'Erro ao salvar';

            $conn = null;

        }
        else {
            $pessoa = [];
            $pessoa['id'] = '';
            $pessoa['nome'] = '';
            $pessoa['endereco'] = '';
            $pessoa['bairro'] = '';
            $pessoa['telefone'] = '';
            $pessoa['email'] = '';
            $pessoa['id_cidade'] = '';
        }

        require_once 'lista_combo_cidades.php';

        $form = file_get_contents('html/form.html');

        $form = str_replace('{id}', $pessoa['id'], $form);
        $form = str_replace('{nome}', $pessoa['nome'], $form);
        $form = str_replace('{endereco}', $pessoa['endereco'], $form);
        $form = str_replace('{bairro}', $pessoa['bairro'], $form);
        $form = str_replace('{telefone}', $pessoa['telefone'], $form);
        $form = str_replace('{email}', $pessoa['email'], $form);
        $form = str_replace('{cidades}', lista_combo_cidades($pessoa['id_cidade']), $form);
        print $form;
    }

?>

    

</body>
</html>