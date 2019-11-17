<?php
    $local = $_GET["local"];
    include_once '../conexao.php';
      
    $sql = "delete from SALA where local = '".$local."'";
      
    if(mysqli_query($conexao,$sql)){
        $msg = "Deletado com sucesso!";
    }else{
        $msg = "Erro ao deletar!";
    }
    
    header('Location: testeSala/testeSELECT.php');
    mysqli_close($conexao);    
   
      
?>