<?php

include_once "../DAO/conexao.php";
$query= "SELECT nome,email,tokenP,matricula FROM PROFESSOR ORDER BY nome ASC";
$consulta= mysqli_query($conexao,$query);

if($conexao){
    //echo "OK";
}else{
    echo "ERRO";
}

