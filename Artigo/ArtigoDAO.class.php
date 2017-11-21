<?php
class ArtigoDAO{
    var $db;
    function ArtigoDAO(){
        /**
        *   Metodo Construtor da classe. Com ele, ao instanciar a classe, uma
        *   nova conexao com o Banco de Dados e criada nao havendo a necessidade de
        *   Usar uma variavel global
        */
        $Conexao = new Conexao();
        $this->db = $Conexao->getConexao();
    }
    function cadastrar($codExemplar, $tit, $aut, $pagInicial, $pagFinal, $palChave, $status){
        /**
        *   Cadastra um Artigo no banco de dados
        */
        $sql = " INSERT INTO artigo(codigoDoExemplar, titulo, autores, paginaInicial, paginaFinal, palavrasChave, status) ";
        $sql.= "VALUES('".$codExemplar."', '".$tit."', '".$aut."', '".$pagInicial."', '".$pagFinal."', '".$palChave."', '".$status."')";
        $this->db->execute($sql);
    }
    function excluirArtigoByCod($codArtigo){
        /**
        *   Exclui um registro de artigo do Banco de Dados
        */
        $sql  = " DELETE FROM artigo WHERE codigoDoArtigo=".$codArtigo;
        $this->db->execute($sql);
    }
    function alterarArtigoByCod($codArtigo, $codExemplar, $tit, $aut, $pagInicial, $pagFinal, $palChave, $status){
        /**
        *   Altera os dados de um registro de textos do banco de dados
        */
        $sql  = " UPDATE artigo SET ";
        $sql .= " codigoDoExemplar = '".$codExemplar."', ";
        $sql .= " titulo = '".$tit."', ";
        $sql .= " autores = '".$aut."', ";
        $sql .= " paginaInicial = '".$pagInicial."', ";
        $sql .= " paginaFinal = '".$pagFinal."', ";
        $sql .= " palavrasChave = '".$palChave."', ";
        $sql .= " status = '".$status."' ";
        $sql .= " WHERE codigoDoArtigo=".$codArtigo;
        $this->db->execute($sql);
    }
    function getArtigosByCod($codArtigo){
        /**
        *   Pega todos os dados de um registro de artigo no banco
        *   de dados para carregar o formulario de edicao
        *   Retorna um array
        */
        $sql = " SELECT codigoDoExemplar, titulo, autores, paginaInicial, paginaFinal, palavrasChave, status ";
        $sql.= " FROM artigo WHERE codigoDoArtigo=".$codArtigo;
        $result = $this->db->execute($sql);
        $textos = array();
        $textos['codExemplar'] = htmlEntities($result->fields[0]);
        $textos['tit']         = htmlEntities($result->fields[1]);
        $textos['aut']         = htmlEntities($result->fields[2]);
        $textos['pagInicial']  = htmlEntities($result->fields[3]);
        $textos['pagFinal']    = htmlEntities($result->fields[4]);
        $textos['palChave']    = htmlEntities($result->fields[5]);
        $textos['status']      = htmlEntities($result->fields[6]);
        return $textos;
    }
    function getArtigos(){
        $sql = " SELECT codigoDoArtigo, codigoDoExemplar, titulo, autores, paginaInicial, paginaFinal, palavrasChave, status ";
        $sql.= " FROM artigo ";
        $result = $this->db->execute($sql);
        $textos = array();
        while(!$result->EOF){
            $idArtigo  = $result->fields[0];
            $textos[$idArtigo] = array(  'codExemplar' => htmlEntities($result->fields[1]),
                                         'tit'         => htmlEntities($result->fields[2]),
                                         'aut'         => htmlEntities($result->fields[3]),
                                         'pagInicial'  => htmlEntities($result->fields[4]),
                                         'pagFinal'    => htmlEntities($result->fields[5]),
                                         'palChave'    => htmlEntities($result->fields[6]),
                                         'status'      => htmlEntities($result->fields[7]));
            $result->moveNext();
        }
        return $textos;
    }
    function getArtigosByCodExemplar($codExemplar){
        $sql = " SELECT codigoDoArtigo, titulo, autores, paginaInicial, paginaFinal, palavrasChave, status ";
        $sql.= " FROM artigo ";
        $sql.= " WHERE codigoDoExemplar=".$codExemplar;
        $result = $this->db->execute($sql);
        $textos = array();
        while(!$result->EOF){
            $idArtigo  = $result->fields[0];
            $textos[$idArtigo] = array(  'codArtigo'   => htmlEntities($result->fields[0]),
                                         'tit'         => htmlEntities($result->fields[1]),
                                         'aut'         => htmlEntities($result->fields[2]),
                                         'pagInicial'  => htmlEntities($result->fields[3]),
                                         'pagFinal'    => htmlEntities($result->fields[4]),
                                         'palChave'    => htmlEntities($result->fields[5]),
                                         'status'      => htmlEntities($result->fields[6]));
            $result->moveNext();
        }
        return $textos;
    }
}
?>
