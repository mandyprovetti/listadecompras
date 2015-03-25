<?PHP

	//Conectando ao servidor
	$conexao = mysqli_connect ("localhost", "apert510_listacp", "failistadecompras");
	mysqli_set_charset($conexao, 'utf8');
	if (!$conexao ){
    		die("Database connection failed: " . mysqli_connect_error());
	}
			
	
	//Conectando ao banco de dados
	$bdados = mysqli_select_db($conexao,"apert510_listadecompras"); 
	if (!$bdados ){
   		die("Database selection failed: " . mysqli_connect_error());
	}	
			
?>