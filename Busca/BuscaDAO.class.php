<?php
class BuscaDAO{
    var $db;
    function BuscaDAO(){
        /**
        *   Metodo Construtor da classe. Com ele, ao instanciar a classe, uma
        *   nova conexao com o Banco de Dados e criada nao havendo a necessidade de
        *   Usar uma variavel global
        */
        $Conexao = new Conexao();
        $this->db = $Conexao->getConexao();
    }
    function getArtigosByBusca($busca){
        $sql = " SELECT DISTINCT a.codigoDoArtigo, a.codigoDoExemplar, a.titulo, a.autores, a.palavrasChave, e.anoDoExemplar, volumeDoExemplar, numeroDoExemplar, e.codigoDoExemplar ";
        $sql.= " FROM artigo a, exemplar e ";
        $sql.= " WHERE LOWER( titulo ) LIKE '%".$busca."%' AND e.codigoDoExemplar = a.codigoDoExemplar ";
        $sql.= " OR LOWER( autores ) LIKE '%".$busca."%' AND e.codigoDoExemplar = a.codigoDoExemplar ";
        
        $result = $this->db->execute($sql);
        $textos = array();
        while(!$result->EOF){
            $idArtigo  = $result->fields[0];
            $textos[$idArtigo] = array(  'cod' => htmlEntities($result->fields[0]),
                                         'tit' => htmlEntities($result->fields[2]),
                                         'aut' => htmlEntities($result->fields[3]),
                                         'pal' => htmlEntities($result->fields[4]),
                                         'ano' => htmlEntities($result->fields[5]),
                                         'vol' => htmlEntities($result->fields[6]),
                                         'num' => htmlEntities($result->fields[7]));
            $result->moveNext();
        }
        return $textos;
    }
}
?>
