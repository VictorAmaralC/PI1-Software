<?php

include_once '../../conexao.php';
$query= "SELECT * FROM TURMA ORDER BY disciplina ASC";
$consulta= mysqli_query($conexao,$query);

