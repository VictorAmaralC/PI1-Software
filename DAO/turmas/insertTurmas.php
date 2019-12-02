<?php

include_once "../conexao.php";

$codigo=$_POST['codigo'];
$horario=$_POST['horario'];
$dia=$_POST['dia'];
$turmaNome=$_POST['turmaNome'];
$sql = "insert into TURMAS(turmaNome,dia,horario,codigo) values('".$turmaNome."','".$dia."','".$horario."',".$codigo.")";

if(mysqli_query($conexao,$sql)){
  //  $msg = "Gravado com sucesso!";
}else{
    $msg = "Erro ao gravar!";
}
echo $msg;

//Direcionar para a pagina que contem todas as salas
header('Location:  ../../view/cadastroTurma.php');
mysqli_close($conexao);
