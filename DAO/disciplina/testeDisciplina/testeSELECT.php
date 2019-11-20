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
        <th>Nome da disciplina</th>
        <th>Codigo</th>
        <th>DELETAR</th>
    </tr>
    <?php
        include_once '../selectSala.php';
        while($linha = mysqli_fetch_array($consulta)){
            echo '<p><tr><td>'.$linha['nome'].'</td>';
            echo '<td>  '.$linha['codigo'].'</td>';
            echo '<td><a href="../deleteAluno.php?local='. $linha['nome'].' ">DELLETAR</a></tr>' ;
        }
    ?>
    
<table>
</body>
</html>