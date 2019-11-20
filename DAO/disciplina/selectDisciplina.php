<?php

include_once '../../conexao.php';
$query= "SELECT * FROM DISCIPLINA ORDER BY nome ASC";
$consulta= mysqli_query($conexao,$query);

