<?php
class Pagina{
    var $id;
    var $idioma;
    var $textos;
    function Pagina($idPagina = null, $idIdioma = 1){
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
    function cadastrar($pagina){
        /**
        *   Recebo uma string e repasso para a camada de peristencia.
        *   Lá, será gravada no Banco de Dados a nova página
        */
        $PaginaDAO = new PaginaDAO();
        return $PaginaDAO->cadastrar($pagina);
    }
    function excluirTextosById($idTexto){
        /**
        *   Recebo um inteiro e repasso para a camada de peristencia.
        *   Lá, os textos serão excluidos do Banco de Dados.
        */
        $PaginaDAO = new PaginaDAO();
        return $PaginaDAO->excluirTextosById($idTexto);
    }
    function alterarTextosById($textoPt, $textoEn, $textoEs, $idTexto){
        /**
        *   Recebo todos os textos e o id e repasso para a camada de peristencia.
        *   Lá, os serão alterados os textos em cada idioma referentes a esse id
        */
        $PaginaDAO = new PaginaDAO();
        return $PaginaDAO->alterarTextosById($textoPt, $textoEn, $textoEs, $idTexto);
    }
    function getTextosById($idTexto){
        /**
        *   Recebo um inteiro (id) e repasso para a camada de peristencia.
        *   Lá, será buscado os textos referentes a esse id para que
        *   o formulário de edição de textos possa ser carregado.
        */
        $PaginaDAO = new PaginaDAO();
        return $PaginaDAO->getTextosById($idTexto);
    }
    function cadastrarTextos($texto_pt, $texto_en, $texto_es, $idPagina){
        /**
        *   Recebo as informações referentes a um texto do formulário de cadastro e
        *   repasso para a camada de peristencia.
        *   Lá, os textos serão gravados no banco de dados
        */
        $PaginaDAO = new PaginaDAO();
        $PaginaDAO->cadastrarTextos($texto_pt, $texto_en, $texto_es, $idPagina);
    }
    function getPaginas(){
        /**
        *   Chamo o método getPaginas da camada de persistência que
        *   retorna um array contendo todas as páginas no seguinte
        *   formato: array[idPagina] = pagina
        */
        $PaginaDAO = new PaginaDAO();
        return $PaginaDAO->getPaginas();
    }
    function carregarTextos(){
        /**
        *   Pego todos os textos de um determinado idioma
        *   Dependendo do idioma selecionado, 'e chamado um metodo diferente
        *   na camada de persistencia.
        *   Todos os metodos retornam um array no seguinte formato: array[$idTexto] = $texto
        */
        $PaginaDAO = new PaginaDAO();
        switch($this->idioma){
            case 2: // Ing
                $arrayTextos = $PaginaDAO->getTextosEmInglesByPagina($this->id);
                break;
            case 3: // Esp
                $arrayTextos = $PaginaDAO->getTextosEmEspanholByPagina($this->id);
                break;
            default: //Port
                $arrayTextos = $PaginaDAO->getTextosEmPortuguesByPagina($this->id);
        }
        foreach($arrayTextos as $idTexto => $texto)
            $this->textos[$idTexto] = $texto;
    }
    function getTextosByPagina($idPagina){
        /**
        *   Chamo a camada de persistencia atraves do metodo getTextosByPagina.
        *   O mesmo retorna um array contendo todos os textos de uma determinada
        *   Pagina no seguinte formato: arrayTextos[$idIdioma] = array["idioma"] = $texto
        *   Nesse caso, estou fazendo um aninhamento de arrays
        */
        $PaginaDAO = new PaginaDAO();
        return $PaginaDAO->getTextosByPagina($idPagina);
    }
    function insertLinkDef($string){
      /**
        *   Segue Metodos para inserir link nos textos puxados do banco
        */
      $link = str_replace("aqui","<a href='docs/definicao.pdf' target='_blank'>aqui</a>",$string);
      return $link;
    }
    function insertLinkGuiaAutor($string){
      $link = str_replace("aqui","<a href='docs/guiaAutor.pdf' target='_blank'>aqui</a>",$string);
      return $link;
    }
    function insertRevista($string){
      $link = str_replace("aqui","<a href='docs/conhecaARevista.pdf' target='_blank'>aqui</a>",$string);
      return $link;
    }
    function insertParagrafo($string){
      $paragrafo  = "<p>";
      $paragrafo .= str_replace("\n","</p><p>",$string);
      $paragrafo .= "</p>";
      return $paragrafo;
    }
    
}
?>
