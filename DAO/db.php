<?php
$servidor="localhost";
$usario="admin";
$senha="admin";
$database="biochamada";
$conexao= mysqli_connect($servidor,$usario,$senha,$database);
if($conexao){
    echo "Conectado com sucesso";
}else{
    echo "Erro ao conectar";
} 