<?php
    $matricula = $_GET["email"];
    include_once '../conexao.php';
      
    $sql = "delete from PROFESSOR where email = '".$matricula."'";
      
    if(mysqli_query($conexao,$sql)){
        $msg = "Deletado com sucesso!";
    }else{
        $msg = "Erro ao deletar!";
    }
    
    header('Location: ../../view/cadastroProfessor.php');
    mysqli_close($conexao);    
   
      
?>