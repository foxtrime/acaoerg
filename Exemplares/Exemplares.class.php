<?php
class Exemplares{
    var $id;
    var $idioma;
    var $textos;
    function Exemplares($idPagina = null, $idIdioma = 1){
        $this->id     = $idPagina;
        $this->idioma = $idIdioma;
        $this->textos = array();
    }
    function cadastrar($nome, $ISSN, $entidadeMantenedora, $mesDoExemplar, $anoDoExemplar, $numeroDoExemplar, $volumeDoExemplar, $status, $capa){
        $ExemplaresDAO = new ExemplaresDAO();
        return $ExemplaresDAO->cadastrar($nome, $ISSN, $entidadeMantenedora, $mesDoExemplar, $anoDoExemplar, $numeroDoExemplar, $volumeDoExemplar, $status, $capa);
    }
    function excluirExemplarByCod($codExemplar){
        /**
        *   Recebo um inteiro e repasso para a camada de peristencia.
        *   Lá, o exemplar sera excluido do Banco de Dados.
        */
        $ExemplaresDAO = new ExemplaresDAO();
        return $ExemplaresDAO->excluirExemplarByCod($codExemplar);
    }
    function alterarExemplarByCod($cod, $nome, $ISSN, $entidadeMantenedora, $mesDoExemplar, $anoDoExemplar, $numeroDoExemplar, $volumeDoExemplar, $status){
        /**
        *   Recebo todo o conteudo e o id e repasso para a camada de peristencia.
        *   Lá, os serão alterados os dados do exemplar referente a esse id
        */
        $ExemplaresDAO = new ExemplaresDAO();
        return $ExemplaresDAO->alterarExemplarByCod($cod, $nome, $ISSN, $entidadeMantenedora, $mesDoExemplar, $anoDoExemplar, $numeroDoExemplar, $volumeDoExemplar, $status);
    }
    function alterarLogoById($CodExemplar, $imagem_nome){
        $ExemplaresDAO = new ExemplaresDAO();
        return $ExemplaresDAO->alterarLogoById($CodExemplar, $imagem_nome);
    }
    function getExemplarByCod($CodExemplar){
        /**
        *   Recebo um inteiro (id) e repasso para a camada de peristencia.
        *   Lá, será buscado o exemplar referente a esse id para que
        *   o formulário de edição de exemplares possa ser carregado.
        */
        $ExemplaresDAO = new ExemplaresDAO();
        return $ExemplaresDAO->getExemplarByCod($CodExemplar);
    }
    function getExemplares(){
        /**
        *   Chamo o método getexemplar da camada de persistência que
        *   retorna um array contendo todos os exemplares no seguinte
        *   formato: array[idExemplar] = exemplar
        */
        $ExemplaresDAO = new ExemplaresDAO();
        return $ExemplaresDAO->getExemplares();
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

      $ExemplaresDAO = new ExemplaresDAO();
      return $ExemplaresDAO->getExemplarByStatus($status);
    }
}
?>
