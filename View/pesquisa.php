<?php
require_once("Controller\ReceitaController.php");

$receitaController = new ReceitaController();

$listaReceita = $receitaController->RetornaTudo();
?>

<div id="dvBuscar">
  <h3>Pesquisa</h3>

  <br />
  <?php
  if ($listaReceita != null) {
  ?>
    <table>
      <thead>
        <tr>
          <th>Título</th>
          <th>Data</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($listaReceita as $receita) {
        ?>
          <tr>
            <td><?= $receita->getTitulo(); ?></td>
            <td><?= date("d-m-Y", strtotime($receita->getData())); ?></td>
            <td>
              <a href="?pagina=novo&cod=<?= $receita->getCod(); ?>" class="weaves-effect red accent-2 btn">Editar</a>
              <a href="?pagina=ver&cod=<?= $receita->getCod(); ?>" class="weaves-effect blue darken-1 accent-3 btn">Ver</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  <?php
  } else
    echo "Nenhum item a ser listado";
  ?>
</div>