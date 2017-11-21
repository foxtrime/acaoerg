<?php
class Exemplar{
    var $id;
    var $idioma;
    var $textos;
    function Exemplar($idPagina = null, $idIdioma = 1){
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
    function cadastrar($nome, $ISSN, $entidadeMantenedora, $mesDoExemplar, $anoDoExemplar, $numeroDoExemplar, $volumeDoExemplar, $status){
        /**
        *   Recebo uma string e repasso para a camada de peristencia.
        *   Lá, será gravada no Banco de Dados o novo exemplar
        */
        $ExemplarDAO = new ExemplarDAO();
        return $ExemplarDAO->cadastrar($nome, $ISSN, $entidadeMantenedora, $mesDoExemplar, $anoDoExemplar, $numeroDoExemplar, $volumeDoExemplar, $status);
    }
    function excluirExemplarByCod($codExemplar){
        /**
        *   Recebo um inteiro e repasso para a camada de peristencia.
        *   Lá, o exemplar sera excluido do Banco de Dados.
        */
        $ExemplarDAO = new ExemplarDAO();
        return $ExemplarDAO->excluirExemplarByCod($codExemplar);
    }
    function alterarExemplarByCod($cod, $nome, $ISSN, $entidadeMantenedora, $mesDoExemplar, $anoDoExemplar, $numeroDoExemplar, $volumeDoExemplar, $status){
        /**
        *   Recebo todo o conteudo e o id e repasso para a camada de peristencia.
        *   Lá, os serão alterados os dados do exemplar referente a esse id
        */
        $ExemplarDAO = new ExemplarDAO();
        return $ExemplarDAO->alterarExemplarByCod($cod, $nome, $ISSN, $entidadeMantenedora, $mesDoExemplar, $anoDoExemplar, $numeroDoExemplar, $volumeDoExemplar, $status);
    }
    function getExemplarByCod($CodExemplar){
        /**
        *   Recebo um inteiro (id) e repasso para a camada de peristencia.
        *   Lá, será buscado o exemplar referente a esse id para que
        *   o formulário de edição de exemplares possa ser carregado.
        */
        $ExemplarDAO = new ExemplarDAO();
        return $ExemplarDAO->getExemplarByCod($CodExemplar);
    }
    function getExemplares(){
        /**
        *   Chamo o método getexemplar da camada de persistência que
        *   retorna um array contendo todos os exemplares no seguinte
        *   formato: array[idExemplar] = exemplar
        */
        $ExemplarDAO = new ExemplarDAO();
        return $ExemplarDAO->getExemplares();
    }
    function selectByStatus($status){
        /**
        *   Este método carrega o select no formulario de alteracao
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
