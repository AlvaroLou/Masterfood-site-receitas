<?php
require_once("Banco.php");
require_once("Model/Receita.php");
class ReceitaDAO
{
  private $banco;
  private $debug;

  public function __construct()
  {
    $this->banco = new Banco();
    $this->debug = true;
  }
  public function destruct()
  {
    $this->banco->Disconnect();
  }
  public function Cadastrar(Receita $receita)
  {
    try {
      $sql = "INSERT INTO receita (titulo, ingredientes, modopreparo, data) VALUES (:titulo, :ingredientes, :preparo, :data)";

      $param = array(
        ":titulo" => $receita->getTitulo(),
        ":ingredientes" => $receita->getIngredientes(),
        ":preparo" => $receita->getModoPreparo(),
        ":data" => $receita->getData()
      );

      return $this->banco->ExecuteNonQuery($sql, $param);
    } catch (PDOException $ex) {
      if ($this->debug) {
        echo "Erro: {$ex->getMessage()}";
      }
    }
  }
  public function RetornaTudo()
  {
    try {
      $sql = "SELECT cod, titulo, data FROM receita ORDER BY titulo ASC";
      $dtReceitas = [];

      $retornoBanco = $this->banco->ExecuteQuery($sql);

      foreach ($retornoBanco as $ln) {
        $receita = new Receita();

        $receita->setCod($ln["cod"]);
        $receita->setTitulo($ln["titulo"]);
        $receita->setData($ln["data"]);

        $dtReceitas[] = $receita;
      }

      return $dtReceitas;
    } catch (PDOException $ex) {
      if ($this->debug) {
        echo "Erro: {$ex->getMessage()}";
      }
    }
  }
  public function RetornaReceita($cod)
  {
    try {
      $sql = "SELECT cod, titulo, ingredientes, modopreparo, data FROM receita WHERE cod = :cod";

      $param = array(
        ":cod" => $cod
      );

      $retornoBanco = $this->banco->ExecuteQueryOneRow($sql, $param);


      $receita = new Receita();

      $receita->setCod($retornoBanco["cod"]);
      $receita->setTitulo($retornoBanco["titulo"]);
      $receita->setIngredientes($retornoBanco["ingredientes"]);
      $receita->setModoPreparo($retornoBanco["modopreparo"]);
      $receita->setData($retornoBanco["data"]);

      return $receita;

    } catch (PDOException $ex) {
      if ($this->debug) {
        echo "Erro: {$ex->getMessage()}";
      }
    }
  }
}
