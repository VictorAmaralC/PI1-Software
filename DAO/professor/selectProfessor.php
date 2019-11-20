<?php

include_once '../../conexao.php';
$query= "SELECT * FROM PROFESSOR ORDER BY nome ASC";
$consulta= mysqli_query($conexao,$query);

