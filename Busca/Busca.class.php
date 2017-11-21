<?php
class Busca{
    var $id;
    var $idioma;
    var $textos;
    function Busca($idPagina = null, $idIdioma = 1){
        /**
        *   M�todo construtor, nele estou informando que os valores
        *   padr�es para $idPagina e $idIdioma s�o iguais a null e 1
        *   respectivamente. Fiz isso, pois o PHP n�o aceita sobrecarga.
        *   Pelo menos a vers�o que estou usando (4) n�o.
        *   Aqui, inicializo tamb�m a propriedade $textos informando que � um array
        */
        $this->id     = $idPagina;
        $this->idioma = $idIdioma;
        $this->textos = array();
    }
    function getArtigosByBusca($busca){
        /**
        *   Chamo a camada de persistencia atraves do metodo getTextosByPagina.
        *   O mesmo retorna um array contendo todos os textos de uma determinada
        *   Pagina no seguinte formato: arrayTextos[$idIdioma] = array["idioma"] = $texto
        *   Nesse caso, estou fazendo um aninhamento de arrays
        */
        $BuscaDAO = new BuscaDAO();
        return $BuscaDAO->getArtigosByBusca($busca);
    }
    function boldBusca($textBusca, $pesquisa){
      $textBold = str_replace($pesquisa, "<font color='darkblue'><b>$pesquisa</b></font>", $textBusca);
      $partes   = Explode(" " , $pesquisa);
      for ($i = 0; $i < count($partes); $i++){
          if(($partes[$i] == "da") or ($partes[$i]  == "de") or ($partes[$i]  == "e") or ($partes[$i]  == "das") or ($partes[$i]  == "dos")){
              continue;
              }
          $partes[$i] = ucfirst($partes[$i]);
          }
      $pesquisa = implode(" " , $partes);
      $textBold = str_replace($pesquisa, "<font color='darkblue'><b>$pesquisa</b></font>", $textBold);
      return $textBold;
    }
}
?>
