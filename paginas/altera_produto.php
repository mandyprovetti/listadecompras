<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Produto alterado</title>

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

	//$id = $_GET['id'];
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$quantidade = $_POST['quantidade'];
	$preco_compra = $_POST['preco_compra'];
	//if (isset($id))
	//{
		if(($nome!="") ||  ($quantidade!="") ||($preco_compra!="") )
		{
			
				//Inserindo os dados do usuario no banco de dados
				include "Conexao.php";
				$sql = "UPDATE tb_produtos  SET
						prd_nome = '$nome', prd_quantidade = '$quantidade', prd_preco_compra='$preco_compra' 
						WHERE prd_id = '".$id."'
						";
				$result = mysqli_query($conexao, $sql ) 
				or die ("Não foi possível executar a inserção.".mysqli_error($conexao));
				if ($result) {
					?> <div class="msg">
						<br />
						<p class="bg-success text-center">Dados alterados com sucesso!</p>
					</div> <?php
				}
		}
			
	//}
	
		else
		{
			echo "Campos obrigatorios devem ser preenchidos!";	
		}
	
	
?>
<?PHP include "footer.php"; ?>
</body>
</html>