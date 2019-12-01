<?php

include_once ('../conexao.php');
$nome=$_POST['nome'];
$matricula=$_POST['matricula'];
$token=$_POST['token'];
$imagem = $_FILES['imagem']['tmp_name'];
$tamanho= $_FILES['imagem']['size'];
  
if ( $imagem != "none" ){
  $fp = fopen($imagem, "rb");
  $conteudo = fread($fp, $tamanho);
  $conteudo = addslashes($conteudo);
  fclose($fp);
  
  $sql = "INSERT INTO ALUNO (nome, matricula, tokenA, foto) VALUES ('$nome', 
  $matricula,'$token','$conteudo')";
  

  if(mysqli_query($conexao,$sql)){
      $msg = "Gravado com sucesso!";
  }else{
      $msg = "Erro ao gravar!";
  }
}
echo $msg;
header('Location:  ../../view/cadastroAluno.php');
mysqli_close($conexao);
