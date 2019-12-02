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
        <h1 class="h2">Todal de alunos por disciplina</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            Semana
          </button>
          
        </div>
      </div>
      <!-- Gŕafico -->
      <div id="curve_chart" style="width: 900px; height: 500px"></div>
      <h2>Alunos</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                  <th>Chamada</th>
                  <th>Alunos</th>
                  <th>Presença</th>
                  <th>Data</th>
                </tr>
              </thead>
              <tbody>
              <?php
                include_once '../DAO/frequencia/selectAssina.php';
                while($linha = mysqli_fetch_array($consulta)){
                    echo '
                          <tr>
                            <th>'.$linha['idChamada'].'</th>
                            <th>'.$linha['nome'].'</th>
                            <td>'.$linha['presenca'].'</td>
                            <td>'.$linha['dh'].'</td>
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
        <script src="../js/dashboard.js"></script>
<!-- Script-Gráfico -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mês', 'Estrutura de Dados-I', 'Projeto Integrador p/ Engenharias-I'],
          <?php
            include_once '../DAO/conexao.php';
            $query= "SELECT COUNT(a.presenca) as cont,c.dhInicio as dh,c.idChamada as chamada  FROM assina a 
                      INNER JOIN CHAMADA c on a.idChamada=c.idChamada
                      where a.presenca='F' GROUP BY c.idChamada";
            $consulta= mysqli_query($conexao,$query);
            while($linha = mysqli_fetch_array($consulta)){
              $falta =(float)$linha['cont'];
              $dia=$linha['dh'];
              $camp=explode(" ",$dia);
              $camp=$camp[0];
              $chamada=$linha['chamada'];
              $q= "SELECT COUNT(presenca) as tam FROM assina where idChamada=$chamada";
              $con= mysqli_query($conexao,$q);
              $l = mysqli_fetch_array($con);
              $total=(float)$l['tam'];
              $falta=($falta/$total)*100;
              $pre=100-$falta;
              echo "['$camp', $pre, $falta],";
            }
          ?>
          ['Agosto',  96,      0],
          ['Setembro',  97,    97],
          ['Outubro',  95,      89],
          ['Novembro',  99,    92],
          ['Dezembro',  86,    98]
        ]);

        var options = {
          curveType: 'function',
          legend: { position: 'bottom' },
          colors: ['#2921d2', '#854905']
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
</body>
</html>
