<?php 
include "Conexao.php";
$select1 = "Select ctg_id, ctg_nome from tb_categorias";
	$resultado_sql1 = mysqli_query($conexao, $select1) or die ("Não foi possível executar a consulta.");
	$result=mysqli_query($conexao,$select1);
		$categoria = array();
		while( $resultado1 = mysqli_fetch_assoc($result) ){
			$categoria[] = $resultado1;
		}
		$graficoAux = array();
		foreach($categoria as $graf) {
			$select1 = "Select ctg_id, prd_quantidade from tb_produtos where ctg_id = '".$graf['ctg_id']."'";
			$resultado_sql1 = mysqli_query($conexao, $select1) or die ("Não foi possível executar a consulta.");
			$result=mysqli_query($conexao,$select1);
			
			while( $resultado = mysqli_fetch_assoc($result) ){
			$graficoAux[] = $resultado;
		}
		}
		$soma = array();
		for($i=0; $i < sizeof($graficoAux); $i++) {
			for($j=0; $j < sizeof($categoria); $j++) {
				if($categoria[$j]['ctg_id'] == $graficoAux[$i]['ctg_id']){
					$soma[$j]['qtd']=$soma[$j]['qtd']+$graficoAux[$i]['prd_quantidade'];
					$soma[$j]['id']=$graficoAux[$i]['ctg_id'];
					$soma[$j]['nome']=$categoria[$j]['ctg_nome'];
				}
			}
		}
		mysqli_free_result($result);
?>

<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gráfico</title>

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

	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
	  
	$(".categoria").each(function(){
	 var cat = [];
		  console.log($(this).value());
		  cat.push($(this).value()); 

	  });
	  
	  for(i=0; i<cat.length; i++){
		  console.log(cat[i])
	  }
	 
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Categorias', 'Gasto'],
		  <?php for ($i=0; $i < sizeof($soma); $i++) { ?>
		  ['<?php echo $soma[$i]['nome'];?>',<?php echo $soma[$i]['qtd'];?>],
		  <?php } ?>
        ]);

        var options = {
          title: 'Gastos por categoria'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>

<body>
	<div class="conteudo">
		<?PHP include "header.php"; ?>
		<br />
		<a href="produtos.php" class="btn btn-primary pull-right">Voltar</a>
		<br />

    <div id="piechart" style="width: 900px; height: 500px;"></div>
	
			
<?PHP include "footer.php"; ?>
  </body>
</html>