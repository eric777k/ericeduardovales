<?php
include_once 'funcoes.php';
include 'conexao.php';
//if($_SERVER['REQUEST_METHOD'] == "POST"){
    // echo"</PRE";
    // print_r($_POST);
    // echo"</PRE";
    // exit;
//}

   if(isset($_GET['acao']) && $_GET['acao']== 'excluir') {
    
    $id = $_GET['id'];
    
    if ($id > 0) {
        $con = abrirBanco();
        $sql = "DELETE FROM vale WHERE id = $id";
        if ($con->query($sql) === true){
            echo "<script>alert ('contato excluido com sucesso')</script>";
        }
        else {
            
        }
    } 
else {

}
fecharBanco($con);
   }




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Vales</title>
</head>
<body>
    <h1 class="titulo">Gerenciar Vales</h1>
<hr>
    <h2 class="subtitulo">cadastrar vales</h2>
<hr>
<form action="">
    <label for="" class="label">Descrição</label><br>
    <input type="text" class="input"><br><br>
    <label for="" class="label">Data Do Vale</label><br>
    <input type="date" class="input"><br><br>
    <label for="" class="label">Valor</label><br>
    <input type="number" class="input"><br><br>
    <input class="button" type="submit" value="cadastrar"><br>

<br>

   
        <table border="1">
            <thead>
                <tr>
                    <td>Data De Cadastro</td>
                    <td>Data Do Vale</td>
                    <td>Descrição</td>
                    <td>Valor</td>
                    <td>Acoes</td>
                    
                </tr>
            </thead>

            <tbody>


            <?php  
$con = abrirBanco(); 
$sql = "SELECT id, valor, data_do_vale, atualizado_em, criado_em
FROM vale";
$result = $con->query($sql);
//$registros = $result->fetch_assoc();
if ($result->num_rows > 0){
while ($registros = $result->fetch_assoc()){
  ?>
<tr>
    <td> <?= $registros['id'] ?></td>
    <td> <?= $registros['valor'] ?></td>
    
    <td> <?= date("d/m/Y", strtotime($registros['data_do_vale']))?></td>
    <td> <?= Date("d/m/Y", strtotime($registros['atualizado_em']))?></td>
    <td> <?= date("d/m/Y", strtotime($registros['criado_em']))?></td>

    <td> 

    <a href="editar.php?acao=editar&id=<?= $registros['id'] ?>"> <button> editar</button></a>
    <a href="?acao=excluir&id=<?= $registros['id'] ?>" onclick="return confirm('tem certeza que deseja excluir')"> <button> excluir </button></a>
    </td>
</tr>

<?php
}
}
else {?>

<tr>
    <td colspan='7'>Nenhum registro no banco de dados</td>
</tr>

<?php
}
?>


                </tbody>
        </table> 
<hr>
        <h5>total de vales</h5>
        <hr>
</form>
</body>
</html>


