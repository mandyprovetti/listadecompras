<!DOCTYPE HTML>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Minha lista de compras</title>

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
	
	<a class="btn btn-primary pull-right btn-cadastro" href="produtos_cadastro.php">CADASTRAR NOVO PRODUTO</a>
	<br />
<?PHP
	include "Conexao.php";
	
	//Executando comando SQL para consulta
	$select = "Select * from tb_produtos";
	$resultado_sql = mysqli_query($conexao, $select) or die ("Não foi possível executar a consulta.");
		
	//Exibindo o resultado dos campos por um vetor (fetch_array)
	echo "<table class='table table-striped table-bordered'>
				<tr class='dadosTitle'>
				<td>ID</td>
				<td>NOME</td>
				<td>QUANTIDADE</td>
				<td>PRE&Ccedil;O COMPRA</td>
				<td>CATEGORIA</td>
				<td></td>
				</tr>";
	while($resultado = mysqli_fetch_array($resultado_sql))
	{
		$ctg = $resultado[4];
		echo "	<tr class='dados'>".
				"<td>".$resultado[0]."</td>".
				"<td>".$resultado[1]."</td>".
				"<td>".$resultado[2]."</td>".
				"<td>".$resultado[3]."</td>";
				
	
	
	 $ctgResult = mysqli_query($conexao, 'select ctg_nome from tb_categorias where ctg_id="'.$ctg.'"') or die ("Não foi possível executar a consulta.");
	 while($result = mysqli_fetch_array($ctgResult)) {
		echo "<td>".$result[0]."</td>";
				
	 }
		echo "<td><a class='btn btn-primary' href='produtos_alterar.php?id=".$resultado[0]."'>Alterar</a>". 
		"<a class='btn btn-danger' href='produtos_excluir.php?id=".$resultado[0]."'>Excluir</a>".
		"</td>".
		"</tr>";
		
	}
	echo "</table>";
?>


</div>
<?PHP include "footer.php"; ?>
</body>

</html>
