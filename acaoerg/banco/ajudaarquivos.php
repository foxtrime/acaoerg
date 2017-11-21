		if ($tipo=="teses"){
			$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
			if($arquivo)
			{
				if (!empty($arquivo)){
				/*
					nome do arquivo : cod_titulo_tese_data_defesa
					tipos mime :
						  pdf : application/pdf
						  word : application/msword
				*/
					$nome_origem = $arquivo['name'];
					$nome_origem = explode(".",$nome_origem);

					if (($nome_origem[count($nome_origem)-1]== "pdf")|($nome_origem[count($nome_origem)-1]== "doc"))
					{
						$diretorio = "../arquivos/";
						$nome = $tese."_.";
							$nome .= $nome_origem[count($nome_origem)-1];

							if (move_uploaded_file($arquivo['tmp_name'], $diretorio.$nome)){
								echo "<strong>Arquivo Enviado com sucesso!</strong>";
							}else{
								echo "<strong>Erro ao enviar seu arquivo!</strong>";
							}
					} else 	{
						echo"<strong>Tipo de arquivo n&atilde;o suportado. Use .pdf ou .doc</strong><br /><br />";
					}
				} else {
				echo"<strong>Voc&ecirc; n&atilde;o selecionou um arquivo.</strong><br /><br />\n";
				}
			} else {
				echo "<strong>Arquivo acessado de forma incorreta. Tente novamente.</strong><br /><br />\n";
			}
		}
