<?php
class Receita
{
  private $cod;
  private $titulo;
  private $ingredientes;
  private $modoPreparo;
  private $data;

  function getCod()
  {
    return $this->cod;
  }
  function setCod($cod)
  {
    $this->cod = $cod;
  }
  function getTitulo()
  {
    return $this->titulo;
  }
  function setTitulo($titulo)
  {
    $this->titulo = $titulo;
  }
  function getIngredientes()
  {
    return $this->ingredientes;
  }
  function setIngredientes($ingredientes)
  {
    $this->ingredientes = $ingredientes;
  }
  function getModoPreparo()
  {
    return $this->modoPreparo;
  }
  function setModoPreparo($modoPreparo)
  {
    $this->modoPreparo = $modoPreparo;
  }
  function getData()
  {
    return $this->data;
  }
  function setData($data)
  {
    
    $this->data = $data;
  }
}
