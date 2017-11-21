<?php
class UsersDAO{
    var $db;
    function UsersDAO(){
        $Conexao = new Conexao();
        $this->db = $Conexao->getConexao();
    }

    function getUserByUserSenha($user, $senha){
        $sql = " SELECT nome, tipo ";
        $sql.= " FROM users WHERE login='".$user."' ";
        $sql.= " AND senha='".$senha."'";
        $result = $this->db->execute($sql);
        $textos = array();
        $textos['nome'] = $result->fields[0];
        $textos['tipo'] = $result->fields[1];
        return $textos;
    }
    function get($user, $senha){
        $sql = " SELECT * ";
        $sql.= " FROM users ";
        $result = $this->db->execute($sql);
        $textos = array();
        $textos['nome'] = $result->fields[0];
        $textos['tipo'] = $result->fields[1];
        return $textos;
    }
    function getUsers(){
        $sql = " SELECT cod, login, senha, nome, formacao, local_trabalho, email, tipo ";
        $sql.= " FROM users ";
        $result = $this->db->execute($sql);
        $textos = array();
        while(!$result->EOF){
            $cod  = $result->fields[0];
            $textos[$cod] = array(  'login' => $result->fields[1],
                                    'senha' => $result->fields[2],
                                    'nome'  => $result->fields[3],
                                    'form'  => $result->fields[4],
                                    'local' => $result->fields[5],
                                    'email' => $result->fields[6],
                                    'tipo'  => $result->fields[7]);
            $result->moveNext();
        }
        return $textos;
    }
    function cadastrar($login, $senha, $nome, $formacao, $local, $email, $tipo){
        $sql  = " INSERT INTO users(login, senha, nome, formacao, local_trabalho, email, tipo) ";
        $sql .= " VALUES('".$login."','".$senha."','".$nome."','".$formacao."','".$local."','".$email."','".$tipo."')";
        $this->db->execute($sql);
    }
    function getUsersByCod($codUsers){
        $sql = " SELECT login, senha, nome, formacao, local_trabalho, email, tipo ";
        $sql.= " FROM users WHERE cod=".$codUsers ;
        $result = $this->db->execute($sql);
        $textos = array();
        $textos['login'] = $result->fields[0];
        $textos['senha'] = $result->fields[1];
        $textos['nome']  = $result->fields[2];
        $textos['form']  = $result->fields[3];
        $textos['local'] = $result->fields[4];
        $textos['email'] = $result->fields[5];
        $textos['tipo']  = $result->fields[6];
        return $textos;
    }
    function alterarUsersByCod($cod, $login, $senha, $nome, $formacao, $local, $email, $tipo){
        $sql  = " UPDATE users SET ";
        $sql .= " login = '".$login."', ";
        $sql .= " senha = '".$senha."', ";
        $sql .= " nome = '".$nome."', ";
        $sql .= " formacao = '".$formacao."', ";
        $sql .= " local_trabalho = '".$local."', ";
        $sql .= " email = '".$email."', ";
        $sql .= " tipo = '".$tipo."' ";
        $sql .= " WHERE cod=".$cod;
        $this->db->execute($sql);
    }
    function excluirUsersByCod($codUsers){
        $sql  = " DELETE FROM users WHERE cod=".$codUsers;
        $this->db->execute($sql);
    }
}
?>
