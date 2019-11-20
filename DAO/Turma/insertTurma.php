<?php

include_once ('../conexao.php');

$disciplina=$_POST['disciplina'];
$letraTurma=$_POST['letraTurma'];
$horario=$_POST['horario'];
$dia=$_POST['dia'];
$sql = "insert into TURMA values('".$disciplina."',".$letraTurma.",".$horario.",".$dia.")";

if(mysqli_query($conexao,$sql)){
  //  $msg = "Gravado com sucesso!";
}else{
    $msg = "Erro ao gravar!";
}
echo $msg;

//Direcionar para a pagina que contem todas as salas
header('Location: testeTurma/testeSELECT.php');
mysqli_close($conexao);
?>