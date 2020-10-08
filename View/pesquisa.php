<?php
require_once("Controller\ReceitaController.php");

$receitaController = new ReceitaController();

if (filter_input(INPUT_GET, "cod")) {
  $receitaController->Deletar((filter_input(INPUT_GET, "cod")));
}
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
              <a href="?pagina=novo&cod=<?= $receita->getCod(); ?>" class="weaves-effect yellow accent-1 accent-3 btn">Editar</a>
              <a href="?pagina=ver&cod=<?= $receita->getCod(); ?>" class="weaves-effect blue darken-1 accent-3 btn">Ver</a>
              <a onclick="return confirm('Deseja realmente remover a receita?');" href="?pagina=pesquisa&cod=<?= $receita->getCod(); ?>" class="weaves-effect red accent-1 accent-3 btn">Remover</a>
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