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

        require_once 'classes/Pessoa.php'; 
        
        try {
            if(!empty($_GET['action']) AND $_GET['action'] == 'delete') {
                $id = (int) $_GET['id'];
                Pessoa::delete($id);
            }
            $pessoas = Pessoa::all();

        }
        catch(Exception $e) {
            print $e->getMessage();
        }

        $items = '';
       
        if($pessoas) {

            foreach($pessoas as $pessoa) {
                $item = file_get_contents('html/item.html');
                $item = str_replace('{id}', $pessoa['id'], $item);
                $item = str_replace('{nome}', $pessoa['nome'], $item);
                $item = str_replace('{endereco}', $pessoa['endereco'], $item);
                $item = str_replace('{bairro}', $pessoa['bairro'], $item);
                $item = str_replace('{telefone}', $pessoa['telefone'], $item);
                $items.= $item;
            }

        }

        $list = file_get_contents('html/list.html');
        $list = str_replace('{items}', $items, $list);

        print $list;

    ?>
    
</body>
</html>