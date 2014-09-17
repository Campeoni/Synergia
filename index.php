<?php
require_once("class/class.php");
$class_autos =new Autos();
$reg_autos=$class_autos->get_autos()
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Synergya</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="css/spacelab.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
</head>
<body>
	<!-- Barra de navegación -->
	<?php include ('estaticas/encabezado.html');	?>

	<section id="myCarousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
	        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	        <li data-target="#myCarousel" data-slide-to="1"></li>
	        <!--<li data-target="#myCarousel" data-slide-to="2"></li>
	        <li data-target="#myCarousel" data-slide-to="3"></li>
	        <li data-target="#myCarousel" data-slide-to="4"></li>
	        <li data-target="#myCarousel" data-slide-to="5"></li>
	        <li data-target="#myCarousel" data-slide-to="6"></li>
	        <li data-target="#myCarousel" data-slide-to="7"></li>-->
      	</ol>
  		<div class="carousel-inner">      			
		   	<div class="item active">
		   		<img class="imagenCarrusell center-block" src="css/fotos/chery-carrusell.jpg" alt="primer slide">
			</div>
	        <div class="item">
	          <img class="imagenCarrusell center-block" src="css/fotos/volkswagen-carrusell.jpg" alt="segundo slide">
	             
	        </div>
	       <!--<div class="item">
	          <img src="css/img/carrusell_plan_citroen.jpg" alt="tercer slide">		        
	        </div>
	        <div class="item">
	          <img src="css/img/carrusell_plan_fiat.jpg" alt="cuarto slide">          
	        </div>
	        <div class="item">
	          <img class="responsive" src="css/img/carrusell_plan_ovalo.jpg" alt="quinto slide">          
	        </div>
	        <div class="item">
	          <img src="css/img/carrusell_plan_peugeot.jpg" alt="sexto slide">          
	        </div>
	        <div class="item">
	          <img src="css/img/carrusell_plan_renault.jpg" alt="septimo slide">          
	        </div>
	        <div class="item">
	          <img src="css/img/carrusell_plan_volkswagen.jpg" alt="octavo slide">          
	        </div>-->
	    </div>
	</section><!-- /.carousel -->
	<section id="planes">

		<div id="botonera" class="btn-group btn-group-justified">
		  <a href="planes.html" class="btn btn-primary">Planes</a>
		  <a href="comenzados.php" class="btn btn-primary">Comenzados</a>
		  <a href="adjudicados.php" class="btn btn-primary">Adjudicados</a>
		  <a href="#" class="btn btn-primary">Motos</a>
		</div>
		
			<!--
			<div class="row text-center">
			  <a href="#" class="btn btn-primary col-xs-3">Planes</a>
			  <a href="adjudicados.html" class="btn btn-primary col-xs-6 col-md-3">Adjudicados</a>
			  <a href="#" class="btn btn-primary col-xs-6 col-md-3">Motos</a>
			  <a href="#" class="btn btn-primary col-xs-6 col-md-3">Vender mi plan</a>
			</div>
		-->
			<div class="container">
				<div class="row text-center">
					<div class="col-xs-6 col-sm-3"><a href=""><img class="responsive center-block autito" src="uploads/<?php echo $reg_autos[0]["aut_imagen"];?>" /><h3><?php echo $reg_autos[0]["aut_modelo"];?></h3><h4><small>Cuotas desdes</small> $<?php echo $reg_autos[0]["aut_cuota"];?></h4></a></div>
					<div class="col-xs-6 col-sm-3"><a href=""><img class="responsive center-block autito" src="uploads/<?php echo $reg_autos[1]["aut_imagen"];?>" /><h3><?php echo $reg_autos[1]["aut_modelo"];?></h3><h4><small>Cuotas desdes</small> $<?php echo $reg_autos[1]["aut_cuota"];?></h4></a></div>
					<div class="col-xs-6 col-sm-3"><a href=""><img class="responsive center-block autito" src="uploads/<?php echo $reg_autos[2]["aut_imagen"];?>" /><h3><?php echo $reg_autos[2]["aut_modelo"];?></h3><h4><small>Cuotas desdes</small> $<?php echo $reg_autos[2]["aut_cuota"];?></h4></a></div>					
					<div class="col-xs-6 col-sm-3"><a href=""><img class="responsive center-block autito" src="uploads/<?php echo $reg_autos[3]["aut_imagen"];?>" /><h3><?php echo $reg_autos[3]["aut_modelo"];?></h3><h4><small>Cuotas desdes</small> $<?php echo $reg_autos[3]["aut_cuota"];?></h4></a></div>
				</div>
			</div>
	</section>

	<footer>
		<p><i>Diseño y desarrollo Ok Computer</i></p>
		<a href="www.okcomputer-it.com.ar">www.okcomputer-it.com.ar</a>
	</footer>
	
		<script src="js/jquery-1.11.1-min.js"></script>
		<script src="js/bootstrap.js"></script>

		<script>$(document).ready(function(){

         $("#myCarousel").carousel({
         	interval : 6000,
         	pause: false
         });

    });</script>
		<script src="js/funciones.js"></script>

		<script>$(document).ready( inicializador );</script>

</body>
</html>