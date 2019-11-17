<!DOCTYPE html>
<html>
<head>
    <title>TESTE selectSALA</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<table border="10px">
    <tr>
        <th>Local da aula</th>
        <th>Capacidade</th>
        <th>DELETAR</th>
    </tr>
    <?php
        include_once '../selectSala.php';
        while($linha = mysqli_fetch_array($consulta)){
            echo '<p><tr><td>'.$linha['local'].'</td>';
            echo '<td>  '.$linha['capacidade'].'</td>';
            echo '<td><a href="../deleteSala.php?local='. $linha['local'].' ">DELLETAR</a></tr>' ;
        }
    ?>
    
<table>
</body>
</html>