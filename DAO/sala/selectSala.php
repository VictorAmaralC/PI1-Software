<?php

include_once '../../conexao.php';
$query= "SELECT * FROM SALA ORDER BY capacidade ASC";
$consulta= mysqli_query($conexao,$query);

