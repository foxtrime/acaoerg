<?php
class Resumo{
    var $textos;
    
    function Resumo($idPagina = null, $idIdioma = 1){
        $this->textos = array();
    }
    
    function cadastrar($resumo, $email, $idArtigo){
        $ResumoDAO = new ResumoDAO();
        return $ResumoDAO->cadastrar($resumo, $email, $idArtigo);
    }
    
    function excluirResumoByCod($codResumo){
        $ResumoDAO = new ResumoDAO();
        return $ResumoDAO->excluirResumoByCod($codResumo);
    }
    
    function alterarResumoByCod($idResumo, $resumo, $email, $idArtigo){
        $ResumoDAO = new ResumoDAO();
        return $ResumoDAO->alterarResumoByCod($idResumo, $resumo, $email, $idArtigo);
    }
    
    function getResumoByCod($codArtigo){
        $ResumoDAO = new ResumoDAO();
        return $ResumoDAO->getResumoByCod($codArtigo);
    }
    
    function getResumo(){
        $ResumoDAO = new ResumoDAO();
        return $ResumoDAO->getResumo();
    }
}
?>
