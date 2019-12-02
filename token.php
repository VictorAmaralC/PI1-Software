<?php
$received = file_get_contents('php://input');


#$token= $_POST['token'];
#file_put_contents("token.txt", $token);
include_once ('DAO/conexao.php');
$arv= fopen("token.txt","r");
#$tam= filesize('token.txt');
$act = fopen("act.txt","r");
$veri = fgets($act);

if($veri == "0"){//chamada
    while(!feof($arv)){
        $linha= fgets($arv);
        $dados =explode(",",$linha);
        $tok  = $dados[0];
        $data  = $dados[1];
        $hora  = $dados[2];
        $dh= $data." ".$hora;
        $token=(int)$tok;
        #Chamada
        $query= "SELECT idChamada FROM CHAMADA where dhFim is NULL";
        $consulta= mysqli_query($conexao,$query);
        $linha = mysqli_fetch_array($consulta);
        $chamada=$linha['idChamada'];
        #
        if($token <= 100){//é o professor
            ## Selecionar email do professor do token em especifico
            $query = "SELECT email FROM PROFESSOR where tokenP= $token";
            $consulta= mysqli_query($conexao,$query);
            $linha = mysqli_fetch_array($consulta);
            $email=$linha['email'];//ok
            ## Selecionar a turma que o professor leciona
            $query= "SELECT turmaNome,codigo FROM ministra where email= '$email' ";//no caso poderia ser varios,mas vou fazer 1 professor dar ministrar apenas 1 aula
            $consulta= mysqli_query($conexao,$query);
            $linha = mysqli_fetch_array($consulta);
            $turma = $linha['turmaNome'];//ok
            $codigo = $linha['codigo'];//ok
                
            if(empty($chamada)){

                ##Inserir chamada sem a dtFIM
                $sql = "insert into CHAMADA (dhInicio,email,turmaNome,codigo)values('".$dh."','".$email."','".$turma."',".$codigo.")";
                if(mysqli_query($conexao,$sql)){
                //  $msg = "Gravado com sucesso!";
                }else{
                    $msg = "Erro ao gravar!";
                }
                echo $msg;
                ##
                //Direcionar para a pagina que contem todas as salas
                #header('Location: testeSala/testeSELECT.php');

            }else{
                #UPDATE `CHAMADA` SET `dhFim` = '30/11/2019 01:58' WHERE `CHAMADA`.`idChamada` = 7
                $query="UPDATE `CHAMADA` SET `dhFim` = '$dh' WHERE `CHAMADA`.`idChamada` = $chamada";
                $consulta= mysqli_query($conexao,$query);
                #marcar falta para quem não veio
                echo $sql= "SELECT m.matricula FROM ALUNO a 
                INNER JOIN matriculado m on m.matricula=a.matricula and m.turmaNome='$turma' and m.codigo=$codigo
                where a.matricula not in(
                    SELECT ass.matricula FROM assina ass 
                    where ass.matricula=a.matricula and ass.idChamada=$chamada
                )";
                $consulta= mysqli_query($conexao,$sql);

                while($linha = mysqli_fetch_array($consulta)){
                    $matricula=$linha['matricula'];
                    echo "<br>".$matricula;
                    #inseriondo dados
                    $sql = "insert into assina(matricula,idChamada,presenca,dh) values(".$matricula.",".$chamada.",'F','$dh')";
                    mysqli_query($conexao,$sql);
                }
            }
            mysqli_close($conexao);
        }else{//é o aluno
            #Selecionar aluno do tokenA
            $query= "SELECT matricula FROM ALUNO where tokenA= $token";
            $consulta= mysqli_query($conexao,$query);
            $linha = mysqli_fetch_array($consulta);
            echo $matricula=$linha['matricula'];
            echo "<br>".$chamada;
            ## Selecionar o nomeTurma e codigo da chamada onde o idchamad
            echo "<br>".$query= "SELECT turmaNome,codigo FROM CHAMADA where idChamada= $chamada ";//no caso poderia ser varios,mas vou fazer 1 professor dar ministrar apenas 1 aula
            $consulta= mysqli_query($conexao,$query);
            $linha = mysqli_fetch_array($consulta);
            echo "<br>".$turma = $linha['turmaNome'];//ok
            echo "<br>".$codigo = $linha['codigo'];//ok
            #verificar se o aluno pertence aquela turmaa
            echo "<br>".$query= "SELECT matricula FROM matriculado where turmaNome= '$turma' and codigo=$codigo and matricula=$matricula";
            $consulta= mysqli_query($conexao,$query);
            $linha = mysqli_fetch_array($consulta);
            echo "<br>".$matricula=$linha['matricula'];

            if(!empty($matricula)){
                #inseriondo dados
                $sql = "insert into assina(matricula,idChamada,presenca,dh) values(".$matricula.",".$chamada.",'P','".$dh."')";
                $consulta= mysqli_query($conexao,$sql);
            }
            
        }
    }

}



$received = file_get_contents('php://input');
$timeNow = date("F j, Y, g:i a");
$subject = "Email Subject - ".time();
 
$bound_text = "----*%$!$%*";
$bound = "--".$bound_text."\r\n";
$bound_last = "--".$bound_text."--\r\n";
 
$headers = "From: biochamada@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n" .
"Content-Type: multipart/mixed; boundary=\"$bound_text\""."\r\n" ;
$message =
'Content-Type: text/html; charset=UTF-8'."\r\n".
'Content-Transfer-Encoding: 7bit'."\r\n\r\n".
'
<html>
<head>
</head>
<body>
</body>
</html>'."\n\n".
$bound;
 
$message .= "Content-Type: image/jpeg; name=\"filename.jpg\"\r\n"
."Content-Transfer-Encoding: base64\r\n"
."Content-ID: <filename.jpg>\r\n"
."\r\n"
.chunk_split(base64_encode($received))
.$bound_last;
 
echo mail('biochamada@gmail.com', $subject, $message, $headers);