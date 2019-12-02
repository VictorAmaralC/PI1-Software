<?php

include_once "../DAO/conexao.php";

$e=$_POST['matricula'];
$turmaNome=$_POST['turmaNome'];
$codigo=$_POST['codigo'];
$sql = "insert into matriculado(matricula,turmaNome,codigo) values(".$e.",'".$turmaNome."',".$codigo.")";

if(mysqli_query($conexao,$sql)){
  //  $msg = "Gravado com sucesso!";
}else{
    $msg = "Erro ao gravar!";
}
echo $msg;

//Direcionar para a pagina que contem todas as salas
header('Location:  ../../view/alunoTurma.php');
mysqli_close($conexao);
