<?php 
## chamada =0
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
            <h1 class="h2">Perfil</h1>
          </div>
          <form>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="../imagens/professor.jpg" alt="Imagem de capa do card">
                        </div>
                        <div class="card" style="width: 37rem;">
                            <div class = "card-body">
                                <h3 class="card-title border-bottom border-dark">Professor professor</h3> 
                                <p class="card-text">Ex-Professor.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </form>
          <h2>Suas Turmas</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Materia</th>
                  <th>Turma</th>
                  <th>Horário de início (horas)</th>
                  <th>Dia</th>
                  <th>Nº de Alunos</th>
                  <th>Frequência (%)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Projeto integrador p/ Engenharias-I</td>
                  <td>A</td>
                  <td>16</td>
                  <td>Segunda-Feira</td>
                  <td>14</td>
                  <td>98</td>
                </tr>
                <tr>
                  <td>Estruturas de Dados-I</td>
                  <td>A</td>
                  <td>16</td>
                  <td>Terça-Feira</td>
                  <td>112</td>
                  <td>95,4</td>
                </tr>
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
