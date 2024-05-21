<?php

    include 'conexao.php';
    
    // echo "<pre>";
    // print_r($_SERVER);
    // echo "</pre>";
    // exit;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
     // captura os dados digitados no form e salva em variaveis
     // para facilitar a manipulção dos dados
         
    $valor = $_POST['valor'];
    $data_do_vale = $_POST['data_do_vale'];
    $atualizado_em = $_POST['atualizado_em'];
    $criado_em = $_POST['criado_em'];
   

    // vamos abrir a conexão com o banco de dados
    $con = abrirBanco(); 

    // vamos criar o sql para realizar o insert dos dados no BD
    $sql = "INSERT INTO vale (valor, data_do_vale, atualizado_em,  criado_em)
            VALUES
            ('$valor', '$data_do_vale', '$atualizado_em', '$criado_em')";
         
         if ($con->query($sql) === TRUE) {
            echo "Sucesso ao cadastrar o contato";
        } else {
            echo "Erro ao cadastrar o contato";
        }

        fecharBanco($con);
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index1.css">
    <title>Agenda</title>
</head>
<body>
    <header>
        <h1>Agenda de Contatos</h1> 
   
    <nav> 
        <div class="div">
        <li> <a href="editar.php">editar</a></li>
        <li> <a href="index.php"> Home</a></li>
        <li> <a href="cadastrar.php"> cadastrar</a></li></div>
    </nav> </header>

    <section>
        <h2>cadastrar contato</h2>
        <form action="" method="post" enctype="multipart/form-data" class="form">
            
            <label for="valor">valor:</label>
            <input type="number" id="valor" placeholder="valor" name="valor"> <br>
            
            <label for="descricao">descricao:</label>
            <input type="text" id="descricao" placeholder="descricao" name="descricao"> <br>
            
            <label for="data_do_vale">data do vale:</label>
            <input type="date" id="data_do_vale" placeholder="data_do_vale" name="data_do_vale"> <br>

            

            <input type="Submit" value="Cadastrar">
        </form>
    </section>
</body>
</html>