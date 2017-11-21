<?php
class Util{
    var $id;
    var $textos;
    function Util($idPagina = null, $idIdioma = 1){
        /**
        *   Método construtor, nele estou informando que os valores
        *   padrões para $idPagina e $idIdioma são iguais a null e 1
        *   respectivamente. Fiz isso, pois o PHP não aceita sobrecarga.
        *   Pelo menos a versão que estou usando (4) não.
        *   Aqui, inicializo também a propriedade $textos informando que é um array
        */
        $this->id     = $idPagina;
        $this->idioma = $idIdioma;
        $this->textos = array();
    }
    function select($value){
        /**
        *   Recebo uma string e repasso para a camada de peristencia.
        *   Lá, será gravada no Banco de Dados a nova página
        */
        if($value == "Publicado"){
          $select = "<select name='status'>";
          $select.= "<option value='Em Espera'>Em Espera</option>";
          $select.= "<option value='Publicado' selected>Publicado</option>";
          $select.= "</select>";
        }
        else{
          $select = "<select name='status'>";
          $select.= "<option value='Em Espera' selected>Em Espera</option>";
          $select.= "<option value='Publicado'>Publicado</option>";
          $select.= "</select>";
        }
        return $select;
    }
    function selectTipo($value){
        /**
        *   Recebo uma string e repasso para a camada de peristencia.
        *   Lá, será gravada no Banco de Dados a nova página
        */
        if($value == "autor"){
          $select = "<select name='tipo'>";
          $select.= "<option value='autor' selected>autor</option>";
          $select.= "<option value='editor'>editor</option>";
          $select.= "<option value='manda_chuva'>administrador</option>";
          $select.= "</select>";
        }
        elseif($value == "editor"){
          $select = "<select name='tipo'>";
          $select.= "<option value='autor'>autor</option>";
          $select.= "<option value='editor' selected>editor</option>";
          $select.= "<option value='manda_chuva'>Administrador</option>";
          $select.= "</select>";
        }
        else{
          $select = "<select name='tipo'>";
          $select.= "<option value='autor'>autor</option>";
          $select.= "<option value='editor'>editor</option>";
          $select.= "<option value='manda_chuva' selected>Administrador</option>";
          $select.= "</select>";
        }
        return $select;
    }
    function paragrafoTexto($string){
      /**
        *   Quebra de linha a cada "enter"
        */
      $paragrafo .= str_replace("\n","<br>",$string);
      return $paragrafo;
    }
}
?>
