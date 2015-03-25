<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastrar categorias</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/stylish-portfolio.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<div class="conteudo">
		<?PHP include "header.php"; 
			include "Conexao.php";
		?>
		<br />
		<a href="/paginas/categorias.php" class="btn btn-primary pull-right">Voltar</a>
	<br>
<?PHP
	
if(isset($_POST['nome'])){
	$nome = $_POST['nome'];

		if($nome!="")
		{			
				//Inserindo os dados do usuario no banco de dados
				include "Conexao.php";
				$sql = "INSERT INTO tb_categorias  
						(`ctg_nome`)
						VALUES 
						('$nome')
						";
				$result = mysqli_query( $conexao, $sql) 
				or die ("Não foi possível executar a inserção.");
				if ($result) 
?>
				<div class="msg">
					<br />
					<p class="bg-success text-center">Dados inseridos com sucesso!</p>
				</div>
<?php	}		
}
?>
	
	<FORM class="form-horizontal" method="post" action="#">	
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">NOME*:</label>
		<div class="col-sm-10">
			<input class="form-control required" type="text" name="nome"><br>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input class="btn btn-primary btn-gravar" type="submit" name="gravar" value="Gravar">
			<input class="btn btn-danger" type="reset" name="limpar" value="Limpar">
		</div>
	</div>
	* Campos obrigatorios para preenchimento
	</FORM>

</div>
<?PHP include "footer.php"; ?>

</body></html>