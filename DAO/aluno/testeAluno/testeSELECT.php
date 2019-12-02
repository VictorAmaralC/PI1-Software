<!DOCTYPE html>
<html>
<head>
    <title>TESTE selectALUNO</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<table border="10px">
    <tr>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Matrícula</th>
        <th>Token</th>
        <th>Materia</th>
        <th>Turma</th>
        <th>DELETAR</th>
    </tr>
    <?php
        include_once '../selectAluno.php';
        while($linha = mysqli_fetch_array($consulta)){
            echo '<p><tr><td>'.$linha['nome'].'</td>';
            echo '<td>  '.$linha['sobrenome'].'</td>';
            echo '<td>  '.$linha['matricula'].'</td>';
            echo '<td>  '.$linha['token'].'</td>';
            echo '<td>  '.$linha['mateira'].'</td>';
            echo '<td>  '.$linha['turma'].'</td>';
            echo '<td><a href="../deleteAluno.php?local='. $linha['local'].' ">DELLETAR</a></tr>' ;
        }
    ?>
    
<table>
</body>
</html>