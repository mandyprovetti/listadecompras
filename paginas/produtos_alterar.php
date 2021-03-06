<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alterar produto</title>

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
		<?PHP include "header.php"; ?>
		<br />
		<a href="produtos.php" class="btn btn-primary pull-right">Voltar</a>
		<br />

	<?PHP
	include "Conexao.php";
	$id = $_GET['id'];
	$select = "Select prd_nome, prd_quantidade, prd_preco_compra from tb_produtos where prd_id='".$id."'";
	$resultado_sql = mysqli_query($conexao, $select) or die ("Não foi possível executar a consulta.");
	?>
	
	<form class="form-horizontal" method="post" action="altera_produto.php">
	<?PHP while($resultado = mysqli_fetch_array($resultado_sql))
	{ ?>
		<input type="hidden" value="<?=$id?>" name="id" />
		<div class="form-group">
			<label for="nome" class="col-sm-2 control-label">NOME*:</label>
			<div class="col-sm-10">
				<input id="nome" class="form-control required" type="text" name="nome" value="<?=$resultado[0]?>">
			</div>
		</div>
		<div class="form-group">
			<label for="quantidade" class="col-sm-2 control-label">QUANTIDADE*:</label>
			<div class="col-sm-10">
				<input id="quantidade" class="form-control required" type="text" name="quantidade" value="<?=$resultado[1]?>">
			</div>
		</div>
		<div class="form-group">
			<label for="preco" class="col-sm-2 control-label">PRECO COMPRA*:</label>
			<div class="col-sm-10"> 
				<input id="preco" class="form-control required" type="text" name="preco_compra" value="<?=$resultado[2]?>">
			</div>
		</div>

	<?php } ?>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input class="btn btn-primary btn-gravar" type="submit" name="gravar" value="Gravar">
		</div>
	</div>
</form>
</div>
<?PHP include "footer.php"; ?>
</body></html>
