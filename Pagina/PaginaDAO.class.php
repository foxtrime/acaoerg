<?php
class PaginaDAO{
    var $db;
    function PaginaDAO(){
        /**
        *   Metodo Construtor da classe. Com ele, ao instanciar a classe, uma
        *   nova conexao com o Banco de Dados e criada nao havendo a necessidade de
        *   Usar uma variavel global
        */
        $Conexao = new Conexao();
        $this->db = $Conexao->getConexao();
    }
    function cadastrar($pagina){
        /**
        *   Cadastra uma pagina no banco de dados
        */
        $sql  = " INSERT INTO paginas(pagina) VALUES('".$pagina."')";
        $this->db->execute($sql);
    }
    function excluirTextosById($idTexto){
        /**
        *   Exclui um registro de textos do Banco de Dados
        */
        $sql  = " DELETE FROM textos WHERE id=".$idTexto;
        $this->db->execute($sql);
    }
    function alterarTextosById($textoPt, $textoEn, $textoEs, $idTexto){
        /**
        *   Altera os dados de um registro de textos do banco de dados
        */
        $sql  = " UPDATE textos SET ";
        $sql .= "   texto_pt = '".$textoPt."', ";
        $sql .= "   texto_en = '".$textoEn."', ";
        $sql .= "   texto_es = '".$textoEs."' ";
        $sql .= " WHERE id=".$idTexto;
        $this->db->execute($sql);
    }
    function getTextosById($idTexto){
        /**
        *   Pega todos os dados de um registro de textos no banco
        *   de dados para carregar o formulario de edicao
        *   Retorna um array
        */
        $sql = " SELECT texto_pt, texto_en, texto_es, idpagina FROM textos WHERE id=".$idTexto;
        $result = $this->db->execute($sql);
        $textos = array();
        $textos['idPagina'] = htmlEntities($result->fields[3]);
        $textos['textoPt']  = htmlEntities($result->fields[0]);
        $textos['textoEn']  = htmlEntities($result->fields[1]);
        $textos['textoEs']  = htmlEntities($result->fields[2]);
        return $textos;
    }
    function cadastrarTextos($texto_pt, $texto_en, $texto_es, $idPagina){
        /**
        *   Cadastra um registro de textos no banco de dados
        */
        $sql  = " INSERT INTO ";
        $sql .= " textos(texto_pt, texto_en, texto_es, idpagina) ";
        $sql .= " VALUES ('".$texto_pt."', '".$texto_en."', '".$texto_es."', ".$idPagina.")";
        $this->db->execute($sql);
    }
    function getPaginas(){
        /**
        *   Retorno um array contendo todas as paginas cadastradas no banco de dados
        */
        $sql = " SELECT id, pagina FROM paginas ";
        $result = $this->db->execute($sql);
        $retorno = array();
        while(!$result->EOF){
            $idPagina = htmlEntities($result->fields[0]);
            $pagina   = htmlEntities($result->fields[1]);
            $retorno[$idPagina] = $pagina;
            $result->moveNext();
        }
        return $retorno;
    }
    function getTextosByPagina($idPagina){
        $sql = " SELECT id, texto_pt, texto_en, texto_es FROM textos WHERE idpagina=".$idPagina;
        $result = $this->db->execute($sql);
        $textos = array();
        while(!$result->EOF){
            $idTexto  = htmlEntities($result->fields[0]);
            $textos[$idTexto] = array(  'pt' => htmlEntities($result->fields[1]),
                                        'en' => htmlEntities($result->fields[2]),
                                        'es' => htmlEntities($result->fields[3]));
            $result->moveNext();
        }
        return $textos;
    }
    function getTextosEmPortuguesByPagina($idPagina){
        $sql = " SELECT id, texto_pt FROM textos WHERE idpagina=".$idPagina;
        $result = $this->db->execute($sql);
        $retorno = array();
        while(!$result->EOF){
            $idTexto = htmlEntities($result->fields[0]);
            $texto   = htmlEntities($result->fields[1]);
            $retorno[$idTexto] = $texto;
            $result->moveNext();
        }
        return $retorno;
    }
    function getTextosEmInglesByPagina($idPagina){
        $sql = " SELECT id, texto_en FROM textos WHERE idpagina=".$idPagina;
        $result = $this->db->execute($sql);
        $retorno = array();
        while(!$result->EOF){
            $idTexto = htmlEntities($result->fields[0]);
            $texto   = htmlEntities($result->fields[1]);
            $retorno[$idTexto] = $texto;
            $result->moveNext();
        }
        return $retorno;
    }
    function getTextosEmEspanholByPagina($idPagina){
        $sql = " SELECT id, texto_es FROM textos WHERE idpagina=".$idPagina;
        $result = $this->db->execute($sql);
        $retorno = array();
        while(!$result->EOF){
            $idTexto = htmlEntities($result->fields[0]);
            $texto   = htmlEntities($result->fields[1]);
            $retorno[$idTexto] = $texto;
            $result->moveNext();
        }
        return $retorno;
    }
}
?>
