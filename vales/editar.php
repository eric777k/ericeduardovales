<?php

    include 'conexao.php';
    include_once 'funcoes.php';
    if (isset($_GET['acao']) && $_GET['acao'] == 'editar'){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;

        $con = abrirBanco();
        $sql = "select * from vale where id = ?";
        $pegardados = $con->prepare($sql);
        $pegardados->bind_param("i", $id);
        $pegardados->execute();
       $result = $pegardados->get_result();

       if($result->num_rows == 1){
        $registro = $result->fetch_assoc();
        
       }
    else {
        echo "nenhum registro encontrado";
        exit;
    }
    $pegardados->close();
    fecharBanco($con);
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id= $_POST['id'];
        $valor = $_POST['valor'];
        $data_do_vale = $_POST['data_do_vale'];
        $atualizado_em = $_POST['atualizado_em'];
        $criado_em = $_POST['criado_em'];
       

        $con=abrirBanco();

        $sql="UPDATE vale SET valor = '$valor', data_do_vale = '$data_do_vale', atualizado_em = '$atualizado_em', 
        criado_em = '$criado_em' WHERE id = $id";

        if($con->query($sql) === true){
            echo "sucesso ao cadastrar contato";
        }
        else 
        {
            echo "erro ao cadastrar contatos";
        }
        fecharBanco($con);
    }
?>