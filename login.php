<?php

include_once "DAO/conexao.php";
echo $email=$_POST['email'];
echo $senha=$_POST['senha'];
$query= "SELECT email,senha FROM PROFESSOR where email='$email' and senha='$senha' ";
$consulta= mysqli_query($conexao,$query);
$linha= mysqli_affected_rows($conexao);
if($linha > 0 ){
    header('Location:  view/home.php');
}else{
    echo "Cadastro ERRO";
    echo "<a href='index.php'> voltar</a>";
}
mysqli_close($conexao);
