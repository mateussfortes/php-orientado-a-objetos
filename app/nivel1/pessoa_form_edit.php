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


    if(!empty($_GET['id'])) {
    
        $host = 'postgres';
        $user = 'db_user';
        $pass = 'db_password';
        $db = 'livro';
        
        $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);

        $id = (int) $_GET['id'];

        $query = "SELECT * FROM pessoa WHERE id='{$id}'";

        $result = $conn->query($query);

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $id = $row['id'];
        $nome = $row['nome'];
        $endereco = $row['endereco'];
        $bairro = $row['bairro'];
        $telefone = $row['telefone'];
        $email = $row['email'];
        $id_cidade = $row['id_cidade'];

    }

?>

    <form enctype="multipart/form-data" method="post" action="pessoa_save_update.php">
        <label>Código</label>
        <input type="text" name="id" readonly="1" type="text" value="<?=$id;?>">
        <label>Nome</label>
        <input type="text" name="nome" type="text" value="<?=$nome;?>">
        <label>Endereço</label>
        <input type="text" name="endereco" type="text" value="<?=$endereco;?>">
        <label>Bairro</label>
        <input type="text" name="bairro" type="text" value="<?=$bairro;?>">
        <label>Telefone</label>
        <input type="text" name="telefone" type="text" value="<?=$telefone;?>">
        <label>Email</label>
        <input type="text" name="email" type="text" value="<?=$email;?>">
        <label>Cidade</label>
        <select name="id_cidade">
            <?php 
                require_once 'lista_combo_cidades.php';
                print lista_combo_cidades($id_cidade);
            ?>
        <select>
        <input type="submit">
    </form>

</body>
</html>