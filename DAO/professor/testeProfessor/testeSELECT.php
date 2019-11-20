<!DOCTYPE html>
<html>
<head>
    <title>TESTE selectPROFESSOR</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<table border="10px">
    <tr>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>matricula</th>
        <th>token</th>
        <th>email</th>
        <th>DELETAR</th>
    </tr>
    <?php
        include_once '../selectProfessor.php';
        while($linha = mysqli_fetch_array($consulta)){
            echo '<p><tr><td>'.$linha['nome'].'</td>';
            echo '<td>  '.$linha['sobrenome'].'</td>';
            echo '<td>  '.$linha['matricula'].'</td>';
            echo '<td>  '.$linha['token'].'</td>';
            echo '<td>  '.$linha['email'].'</td>';
            echo '<td><a href="../deleteSala.php?local='. $linha['nome'].' ">DELLETAR</a></tr>' ;
        }
    ?>
    
<table>
</body>
</html>