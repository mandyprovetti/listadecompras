<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastrar produto</title>

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
	<div class="conteudo container-fluid">
	<?PHP include "header.php"; ?>
	<br />
	<a href="produtos.php" class="btn btn-primary pull-right">Voltar</a>
	<br />

<?PHP
include "Conexao.php";
?>
		<?PHP
	
	if(isset($_POST['nome']) && $_POST['quantidade'] && $_POST['preco_compra'] && $_POST['categoria'] ){

	$nome = $_POST['nome'];
	$quantidade = $_POST['quantidade'];
	$preco_compra = $_POST['preco_compra'];
	$categoria = $_POST['categoria'];

		if(($nome!="") ||  ($quantidade!="") ||($preco_compra!="")  || ($categoria!=""))
			{
			
				//Inserindo os dados do usuario no banco de dados
				include "Conexao.php";
				$sql = "INSERT INTO tb_produtos  
						(`prd_nome`,`prd_quantidade`,`prd_preco_compra`,`ctg_id`)
						VALUES 
						('$nome','$quantidade','$preco_compra','$categoria')
						";
				$result = mysqli_query($conexao, $sql ) 
				or die ("Não foi possível executar a inserção.");
				if ($result) 
	?>
				<div class="msg">
					<br />
					<p class="bg-success text-center">Dados inseridos com sucesso!</p>
				</div>
				
	<?php   } 
	} ?>
	
	
	<FORM class="form-horizontal" method="post" action="#">
	<div class="form-group">
		<label for="nome" class="col-sm-2 control-label">NOME*:</label>
		<div class="col-sm-10">
			<input id="nome" class="form-control required" type="text" name="nome">
		</div>
	</div>
	<div class="form-group">
		<label for="quantidade" class="col-sm-2 control-label">QUANTIDADE*:</label>
		<div class="col-sm-10">
			<input id="quantidade" class="form-control required" type="text" name="quantidade">
		</div>
	</div>
	<div class="form-group">
		<label for="preco" class="col-sm-2 control-label">PRECO COMPRA*:</label>
		<div class="col-sm-10"> 
			<input id="preco" class="form-control required" type="text" name="preco_compra">
		</div>
	</div>
	<div class="form-group">
		<label for="categoria" class="col-sm-2 control-label">CATEGORIA*:</label>
		<div class="col-sm-10"> 
			<select id="categoria" class="form-control select required" name="categoria">
				<?php $select1 = "Select ctg_id, ctg_nome from tb_categorias";
					$resultado_sql1 = mysqli_query($conexao, $select1) or die ("Não foi possível executar a consulta.");
					if ($result=mysqli_query($conexao,$select1))
					{
						while( $resultado1 = mysqli_fetch_row($result) ){
							echo '<option value="'.$resultado1[0].'">'.$resultado1[1].'</option>';
						}
						 mysqli_free_result($result);
					}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input class="btn btn-primary btn-gravar" type="submit" name="gravar" value="Gravar">
		</div>
	</div>
	* Campos obrigatorios para preenchimento
	</FORM>
	


</div>
<?PHP include "footer.php"; ?>
</body>
</html>