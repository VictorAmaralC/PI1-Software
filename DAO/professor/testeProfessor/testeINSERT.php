<!DOCTYPE html>
<html>
<head>
    <title>TESTE insertPROFESSOR</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="../insertProfessor.php" method="POST">
        Nome:<br>
        <input type="text" name="nome"><br>
        Sobrenome:<br>
        <input type="text" name="sobrenome" ><br><br>
        Matricula:<br>
        <input type="text" name="matricula" ><br><br>
        Token:<br>
        <input type="text" name="token" ><br><br>
        Email:<br>
        <input type="text" name="email" ><br><br>
        <input type="submit" name="submit" value="Inserir">
    </form>
</body>
</html>