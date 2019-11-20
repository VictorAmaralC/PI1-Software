<?php
    $codigo = $_GET["codigo"];
    include_once '../conexao.php';
      
    $sql = "delete from DISCIPLINA where codigo = '".$codigo."'";
      
    if(mysqli_query($conexao,$sql)){
        $msg = "Deletado com sucesso!";
    }else{
        $msg = "Erro ao deletar!";
    }
    
    header('Location: testeSala/testeSELECT.php');
    mysqli_close($conexao);    
   
      
?>