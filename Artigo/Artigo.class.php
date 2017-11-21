<?php
class Artigo{
    var $id;
    var $idioma;
    var $textos;
    function Artigo($idPagina = null, $idIdioma = 1){
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
    function cadastrar($codExemplar, $tit, $aut, $pagInicial, $pagFinal, $palChave, $status){
        /**
        *   Recebo uma string e repasso para a camada de peristencia.
        *   Lá, será gravada no Banco de Dados a nova página
        */
        $ArtigoDAO = new ArtigoDAO();
        return $ArtigoDAO->cadastrar($codExemplar, $tit, $aut, $pagInicial, $pagFinal, $palChave, $status);
    }
    function excluirArtigoByCod($codArtigo){
        /**
        *   Recebo um inteiro e repasso para a camada de peristencia.
        *   Lá, os textos serão excluidos do Banco de Dados.
        */
        $ArtigoDAO = new ArtigoDAO();
        return $ArtigoDAO->excluirArtigoByCod($codArtigo);
    }
    function alterarArtigoByCod($codArtigo, $codExemplar, $tit, $aut, $pagInicial, $pagFinal, $palChave, $status){
        /**
        *   Recebo todos os textos e o id e repasso para a camada de peristencia.
        *   Lá, os serão alterados os textos em cada idioma referentes a esse id
        */
        $ArtigoDAO = new ArtigoDAO();
        return $ArtigoDAO->alterarArtigoByCod($codArtigo, $codExemplar, $tit, $aut, $pagInicial, $pagFinal, $palChave, $status);
    }
    function getArtigosByCod($codArtigo){
        /**
        *   Recebo um inteiro (id) e repasso para a camada de peristencia.
        *   Lá, será buscado os textos referentes a esse id para que
        *   o formulário de edição de textos possa ser carregado.
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
