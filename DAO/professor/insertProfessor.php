<?php

include_once ('../conexao.php');

$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$matricula=$_POST['matricula'];
$token=$_POST['token'];
$email=$_POST['email'];
$sql = "insert into SALA values('".$nome."',".$sobrenome.",".$matricula.",".$token.",".$email.")";

if(mysqli_query($conexao,$sql)){
  //  $msg = "Gravado com sucesso!";
}else{
    $msg = "Erro ao gravar!";
}
echo $msg;

//Direcionar para a pagina que contem todas as salas
header('Location: testeProfessor/testeSELECT.php');
mysqli_close($conexao);
?>