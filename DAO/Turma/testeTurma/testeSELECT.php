<!DOCTYPE html>
<html>
<head>
    <title>TESTE selectTURMA</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<table border="10px">
    <tr>
        <th>Disciplina</th>
        <th>Letra da Turma</th>
        <th>Horario</th>
        <th>Dia</th>
        <th>DELETAR</th>
    </tr>
    <?php
        include_once '../selectTurma.php';
        while($linha = mysqli_fetch_array($consulta)){
            echo '<p><tr><td>'.$linha['disciplina'].'</td>';
            echo '<td>  '.$linha['letraTurma'].'</td>';
            echo '<td>  '.$linha['horario'].'</td>';
            echo '<td>  '.$linha['dia'].'</td>';
            echo '<td><a href="../deleteTurma.php?local='. $linha['local'].' ">DELLETAR</a></tr>' ;
        }
    ?>
    
<table>
</body>
</html>