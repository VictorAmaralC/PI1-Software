<?php

include_once ('../conexao.php');

$local=$_POST['local'];
$capacidade=$_POST['capacidade'];
$sql = "insert into SALA values('".$local."',".$capacidade.")";

if(mysqli_query($conexao,$sql)){
  //  $msg = "Gravado com sucesso!";
}else{
    $msg = "Erro ao gravar!";
}
echo $msg;

//Direcionar para a pagina que contem todas as salas
header('Location: testeSala/testeSELECT.php');
mysqli_close($conexao);
?>