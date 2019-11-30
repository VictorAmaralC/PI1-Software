<?php
    $matricula = $_GET["matricula"];
    include_once '../conexao.php';
      
    $sql = "delete from PROFESSOR where matricula = '".$matricula."'";
      
    if(mysqli_query($conexao,$sql)){
        $msg = "Deletado com sucesso!";
    }else{
        $msg = "Erro ao deletar!";
    }
    
    header('Location: testeProfessor/testeSELECT.php');
    mysqli_close($conexao);    
   
      
?>