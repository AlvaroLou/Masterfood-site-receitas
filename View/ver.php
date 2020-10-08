<?php
require_once("Controller\ReceitaController.php");
$cod = filter_input(INPUT_GET, "cod");
?>

<div id="dvVer">
  <h3>Visualizar</h3>
  <br />
  <?php
  if ($cod) {
    $receitaController = new ReceitaController();
    $receita = $receitaController->RetornaReceita($cod);

    if ($receita != null) {
  ?>
      <ul>
        <li class="text">Título</li>
        <li class="break"><?= $receita->getTitulo();?> - <?=date("d-m-Y", strtotime($receita->getData()));?></li>

        <li class="text">Ingredientes</li>
        <li class="break"><?= $receita->getIngredientes();?></li>

        <li class="text">Modo de preparo</li>
        <li class="break"><?= $receita->getModoPreparo();?></li>

        <li class="text">
        <a href="?pagina=novo&cod=<?= $receita->getCod();?>" class="weaves-effect red accent-2 btn">Editar receita</a>
        </li>
      </ul>

  <?php
    } else {
      echo "Receita não encontrada";
    }
  } else {
    echo "Código não encontrado";
  }
  ?>
</div>