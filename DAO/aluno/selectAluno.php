<?php

include_once "../DAO/conexao.php";
$query= "SELECT nome,tokenA,matricula FROM ALUNO ORDER BY nome ASC";
$consulta= mysqli_query($conexao,$query);

if($conexao){
    //echo "OK";
}else{
    echo "ERRO";
}
