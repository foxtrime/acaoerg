<?php
class Pagina{
    var $id;
    var $idioma;
    var $textos;
    function Pagina($idPagina = null, $idIdioma = 1){
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
    function cadastrar($pagina){
        /**
        *   Recebo uma string e repasso para a camada de peristencia.
        *   L�, ser� gravada no Banco de Dados a nova p�gina
        */
        $PaginaDAO = new PaginaDAO();
        return $PaginaDAO->cadastrar($pagina);
    }
    function excluirTextosById($idTexto){
        /**
        *   Recebo um inteiro e repasso para a camada de peristencia.
        *   L�, os textos ser�o excluidos do Banco de Dados.
        */
        $PaginaDAO = new PaginaDAO();
        return $PaginaDAO->excluirTextosById($idTexto);
    }
    function alterarTextosById($textoPt, $textoEn, $textoEs, $idTexto){
        /**
        *   Recebo todos os textos e o id e repasso para a camada de peristencia.
        *   L�, os ser�o alterados os textos em cada idioma referentes a esse id
        */
        $PaginaDAO = new PaginaDAO();
        return $PaginaDAO->alterarTextosById($textoPt, $textoEn, $textoEs, $idTexto);
    }
    function getTextosById($idTexto){
        /**
        *   Recebo um inteiro (id) e repasso para a camada de peristencia.
        *   L�, ser� buscado os textos referentes a esse id para que
        *   o formul�rio de edi��o de textos possa ser carregado.
        */
        $PaginaDAO = new PaginaDAO();
        return $PaginaDAO->getTextosById($idTexto);
    }
    function cadastrarTextos($texto_pt, $texto_en, $texto_es, $idPagina){
        /**
        *   Recebo as informa��es referentes a um texto do formul�rio de cadastro e
        *   repasso para a camada de peristencia.
        *   L�, os textos ser�o gravados no banco de dados
        */
        $PaginaDAO = new PaginaDAO();
        $PaginaDAO->cadastrarTextos($texto_pt, $texto_en, $texto_es, $idPagina);
    }
    function getPaginas(){
        /**
        *   Chamo o m�todo getPaginas da camada de persist�ncia que
        *   retorna um array contendo todas as p�ginas no seguinte
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
