<?php

include_once ('../conexao.php');

$nome=$_POST['nome'];
$codigo=$_POST['codigo'];
$sql = "insert into SALA values('".$nome."',".$codigo.")";

if(mysqli_query($conexao,$sql)){
  //  $msg = "Gravado com sucesso!";
}else{
    $msg = "Erro ao gravar!";
}
echo $msg;

//Direcionar para a pagina que contem todas as salas
header('Location: testeDisciplina/testeSELECT.php');
mysqli_close($conexao);
?>