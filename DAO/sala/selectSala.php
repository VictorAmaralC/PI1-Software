<?php

include_once '../DAO/conexao.php';
$query= "SELECT * FROM SALA ORDER BY capacidade ASC";
$consulta= mysqli_query($conexao,$query);

