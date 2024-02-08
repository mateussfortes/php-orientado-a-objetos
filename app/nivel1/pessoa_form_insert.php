<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de pessoa</title>
    <link href="css/form.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    
    <form enctype="multipart/form-data" method="post" action="pessoa_save_insert.php">
        <label>Código</label>
        <input type="text" name="id" readonly="1" type="text">
        <label>Nome</label>
        <input type="text" name="nome" type="text">
        <label>Endereço</label>
        <input type="text" name="endereco" type="text">
        <label>Bairro</label>
        <input type="text" name="bairro" type="text">
        <label>Telefone</label>
        <input type="text" name="telefone" type="text">
        <label>Email</label>
        <input type="text" name="email" type="text">
        <label>Cidade</label>
        <select name="id_cidade">
            <?php 
                require_once 'lista_combo_cidades.php';
                print lista_combo_cidades();
            ?>
        <select>
        <input type="submit">
    </form>

</body>
</html>