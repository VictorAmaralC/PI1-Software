<?php
    $local = $_GET["local"];
    include_once '../conexao.php';
      
    $sql = "delete from TURMA where local = '".$local."'";
      
    if(mysqli_query($conexao,$sql)){
        $msg = "Deletado com sucesso!";
    }else{
        $msg = "Erro ao deletar!";
    }
    
    header('Location: testeTurma/testeSELECT.php');
    mysqli_close($conexao);    
   
      
?>