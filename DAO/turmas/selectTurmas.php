<?php

include_once "../DAO/conexao.php";
$query= "SELECT turmaNome,codigo,dia,horario FROM TURMAS";
$consulta= mysqli_query($conexao,$query);