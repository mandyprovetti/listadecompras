<?PHP
	
	//$id = $_POST['id'];
	$nome = $_POST['nome'];
	//if (isset($id))
	//{
		if(($nome!="") || ($status!="") )
		{
			
				//Inserindo os dados do usuario no banco de dados
				include "Conexao.php";
				$sql = "INSERT INTO TB_CATEGORIAS  
						(`ctg_nome`)
						VALUES 
						('$nome')
						";
				$result = mysqli_query( $conexao, $sql) 
				or die ("N�o foi poss�vel executar a inser��o.");
				if ($result) 
					echo "Dados inseridos com sucesso!<br>";
		}
			
		else
		{
			echo "Campos obrigatorios devem ser preenchidos!";	
		}
		
	//}
	
?>