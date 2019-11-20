<?php

include_once ('../conexao.php');

$nome=$_POST['Nome'];
$sobrenome=$_POST['sobrenome'];
$matricula=$_POST['matricula'];
$token=$_POST['token'];
$materia=$_POST['materia'];
$turma=$_POST['turma'];
$sql = "insert into ALUNO values('".$nome."',".$sobrenome.",".$matricula.",".$token.",".$materia.",".$turma.")";

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