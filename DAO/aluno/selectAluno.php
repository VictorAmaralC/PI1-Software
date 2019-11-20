<?php

include_once '../../conexao.php';
$query= "SELECT * FROM ALUNO ORDER BY nome ASC";
$consulta= mysqli_query($conexao,$query);

