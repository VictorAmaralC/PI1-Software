<!DOCTYPE html>
<html>
<head>
    <title>TESTE insertALUNO</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="../insertAluno.php" method="POST">
        Nome:<br>
        <input type="text" name="nome"><br>
        Sobrenome:<br>
        <input type="text" name="Sobrenome"><br>
        Matricula:<br>
        <input type="text" name="matricula" ><br><br>
        Token:<br>
        <input type="text" name="token" ><br><br>
        Matéria:<br>
        <input type="text" name="materia" ><br><br>
        Turma:<br>
        <input type="text" name="turma" ><br><br>
        <input type="submit" name="submit" value="Inserir">
    </form>
</body>
</html>