<?php 
## cadastro aluno =2,chamada=0
$h=fopen('../act.txt','w');
$conteudo="0";
fwrite($h,$conteudo);
fclose($h);
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chamada Biométrica</title>
    <link rel="icon" href="../imagens/logo.png">


    <!-- Bootstrap core CSS -->
<link href="../css/bootstrap2.min.css" rel="stylesheet" >


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">BioChamada</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="../index.php">Sair</a>
    </li>
  </ul>
</nav>

<div class="container">
  <div class="row">
    <!-- Side Bar-->
    <div class="col-sm-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="home.php"><span data-feather="home"></span>Inicio<span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="cadastroProfessor.php"><span data-feather="users"></span>Cadastrar Professor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastroAluno.php"><span data-feather="users"></span>Cadastrar Aluno</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastroSala.php"><span data-feather="file-text"></span>Cadastrar Salas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastroDisciplina.php"><span data-feather="file-text"></span>Cadastrar Disciplina</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastroTurma.php"><span data-feather="file-text"></span>Cadastrar Turmas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profTurma.php"><span data-feather="file-text"></span>Atribuir professor/turma</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="alunoTurma.php"><span data-feather="file-text"></span>Matricular aluno/turma</a>
          </li>
        </ul>

      </div>
    </div>
    <!-- Conteúdo da página -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cadastrar Aluno a turma</h1>
          </div>
          <form action="../DAO/insertAlunoTurma.php" method="POST" enctype="multipart/form-data">
            <div class="container">
              <div class="row justify-content-start mb-2">
              <div class="col-3">
              <h5>Alunos:</h5>
                <select class="form-control" name="matricula" >
                    <?php
                      include_once "../DAO/conexao.php";
                      $query= "SELECT matricula,nome FROM ALUNO ";
                      $consulta= mysqli_query($conexao,$query);
                      while($linha = mysqli_fetch_array($consulta)){
                          echo '<option  value="'.$linha['matricula'].'">'.$linha['nome'].'</option>' ;
                      }
                    ?>
                </select>
              </div>
              <div class="row justify-content-start mb-5">
                <div class="col-6">
                  <h5 for="NomeAluno">Disciplina</h5>
                  <select class="form-control" name="codigo" id="codigo">
                    <?php
                      include_once "../DAO/conexao.php";
                      $query= "SELECT t.codigo,t.turmaNome,d.nomeDisciplina FROM TURMAS t INNER JOIN DISCIPLINA d on d.codigo=t.codigo ";
                      $consulta= mysqli_query($conexao,$query);
                      while($linha = mysqli_fetch_array($consulta)){
                          echo '<option  value="'.$linha['codigo'].'">'.$linha['nomeDisciplina'].'</option>' ;
                      
                      }
                    ?>
                  </select>
                </div>
                <div class="col-6 mb-2">
                  <h5 for="Email">Turmas</h5>
                    <select class="form-control" name="turmaNome" >
                      <?php
                        include_once "../DAO/conexao.php";
                        $query= "SELECT turmaNome FROM TURMAS GROUP BY turmaNome ";
                        $consulta= mysqli_query($conexao,$query);
                        while($linha = mysqli_fetch_array($consulta)){
                            echo '<option  value="'.$linha['turmaNome'].'">'.$linha['turmaNome'].'</option>' ;
                        
                        }
                      $codigoTurma=$linha['codigo'];
                      ?>
                    </select>
                  </div>
              </div>
              <div class="row justify-content-start mb-2">

              </div>
              <div class="row justify-content-center">
                <div class="col-3">
                  <button type="submit" class="btn btn-dark mt-4">Cadastrar</button>
                </div>
              </div>
            </div>
          </form>
          <h2>Respectivas turmas dos professores</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                  <th>Nome</th>
                  <th>codigo</th>
                  <th>turma</th>
                </tr>
              </thead>
              <tbody>
              <?php
                include_once "../DAO/conexao.php";
                $query= "SELECT a.nome as nome,m.codigo as codigo,m.turmaNome as turmaNome FROM matriculado m INNER JOIN ALUNO a on a.matricula=m.matricula ";
                $consulta= mysqli_query($conexao,$query);
                
                while($linha = mysqli_fetch_array($consulta)){
                  echo '
                        <tr>
                          <td>'.$linha['nome'].'</td>
                          <td>'.$linha['codigo'].'</td>
                          <td>'.$linha['turmaNome'].'</td>
                        </tr>' ;
                }
              ?>
              </tbody>
            </table>
          </div>
      </main>
    </div>
</div>

<script src="../js/jquery-3.3.1.slim.min.js" ></script>
        <script src="../js/feather.min.js"></script>
        <script src="../js/Chart.min.js"></script>
        <script src="../js/dashboard.js"></script></body>
</html>
