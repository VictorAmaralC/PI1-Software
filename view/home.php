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
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">BioChamada
</a>
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
        <h1 class="h2">Frequência por chamada</h1>
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
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>

      <h2>Frequência de todos aos Alunos</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Aluno</th>
              <th>Materia</th>
              <th>Turma</th>
              <th>Dia</th>
              <th>Prença(P)/Falta(F)</th>
            </tr>
          </thead>
          <tbody>
          <?php
            include_once "../DAO/conexao.php";
            $query= "SELECT * FROM `frequencia_alunos` ORDER BY `nome` ASC";
            $consulta= mysqli_query($conexao,$query);
            
            while($linha = mysqli_fetch_array($consulta)){
              echo '
                    <tr>
                      <th>'.$linha['nome'].'</th>
                      <td>'.$linha['nomeDisciplina'].'</td>
                      <td>'.$linha['turmaNome'].'</td>
                      <td>'.$linha['dh'].'</td>
                      <td>'.$linha['presenca'].'</td>
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
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
     
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Presença dos Alunos(%)', 'Falta dos Alunos(%)'],
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
        ]);

        var options = {
          chart: {
          },
          colors: ['#2921d2', '#854905']
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

</body>
</html>
