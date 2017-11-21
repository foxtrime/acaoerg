<?php
class ArtigosDAO{
    var $db;
    function ArtigosDAO(){
        /**
        *   Metodo Construtor da classe. Com ele, ao instanciar a classe, uma
        *   nova conexao com o Banco de Dados e criada nao havendo a necessidade de
        *   Usar uma variavel global
        */
        $Conexao = new Conexao();
        $this->db = $Conexao->getConexao();
    }
    function cadastrar($codExemplar, $tit, $aut, $pagInicial, $pagFinal, $palChave, $status, $email, $resumo, $arquivo){
        /**
        *   Cadastra um Artigo no banco de dados
        */
        $sql = " INSERT INTO artigos(codigoDoExemplar, titulo, autores, paginaInicial, paginaFinal, palavrasChave, status, email, resumo, arquivo) ";
        $sql.= "VALUES('".$codExemplar."', '".$tit."', '".$aut."', '".$pagInicial."', '".$pagFinal."', '".$palChave."', '".$status."', '".$email."', '".$resumo."', '".$arquivo."')";
        $this->db->execute($sql);
    }
    function excluirArtigoByCod($codArtigo){
        /**
        *   Exclui um registro de artigo do Banco de Dados
        */
        $sql  = " DELETE FROM artigos WHERE codigoDoArtigo=".$codArtigo;
        $this->db->execute($sql);
    }
    function alterarArtigoByCod($codArtigo, $codExemplar, $titulo, $email, $autores, $pagInicial, $pagFinal, $palChave, $resumo, $status){
        /**
        *   Altera os dados de um registro de textos do banco de dados
        */
        $sql  = " UPDATE artigos SET ";
        $sql .= " codigoDoExemplar = '".$codExemplar."', ";
        $sql .= " titulo = '".$titulo."', ";
        $sql .= " email = '".$email."', ";
        $sql .= " autores = '".$autores."', ";
        $sql .= " paginaInicial = '".$pagInicial."', ";
        $sql .= " paginaFinal = '".$pagFinal."', ";
        $sql .= " palavrasChave = '".$palChave."', ";
        $sql .= " resumo = '".$resumo."', ";
        $sql .= " status = '".$status."' ";
        $sql .= " WHERE codigoDoArtigo=".$codArtigo;
        $this->db->execute($sql);
    }
    function alterarArtigoById($id, $arquivo){
        $sql  = " UPDATE artigos SET ";
        $sql .= " arquivo = '".$arquivo."' ";
        $sql .= " WHERE codigoDoArtigo=".$id;
        $this->db->execute($sql);
    }
    function getArtigosByCod($codArtigo){
        /**
        *   Pega todos os dados de um registro de artigo no banco
        *   de dados para carregar o formulario de edicao
        *   Retorna um array
        */
        $sql = " SELECT codigoDoExemplar, titulo, autores, paginaInicial, paginaFinal, palavrasChave, status, email, resumo, arquivo ";
        $sql.= " FROM artigos WHERE codigoDoArtigo=".$codArtigo;
        $result = $this->db->execute($sql);
        $textos = array();
        $textos['codExemplar'] = htmlEntities($result->fields[0]);
        $textos['tit']         = htmlEntities($result->fields[1]);
        $textos['aut']         = htmlEntities($result->fields[2]);
        $textos['pagInicial']  = htmlEntities($result->fields[3]);
        $textos['pagFinal']    = htmlEntities($result->fields[4]);
        $textos['palChave']    = htmlEntities($result->fields[5]);
        $textos['status']      = htmlEntities($result->fields[6]);
        $textos['email']       = htmlEntities($result->fields[7]);
        $textos['resumo']      = htmlEntities($result->fields[8]);
        $textos['arquivo']     = htmlEntities($result->fields[9]);
        return $textos;
    }
    function getArtigos(){
        $sql = " SELECT codigoDoArtigo, codigoDoExemplar, titulo, autores, paginaInicial, paginaFinal, palavrasChave, status, email, resumo, arquivo ";
        $sql.= " FROM artigos ";
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
                                         'status'      => htmlEntities($result->fields[7]),
                                         'email'       => htmlEntities($result->fields[8]),
                                         'resumo'      => htmlEntities($result->fields[9]),
                                         'arquivo'     => htmlEntities($result->fields[10]));
            $result->moveNext();
        }
        return $textos;
    }
    function getArtigosBloco(){
		$sql = " SELECT artigos.codigoDoArtigo, exemplares.nome, artigos.titulo, artigos.autores, artigos.paginaInicial, artigos.paginaFinal, artigos.palavrasChave, artigos.status, artigos.email, artigos.resumo, artigos.arquivo ";
        $sql.= " FROM artigos ";
        $sql.= " LEFT JOIN exemplares ON exemplares.codigoDoExemplar=artigos.codigoDoExemplar ";
        
		
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
                                         'status'      => htmlEntities($result->fields[7]),
                                         'email'       => htmlEntities($result->fields[8]),
                                         'resumo'      => htmlEntities($result->fields[9]),
                                         'arquivo'     => htmlEntities($result->fields[10]));
            $result->moveNext();
        }
        return $textos;
    }
    function getArtigosByCodExemplar($codExemplar){
        $sql = " SELECT codigoDoArtigo, titulo, autores, paginaInicial, paginaFinal, palavrasChave, status, arquivo ";
        $sql.= " FROM artigos ";
        $sql.= " WHERE codigoDoExemplar=".$codExemplar." order by codigoDoArtigo ASC ";
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
                                         'status'      => htmlEntities($result->fields[6]),
                                         'arquivo'     => htmlEntities($result->fields[7]));
            $result->moveNext();
        }
        return $textos;
    }
}
?>
