<?php
class Artigos{
    var $id;
    var $idioma;
    var $textos;
    function Artigos($idPagina = null, $idIdioma = 1){
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
    function cadastrar($codExemplar, $tit, $aut, $pagInicial, $pagFinal, $palChave, $status, $email, $resumo, $arquivo){
        /**
        *   Recebo uma string e repasso para a camada de peristencia.
        *   L�, ser� gravada no Banco de Dados a nova p�gina
        */
        $ArtigosDAO = new ArtigosDAO();
        return $ArtigosDAO->cadastrar($codExemplar, $tit, $aut, $pagInicial, $pagFinal, $palChave, $status, $email, $resumo, $arquivo);
    }
    function excluirArtigoByCod($codArtigo){
        /**
        *   Recebo um inteiro e repasso para a camada de peristencia.
        *   L�, os textos ser�o excluidos do Banco de Dados.
        */
        $ArtigosDAO = new ArtigosDAO();
        return $ArtigosDAO->excluirArtigoByCod($codArtigo);
    }
    function alterarArtigoByCod($codArtigo, $codExemplar, $titulo, $email, $autores, $pagInicial, $pagFinal, $palChave, $resumo, $status){
        /**
        *   Recebo todos os textos e o id e repasso para a camada de peristencia.
        *   L�, os ser�o alterados os textos em cada idioma referentes a esse id
        */
        $ArtigosDAO = new ArtigosDAO();
        return $ArtigosDAO->alterarArtigoByCod($codArtigo, $codExemplar, $titulo, $email, $autores, $pagInicial, $pagFinal, $palChave, $resumo, $status);
    }
    function alterarArtigoById($id, $arquivo){
        /**
        *   Recebo todos os textos e o id e repasso para a camada de peristencia.
        *   Altero o arquivo no banco.
        */
        $ArtigosDAO = new ArtigosDAO();
        return $ArtigosDAO->alterarArtigoById($id, $arquivo);
    }
    function getArtigosByCod($codArtigo){
        /**
        *   Recebo um inteiro (id) e repasso para a camada de peristencia.
        *   L�, ser� buscado os textos referentes a esse id para que
        *   o formul�rio de edi��o de textos possa ser carregado.
        */
        $ArtigosDAO = new ArtigosDAO();
        return $ArtigosDAO->getArtigosByCod($codArtigo);
    }
    function getArtigos(){
        /**
        *   Chamo a camada de persistencia atraves do metodo getTextosByPagina.
        *   O mesmo retorna um array contendo todos os textos de uma determinada
        *   Pagina no seguinte formato: arrayTextos[$idIdioma] = array["idioma"] = $texto
        *   Nesse caso, estou fazendo um aninhamento de arrays
        */
        $ArtigosDAO = new ArtigosDAO();
        return $ArtigosDAO->getArtigos();
    }
    function getArtigosBloco(){
        /**
        *   Chamo a camada de persistencia atraves do metodo getTextosByPagina.
        *   O mesmo retorna um array contendo todos os textos de uma determinada
        *   Pagina no seguinte formato: arrayTextos[$idIdioma] = array["idioma"] = $texto
        *   Nesse caso, estou fazendo um aninhamento de arrays
        */
        $ArtigosDAO = new ArtigosDAO();
        return $ArtigosDAO->getArtigosBloco();
    }
    function getArtigosByCodExemplar($codExemplar){
        /**
        *   Chamo a camada de persistencia atraves do metodo getTextosByPagina.
        *   O mesmo retorna um array contendo todos os textos de uma determinada
        *   Pagina no seguinte formato: arrayTextos[$idIdioma] = array["idioma"] = $texto
        *   Nesse caso, estou fazendo um aninhamento de arrays
        */
        $ArtigosDAO = new ArtigosDAO();
        return $ArtigosDAO->getArtigosByCodExemplar($codExemplar);
    }
}
?>
