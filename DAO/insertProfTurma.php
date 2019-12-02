<?php

include_once "../DAO/conexao.php";

$email=$_POST['email'];
$turmaNome=$_POST['turmaNome'];
$codigo=$_POST['codigo'];
$sql = "insert into ministra(email,turmaNome,codigo) values('".$email."','".$turmaNome."',".$codigo.")";

if(mysqli_query($conexao,$sql)){
  //  $msg = "Gravado com sucesso!";
}else{
    $msg = "Erro ao gravar!";
}
echo $msg;

//Direcionar para a pagina que contem todas as salas
header('Location:  ../../view/profTurma.php');
mysqli_close($conexao);
