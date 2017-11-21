<?php
class Artigo{
    var $id;
    var $idioma;
    var $textos;
    function Artigo($idPagina = null, $idIdioma = 1){
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
    function cadastrar($codExemplar, $tit, $aut, $pagInicial, $pagFinal, $palChave, $status){
        /**
        *   Recebo uma string e repasso para a camada de peristencia.
        *   L�, ser� gravada no Banco de Dados a nova p�gina
        */
        $ArtigoDAO = new ArtigoDAO();
        return $ArtigoDAO->cadastrar($codExemplar, $tit, $aut, $pagInicial, $pagFinal, $palChave, $status);
    }
    function excluirArtigoByCod($codArtigo){
        /**
        *   Recebo um inteiro e repasso para a camada de peristencia.
        *   L�, os textos ser�o excluidos do Banco de Dados.
        */
        $ArtigoDAO = new ArtigoDAO();
        return $ArtigoDAO->excluirArtigoByCod($codArtigo);
    }
    function alterarArtigoByCod($codArtigo, $codExemplar, $tit, $aut, $pagInicial, $pagFinal, $palChave, $status){
        /**
        *   Recebo todos os textos e o id e repasso para a camada de peristencia.
        *   L�, os ser�o alterados os textos em cada idioma referentes a esse id
        */
        $ArtigoDAO = new ArtigoDAO();
        return $ArtigoDAO->alterarArtigoByCod($codArtigo, $codExemplar, $tit, $aut, $pagInicial, $pagFinal, $palChave, $status);
    }
    function getArtigosByCod($codArtigo){
        /**
        *   Recebo um inteiro (id) e repasso para a camada de peristencia.
        *   L�, ser� buscado os textos referentes a esse id para que
        *   o formul�rio de edi��o de textos possa ser carregado.
        */
        $ArtigoDAO = new ArtigoDAO();
        return $ArtigoDAO->getArtigosByCod($codArtigo);
    }
    function getArtigos(){
        /**
        *   Chamo a camada de persistencia atraves do metodo getTextosByPagina.
        *   O mesmo retorna um array contendo todos os textos de uma determinada
        *   Pagina no seguinte formato: arrayTextos[$idIdioma] = array["idioma"] = $texto
        *   Nesse caso, estou fazendo um aninhamento de arrays
        */
        $ArtigoDAO = new ArtigoDAO();
        return $ArtigoDAO->getArtigos();
    }
    function getArtigosByCodExemplar($codExemplar){
        /**
        *   Chamo a camada de persistencia atraves do metodo getTextosByPagina.
        *   O mesmo retorna um array contendo todos os textos de uma determinada
        *   Pagina no seguinte formato: arrayTextos[$idIdioma] = array["idioma"] = $texto
        *   Nesse caso, estou fazendo um aninhamento de arrays
        */
        $ArtigoDAO = new ArtigoDAO();
        return $ArtigoDAO->getArtigosByCodExemplar($codExemplar);
    }
}
?>
