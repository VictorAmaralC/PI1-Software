
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastro Disciplina</title>
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
      <a class="nav-link" href="#">Sair</a>
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
            <a class="nav-link" href="perfil.php"><span data-feather="user"></span>Perfil<span class="sr-only">(current)</span></a>
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
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Relatorios</span><a class="d-flex align-items-center text-muted" href="#"><span data-feather="plus-circle"></span></a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
                    <a class="nav-link" href="fDisciplina.php"><span data-feather="bar-chart-2"></span>Frequência na disciplina</a>
          </li>
          <li class="nav-item">
                    <a class="nav-link" href="tempoAula.php"><span data-feather="clock"></span>Tempo médio de aula</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Conteúdo da página -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cadastrar Disciplina</h1>
          </div>
          <form>
            <div class="container">
              <div class="row justify-content-start mb-2">
                <div class="col-6">
                  <h5 for="nomeDisciplina">Disciplina a ser ministrada:</h5>
                  <input type="NomeDisciplina" class="form-control" id="nomeDisciplina" placeholder="Ex: Calculo-I">
                </div>
                <div class="col-2 mb-2">
                  <h5 for="Codigo">Codigo:</h5>
                  <input type="Codigo" class="form-control" id="Codigo" placeholder="Ex: 142536">
                </div>
              </div>
              <div class="row justify-content-center mb-3">
                <div class="col-3">
                  <button type="submit" class="btn btn-dark mt-4">Cadastrar</button>
                </div>
              </div>
            </div>
          </form>
          <h2>Suas Disciplinas</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Materia</th>
                  <th>Codigo</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Projeto integrador p/ Engenharias-I</td>
                  <td>193861</td>
                </tr>
                <tr>
                  <td>Estruturas de dados-I</td>
                  <td>193704</td>
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
