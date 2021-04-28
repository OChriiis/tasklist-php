<?php
//conexao com o mysql

const HOST = "localhost";
const USER = "root";
const PASSWORD = "Lilicalegal1";
const DATABASE = "dbtasklist";

  
//fazendo conexão com o mysql
$conexao = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

$sql = " SELECT * FROM  tblDescricao ";

$resultado = mysqli_query($conexao, $sql);

$tarefa = "Minha nova tarefa";

$sqlInsert = "INSERT INTO tblDescricao (descricao) values ('$tarefa')";

mysqli_query($conexao, $sqlInsert);

/*$linha1 = mysqli_fetch_array($resultado);

print_r($linha1);

echo "<br /><br />";

$linha2 = mysqli_fetch_array($resultado);

print_r($linha2);

echo "<br /><br />";

$linha3 = mysqli_fetch_array($resultado);

print_r($linha3);

echo "<br /><br />";*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<table border="1">
    <tr>
        <th>ID</th>
        <th>DESCRIÇÃO</th>
    </tr>
    <?php
    while($linha = mysqli_fetch_array($resultado)){

    
     ?> 
    <tr>
        <td><?= $linha["id"]?></td>
        <td><?= $linha["descricao"]?></td>
    </tr>
        <?php
    }
    ?>

</table>
  
</body>
</html>