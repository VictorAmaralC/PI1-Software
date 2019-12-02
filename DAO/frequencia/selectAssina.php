<?php

include_once "../DAO/conexao.php";
$query= "SELECT al.nome, a.idChamada,a.presenca,a.dh FROM assina a
    INNER JOIN ALUNO al on al.matricula=a.matricula 
ORDER BY idChamada ASC";
$consulta= mysqli_query($conexao,$query);

if($conexao){
    //echo "OK";
}else{
    echo "ERRO";
}
