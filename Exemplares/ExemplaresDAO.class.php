<?php
class ExemplaresDAO{
    var $db;
    function ExemplaresDAO(){
        $Conexao = new Conexao();
        $this->db = $Conexao->getConexao();
    }
    function cadastrar($nome, $ISSN, $entidadeMantenedora, $mesDoExemplar, $anoDoExemplar, $numeroDoExemplar, $volumeDoExemplar, $status, $capa){
        /**
        *   Cadastra um Exemplares no banco de dados
        */
        $sql  = " INSERT INTO exemplares(nome, ISSN, entidadeMantenedora, mesDoExemplar, anoDoExemplar, numeroDoExemplar, volumeDoExemplar, status, capa) ";
        $sql .= " VALUES('".$nome."','".$ISSN."','".$entidadeMantenedora."','".$mesDoExemplar."','".$anoDoExemplar."','".$numeroDoExemplar."','".$volumeDoExemplar."','".$status."','".$capa."')";
        $this->db->execute($sql);
    }
    function excluirExemplarByCod($codExemplar){
        /**
        *   Exclui um registro de exemplar do Banco de Dados
        */
        $sql  = " DELETE FROM exemplares WHERE codigoDoExemplar=".$codExemplar;
        $this->db->execute($sql);
    }
    function alterarExemplarByCod($cod, $nome, $ISSN, $entidadeMantenedora, $mesDoExemplar, $anoDoExemplar, $numeroDoExemplar, $volumeDoExemplar, $status){
        /**
        *   Altera os dados de um registro de exemplar do banco de dados
        */
        $sql  = " UPDATE exemplares SET ";
        $sql .= " nome = '".$nome."', ";
        $sql .= " ISSN = '".$ISSN."', ";
        $sql .= " entidadeMantenedora = '".$entidadeMantenedora."', ";
        $sql .= " mesDoExemplar = '".$mesDoExemplar."', ";
        $sql .= " anoDoExemplar = '".$anoDoExemplar."', ";
        $sql .= " numeroDoExemplar = '".$numeroDoExemplar."', ";
        $sql .= " volumeDoExemplar = '".$volumeDoExemplar."', ";
        $sql .= " status = '".$status."' ";
        $sql .= " WHERE codigoDoExemplar=".$cod;
        $this->db->execute($sql);
    }
    function alterarLogoById($id, $imagem_nome){
        $sql  = " UPDATE exemplares SET ";
        $sql .= " capa = '".$imagem_nome."' ";
        $sql .= " WHERE codigoDoExemplar=".$id;
        $this->db->execute($sql);
    }
    function getExemplarByCod($codExemplar){
        /**
        *   Pega todos os dados de um registro de exemplares no banco
        *   de dados para carregar o formulario de edicao
        *   Retorna um array
        */
        $sql = " SELECT nome, ISSN, entidadeMantenedora, mesDoExemplar, anoDoExemplar, numeroDoExemplar, volumeDoExemplar, status, capa ";
        $sql.= " FROM exemplares  WHERE codigoDoExemplar=".$codExemplar ;
        $result = $this->db->execute($sql);
        $textos = array();
        $textos['nome']   = htmlEntities($result->fields[0]);
        $textos['issn']   = htmlEntities($result->fields[1]);
        $textos['entid']  = htmlEntities($result->fields[2]);
        $textos['mes']    = htmlEntities($result->fields[3]);
        $textos['ano']    = htmlEntities($result->fields[4]);
        $textos['num']    = htmlEntities($result->fields[5]);
        $textos['vol']    = htmlEntities($result->fields[6]);
        $textos['status'] = htmlEntities($result->fields[7]);
        $textos['capa']   = htmlEntities($result->fields[8]);
        return $textos;
    }
    function getExemplares(){
        $sql = " SELECT codigoDoExemplar, nome, ISSN, entidadeMantenedora, mesDoExemplar, anoDoExemplar, numeroDoExemplar, volumeDoExemplar, status, capa ";
        $sql.= " FROM exemplares ";
        $result = $this->db->execute($sql);
        $textos = array();
        while(!$result->EOF){
            $codExemplar  = $result->fields[0];
            $textos[$codExemplar] = array(  'nome'   => htmlEntities($result->fields[1]),
                                            'issn'   => htmlEntities($result->fields[2]),
                                            'entid'  => htmlEntities($result->fields[3]),
                                            'mes'    => htmlEntities($result->fields[4]),
                                            'ano'    => htmlEntities($result->fields[5]),
                                            'num'    => htmlEntities($result->fields[6]),
                                            'vol'    => htmlEntities($result->fields[7]),
                                            'status' => htmlEntities($result->fields[8]),
                                            'capa'   => htmlEntities($result->fields[9]));
            $result->moveNext();
        }
        return $textos;
    }
    function getExemplarByStatus($status){
      $sql = " SELECT codigoDoExemplar, nome, mesDoExemplar, anoDoExemplar, numeroDoExemplar, volumeDoExemplar ";
      $sql.= " FROM exemplares ";
      $sql.= " WHERE status='".$status."' ORDER BY codigoDoExemplar DESC ";
      $result = $this->db->execute($sql);
        $textos = array();
      while(!$result->EOF){
        $codExemplar = $result->fields[0];
        $textos[$codExemplar] = array('nome' => htmlEntities($result->fields[1]),
                                      'mes'  => htmlEntities($result->fields[2]),
                                      'ano'  => htmlEntities($result->fields[3]),
                                      'num'  => htmlEntities($result->fields[4]),
                                      'vol'  => htmlEntities($result->fields[5]));
        $result->moveNext();
      }
      return $textos;
    }
}
?>
