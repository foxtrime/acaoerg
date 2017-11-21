<?php
class ResumoDAO{
    var $db;
    function ResumoDAO(){
        $Conexao  = new Conexao();
        $this->db = $Conexao->getConexao();
    }
    
    function cadastrar($resumo, $email, $idArtigo){
        $sql = " INSERT INTO resumos(resumo, email, idartigo) ";
        $sql.= " VALUES('".$resumo."', '".$email."', ".$idArtigo.")";
        $this->db->execute($sql);
    }
    
    function excluirResumoByCod($codResumo){
        $sql  = " DELETE FROM resumos WHERE id=".$codResumo;
        $this->db->execute($sql);
    }
    
    function alterarResumoByCod($idResumo, $resumo, $email, $idArtigo){
        $sql  = " UPDATE resumos SET ";
        $sql .= " resumo    = '".$resumo."', ";
        $sql .= " email     = '".$email."', ";
        $sql .= " idartigo  = ".$idArtigo;
        $sql .= " WHERE id  =".$idResumo;
        $this->db->execute($sql);
    }
    
    function getResumoByCod($codArtigo){
        $sql = " SELECT resumo, email, id ";
        $sql.= " FROM resumos WHERE idartigo=".$codArtigo;
        $result = $this->db->execute($sql);
        $textos = array();
        $textos['resumo'] = htmlEntities($result->fields[0]);
        $textos['email']  = htmlEntities($result->fields[1]);
        $textos['id']     = htmlEntities($result->fields[2]);
        return $textos;
    }
    
    function getResumo(){
        $sql = " SELECT a.titulo, a.autores, r.id, r.resumo, r.email, r.idartigo ";
        $sql.= " FROM artigo a , resumos r ";
        $sql.= " WHERE r.idartigo = a.codigoDoartigo ";
        $result = $this->db->execute($sql);
        $textos = array();
        while(!$result->EOF){
            $idArtigo  = $result->fields[0];
            $textos[$idArtigo] = array(  'tit'      => htmlEntities($result->fields[0]),
                                         'aut'      => htmlEntities($result->fields[1]),
                                         'id'       => htmlEntities($result->fields[2]),
                                         'resumo'   => htmlEntities($result->fields[3]),
                                         'email'    => htmlEntities($result->fields[4]),
                                         'idArtigo' => htmlEntities($result->fields[5]));
            $result->moveNext();
        }
        return $textos;
    }
}
?>
