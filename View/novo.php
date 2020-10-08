<?php
  require_once("Controller/ReceitaController.php");
  require_once("Model/Receita.php");

  $receitaController = new ReceitaController();
  $receita = new Receita();

  $titulo = "";
  $ingredientes = "";
  $modopreparo = "";
  $resultado = "";

  $cod = filter_input(INPUT_GET, "cod");
  if ($cod) {
    $itemReceita = $receitaController->RetornaReceita($cod);

    $titulo = $itemReceita->getTitulo();
    $ingredientes = $itemReceita->getIngredientes();
    $modopreparo = $itemReceita->getModoPreparo();
  }

  $btnGravar = filter_input(INPUT_POST, "btnGravar");
  if ($btnGravar) {
    if (!$cod) {
      //Novo
      $receita->setTitulo(filter_input(INPUT_POST,"txtTitulo"));
      $receita->setIngredientes(filter_input(INPUT_POST,"txtIngredientes"));
      $receita->setModoPreparo(filter_input(INPUT_POST,"txtPreparo"));
      $receita->setData(date("Y/m/d"));

      if ($receitaController->Cadastrar($receita)) {
        $resultado = "Receita Cadastrada";
      } else {
        $resultado = "Houve um erro ao tentar cadastrar a receita";
      }
      
    }else{
      //Editando
      $receita->setCod($cod);
    }
  }
?>
<div id="dvNovo"> 
  <h3>Nova Receita</h3>
  <div class="row">
    <form method="post" action="">

      <div class="input-field col s12">
        <input id="txtTitulo" name="txtTitulo" type="text" class="validate" value="<?=$titulo;?>" />
        <label for="txtTitulo">Título</label>
      </div>

      <div class="input-field col s12">
        <textarea id="txtIngredientes" name="txtIngredientes" class="materialize-textarea" ><?=$ingredientes;?></textarea>
        <label for="txtIngredientes">Ingredientes</label>
      </div>

      <div class="input-field col s12">
        <textarea id="txtPreparo" name="txtPreparo" class="materialize-textarea" ><?=$modopreparo;?></textarea>
        <label for="txtPreparo">Modo de Preparo</label>
      </div>

      <div class="col s12">
        <span><?=$resultado;?>&nbsp;</span>
      </div>

      <div class="col s12">
        <input type="submit" class="waves-effect green accent-3 btn" name="btnGravar" value="Gravar" />
        <a class="waves-effect red lighten-1 waves-light btn" href="?pagina=nova"><i class="material-icons left">loop</i>Cancelar</a>
      </div>
    </form>
  </div>
</div>