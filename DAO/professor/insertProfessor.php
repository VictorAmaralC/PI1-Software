<?php
include_once ('../conexao.php');
echo $nome=$_POST['nome'];
 
$matricula=$_POST['matricula'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$tokenP=$_POST['token'];
$imagem = $_FILES['imagem']['tmp_name'];
$tamanho= $_FILES['imagem']['size'];
  
if ( $imagem != "none" ){
  $fp = fopen($imagem, "rb");
  $conteudo = fread($fp, $tamanho);
  $conteudo = addslashes($conteudo);
  fclose($fp);
  
  $sql = "INSERT INTO PROFESSOR (nome, matricula, email, senha, tokenP, foto) VALUES ('$nome', 
  $matricula,'$email','$senha', '$tokenP','$conteudo')";
  

  if(mysqli_query($conexao,$sql)){
      $msg = "Gravado com sucesso!";
  }else{
      $msg = "Erro ao gravar!";
  }
}
echo $msg;
header('Location:  ../../view/cadastroProfessor.php');
mysqli_close($conexao);
