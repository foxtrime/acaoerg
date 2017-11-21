<?php
include '../funcoes.php';
class sqlQuery {
	var $conn;
	var $result;
	function sqlQuery($sql) {
		conectar($conn);
	  	$db = mysql_select_db('revistaonline1');
		$this->result = mysql_query($sql,$conn);
	}
}

class autor{
	var $cod = 0;
	var $login = '';
	var $nome = '';
	var $formacao = '';
	var $local_trabalho = '';
	var $email = '';
	var $submissoes;
	var $submissoesPendentes;

	/*
	*	Construtor. Instancia um objeto autor. 
	*	24/10/2005 13:35
	*/
		function autor ( $cod ) {
		if ($cod) {
			$query = new sqlQuery("SELECT * FROM users WHERE cod='".$cod."' and tipo = 'autor'");
				if ($linha = mysql_fetch_array($query->result)){
				$this->cod = $cod;
				$this->setAutor (  $linha['login'], $linha['nome'], $linha['formacao'] , $linha['local_trabalho'] , $linha['email']);
			}		
		}
    }

	/*
	*	Atribui valores ao objeto autor
	*	24/10/2005 13:30
	*/


	function setAutor (  $login, $nome, $formacao , $local_trabalho , $email) {
		$this->setLogin ($login);
		$this->setNome ($nome);
		$this->setFormacao( $formacao);
		$this->setLocalDeTrabalho ($local_trabalho);
		$this->setEmail ($email);
    }

	function setLogin ($login) {
	   $this->login = $login;
    }
		
	function setNome ($nome) {
	   $this->nome = $nome;
    }

	function setFormacao( $formacao) {
	   $this->formacao = $formacao;
    }
	function setLocalDeTrabalho ($local_trabalho) {
	   $this->local_trabalho = $local_trabalho;
    }
	function setEmail ($email) {
	   $this->email = $email;
    }

	

/*
*
*
*
*/

	function addSubmissao ($artigo) {
        $this->submissoes[] = $artigo;
		$artigo->inserirSubmissao();
    }

// status das submissoes
/*'aguardando_comentario','enviar_revisao_1','aguardando_avaliacao_revisao_1','selecionar_referees','aguardando_comentarios_referees','enviar_revisao_2','em_espera','descartado'
*/
	function getSubmissoes ($tipo) {
	//	$this->submissoes[] = new submissao();
    }
	function getSubmissoesPendentes () {
		$query = new sqlQuery("SELECT cod FROM submissoes WHERE status <> 'em_espera' AND status <> 'descartado' ORDER BY status");
		if (mysql_num_rows($query->result)){
          while ($linha = mysql_fetch_array($query->result)){
            $this->submissoesPendentes[] = new submissao($linha['cod']);
          }
          return 1;
        }
        return 0;
    }


	function inserirAutor ($senha) {
	
    }
	
}

class submissao{
	var $cod = 0;
	var $titulo = '';
	var $secao = '';
	var $autor = 0;
	var $co_autores = '';
	var $d_original = '';
	var $d_revisao = '';
	var $d_aceitacao = '';
	var $palavras_chave = '';
	var $status = '';


	/*
	*	Construtor. Instancia um objeto submissao.
	*	10/11/2005 14:50
	*/
		function submissao ( $cod ) {
		if ($cod) {
			$query = new sqlQuery("SELECT * FROM submissao WHERE cod='".$cod."'");
				if ($linha = mysql_fetch_array($query->result)){
				$this->cod = $cod;
				$this->setSubmissao ( 	$linha['titulo'], $linha['secao'], $linha['autor'], $linha['co_autores'], $linha['d_original'], $linha['com_original'], $linha['d_revisao'], $linha['refereer_1'], $linha['refereer_2'], $linha['refereer_3'], $linha['com_ref_1'], $linha['com_ref_2'], $linha['com_ref_3'], 	$linha['d_aceitacao'], $linha['palavras_chave'], $linha['status']);
			}
		}
    }

	/*
	*	Atribui valores ao objeto autor
	*	24/10/2005 13:30
	*/


	function setSubmissao (	$titulo,
                        	$secao,
                        	$autor,
                        	$co_autores,
                        	$d_original,
                        	$d_revisao,
                        	$d_aceitacao,
                        	$palavras_chave,
                        	$status  )
    {
	$this->titulo= $titulo;
	$this->secao= $secao;
	$this->autor= $autor;
	$this->co_autores= $co_autores;
	$this->d_original= $d_original;
	$this->d_revisao= $d_revisao;
	$this->d_aceitacao= $d_aceitacao;
	$this->palavras_chave= $d_aceitacao;
	$this->status = $d_aceitacao;

    }


	function inserirSubmissao () {
	
    }


}


class refereer{
	var $cod = 0;
	var $nome = '';
	var $formacaoMaior = '';
	var $local_trabalho = '';
	var $email = '';
	var $submissoes;

	function refereer ( $cod ) {
		if ($cod) {
		
		}
    }

	function setRefereer (   $nome, $formacaoMaior , $local_trabalho , $email) {


	   $this->nome = $nome;
	   $this->formacaoMaior = $formacaoMaior;
	   $this->local_trabalho = $local_trabalho;
	   $this->email = $email;
    }
	
	function setNome ($nome) {
	   $this->nome = $nome;
    }

	function setFormacaoMaior( $formacaoMaior) {
	   $this->formacaoMaior = $formacaoMaior;
    }
	function setLocalDeTrabalho ($local_trabalho) {
	   $this->local_trabalho = $local_trabalho;
    }
	function setEmail ($email) {
	   $this->email = $email;
    }



	
}

?>
