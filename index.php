<!DOCTYPE html>
<html lang="pt-br">
<?php
date_default_timezone_set('America/Fortaleza');
?>
<head>
  <meta charset="UTF-8">
  <title>Master Food</title>

  <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
  <script src="materialize/js/materialize.min.js"></script>
  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="all" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>

  <div id="dvCentro" style="margin: 0 auto;">
    <div class="row">
      <div class="col s12 m12">
        <div class="card">
          <div class="card-image">
            <img src="img/logo.jpg">
            <span class="card-title" alt="Logo Master Food">Master Food</span>
          </div>
          <div class="card-action">
            <a href="?pagina=nova">Nova Receita</a>
            <a href="?pagina=pesquisa">Pesquisar Receita</a>
          </div>
          <div class="card-content">
            <?php
            $pagina = filter_input(INPUT_GET, "pagina");
            switch ($pagina) {
              case "nova":
                require_once("View/novo.php");
                break;
              case "pesquisa":
                require_once("View/pesquisa.php");
                break;
              case "ver":
                require_once("View/ver.php");
                break;

              default:
                require_once("View/novo.php");
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>