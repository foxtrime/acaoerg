<?php
class Exemplar{
    var $id;
    var $idioma;
    var $textos;
    function Exemplar($idPagina = null, $idIdioma = 1){
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
    function cadastrar($nome, $ISSN, $entidadeMantenedora, $mesDoExemplar, $anoDoExemplar, $numeroDoExemplar, $volumeDoExemplar, $status){
        /**
        *   Recebo uma string e repasso para a camada de peristencia.
        *   L�, ser� gravada no Banco de Dados o novo exemplar
        */
        $ExemplarDAO = new ExemplarDAO();
        return $ExemplarDAO->cadastrar($nome, $ISSN, $entidadeMantenedora, $mesDoExemplar, $anoDoExemplar, $numeroDoExemplar, $volumeDoExemplar, $status);
    }
    function excluirExemplarByCod($codExemplar){
        /**
        *   Recebo um inteiro e repasso para a camada de peristencia.
        *   L�, o exemplar sera excluido do Banco de Dados.
        */
        $ExemplarDAO = new ExemplarDAO();
        return $ExemplarDAO->excluirExemplarByCod($codExemplar);
    }
    function alterarExemplarByCod($cod, $nome, $ISSN, $entidadeMantenedora, $mesDoExemplar, $anoDoExemplar, $numeroDoExemplar, $volumeDoExemplar, $status){
        /**
        *   Recebo todo o conteudo e o id e repasso para a camada de peristencia.
        *   L�, os ser�o alterados os dados do exemplar referente a esse id
        */
        $ExemplarDAO = new ExemplarDAO();
        return $ExemplarDAO->alterarExemplarByCod($cod, $nome, $ISSN, $entidadeMantenedora, $mesDoExemplar, $anoDoExemplar, $numeroDoExemplar, $volumeDoExemplar, $status);
    }
    function getExemplarByCod($CodExemplar){
        /**
        *   Recebo um inteiro (id) e repasso para a camada de peristencia.
        *   L�, ser� buscado o exemplar referente a esse id para que
        *   o formul�rio de edi��o de exemplares possa ser carregado.
        */
        $ExemplarDAO = new ExemplarDAO();
        return $ExemplarDAO->getExemplarByCod($CodExemplar);
    }
    function getExemplares(){
        /**
        *   Chamo o m�todo getexemplar da camada de persist�ncia que
        *   retorna um array contendo todos os exemplares no seguinte
        *   formato: array[idExemplar] = exemplar
        */
        $ExemplarDAO = new ExemplarDAO();
        return $ExemplarDAO->getExemplares();
    }
    function selectByStatus($status){
        /**
        *   Este m�todo carrega o select no formulario de alteracao
        *   com a opcao selecionada marcada
        */
      if($status == "Publicado"){
        $select = "<select name='status' />";
        $select.= "<option value='Em Espera'>Em Espera</option>";
        $select.= "<option value='Publicado' selected>Publicado</option>";
        $select.= "</select>";
      }
      else{
        $select = "<select name='status' />";
        $select.= "<option value='Em Espera' selected>Em Espera</option>";
        $select.= "<option value='Publicado'>Publicado</option>";
        $select.= "</select>";
      }
      return $select;
    }
    function getExemplarByStatus($status){

      $ExemplarDAO = new ExemplarDAO();
      return $ExemplarDAO->getExemplarByStatus($status);
    }
}
?>
