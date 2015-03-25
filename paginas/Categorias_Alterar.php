<?PHP

$id = $_GET['id'];

if (isset($id))
	{
		echo $id ;
	}
?>

<html>
<head>
	<title>Pagina CATEGORIAS</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>

<body>
	<div class="conteudo">
	<div class="header">S&iacute;tio S&atilde;o Jos&eacute;</div>
	<div id="log">
	</div>
	OPCOES: 
	<a href="clientes.php">CLIENTES</a>
	| 
	<a href="produtos.php">PRODUTOS</a>
	|
	<a href="estoque.php">ESTOQUE</a>
	| 
	<a href="fabricantes.php">FABRICANTES</a> 
	| 
	CATEGORIAS
	| <a href="usuarios.php">USUARIOS</a>
	<br><hr><br>
	
	<br><br>
</body>
</html>

<?PHP
	//include "Conexao.php";
	
	echo '
	
	<form method="post" action="">
	ID: <input type="text" name="id"> <br>
	NOME: <input type="text" name="nome"><br>
	STATUS: <input type="text" name="status">
	</form>
	
	';
?>
<html><body>
<a href="http://localhost/EComerce/paginas/usuarios.php">Voltar</a>
</body></html>

</div>