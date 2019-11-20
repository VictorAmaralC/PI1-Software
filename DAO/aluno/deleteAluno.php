<?php
    $matricula = $_GET["matricula"];
    include_once '../conexao.php';
      
    $sql = "delete from ALUNO where matricula = '".$matricula."'";
      
    if(mysqli_query($conexao,$sql)){
        $msg = "Deletado com sucesso!";
    }else{
        $msg = "Erro ao deletar!";
    }
    
    header('Location: testeAluno/testeSELECT.php');
    mysqli_close($conexao);    
   
      
?>