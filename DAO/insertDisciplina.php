<?php

include_once "../DAO/conexao.php";

echo $turmaNome=$_POST['nomeDisciplina'];
echo $codigo=$_POST['codigo'];
echo $sql = "insert into DISCIPLINA(nomeDisciplina,codigo) values('".$turmaNome."',".$codigo.")";

if(mysqli_query($conexao,$sql)){
  //  $msg = "Gravado com sucesso!";
}else{
    $msg = "Erro ao gravar!";
}
echo $msg;

//Direcionar para a pagina que contem todas as salas
header('Location:  ../../view/cadastroDisciplina.php');
mysqli_close($conexao);
