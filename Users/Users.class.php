<?php
class Users{
    var $textos;
    function Users(){
        $this->textos = array();
    }

    function getUserByUserSenha($user, $senha){
        $UsersDAO = new UsersDAO();
        return $UsersDAO->getUserByUserSenha($user, $senha);
    }
    function get(){
        $UsersDAO = new UsersDAO();
        return $UsersDAO->get();
    }
    function getUsers(){
        $UsersDAO = new UsersDAO();
        return $UsersDAO->getUsers();
    }
    function cadastrar($login, $senha, $nome, $formacao, $local, $email, $tipo){
        $UsersDAO = new UsersDAO();
        return $UsersDAO->cadastrar($login, $senha, $nome, $formacao, $local, $email, $tipo);
    }
    function getUsersByCod($CodUsers){
        $UsersDAO = new UsersDAO();
        return $UsersDAO->getUsersByCod($CodUsers);
    }
    function alterarUsersByCod($cod, $login, $nome, $formacao, $local, $email, $tipo){
        $UsersDAO = new UsersDAO();
        return $UsersDAO->alterarUsersByCod($cod, $login, $nome, $formacao, $local, $email, $tipo);
    }
    function alterarSenhaByCod($cod, $senha){
        $UsersDAO = new UsersDAO();
        return $UsersDAO->alterarSenhaByCod($cod, $senha);
    }
    function excluirUsersByCod($codUsers){
        $UsersDAO = new UsersDAO();
        return $UsersDAO->excluirUsersByCod($codUsers);
    }
}
?>
