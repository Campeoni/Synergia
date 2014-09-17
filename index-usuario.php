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
	<div id="contenedor">
		<header>
			<div id="container">
				<?php include ('estaticas/encabezado.html');	?>	
			</div>

		</header>
		
    	<div id="planes">
    		<div class="btn-group btn-group-justified">
			  <a href="#" class="btn btn-primary">Planes de ahorro</a>
			  <a href="adjudicados-usuario.php" class="btn btn-primary">Adjudicados</a>
			  <a href="comenzados-usuario.php" class="btn btn-primary">Comenzados</a>
			  <a href="adjudicados-moto.php" class="btn btn-primary">Vender mi plan</a>
			</div>
			<br/>
			<div class="container">
				<div class="row text-center">
				<div class="col-xs-6">
						<img class="responsive center-block" src="uploads/<?php echo $reg_autos[3]["aut_imagen"];?>" />
						<h3>
							<?php echo $reg_autos[3]["aut_modelo"];?>
						</h3>
						<h4>
							<small>Cuotas desdes</small> $<?php echo $reg_autos[3]["aut_cuota"];?>
							<a 	href="javascript:void(0);" onClick="window.location='editar-auto.php?id=1';">
								<img src="imagenes/iconos/editar.png" title= "editar registro" border="0" />
							</a>
						</h4>
						
					</div>
					<div class="col-xs-6">
						<img class="responsive center-block" src="uploads/<?php echo $reg_autos[2]["aut_imagen"];?>" />
						<h3>
							<?php echo $reg_autos[2]["aut_modelo"];?>
						</h3>
						<h4>
							<small>Cuotas desdes</small> $<?php echo $reg_autos[2]["aut_cuota"];?>
							<a 	href="javascript:void(0);" onClick="window.location='editar-auto.php?id=2';">
								<img src="imagenes/iconos/editar.png" title= "editar registro" border="0" />
							</a>
						</h4>
						
					</div>
					<div class="col-xs-6">
						<img class="responsive center-block" src="uploads/<?php echo $reg_autos[1]["aut_imagen"];?>" />
						<h3>
							<?php echo $reg_autos[1]["aut_modelo"];?>
						</h3>
						<h4>
							<small>Cuotas desdes</small> $<?php echo $reg_autos[1]["aut_cuota"];?>
							<a 	href="javascript:void(0);" onClick="window.location='editar-auto.php?id=3';">
								<img src="imagenes/iconos/editar.png" title= "editar registro" border="0" />
							</a>
						</h4>
						
					</div>
					<div class="col-xs-6">
						<img class="responsive center-block" src="uploads/<?php echo $reg_autos[0]["aut_imagen"];?>" />
						<h3>
							<?php echo $reg_autos[0]["aut_modelo"];?>
						</h3>
						<h4>
							<small>Cuotas desdes</small> $<?php echo $reg_autos[0]["aut_cuota"];?>
							<a 	href="javascript:void(0);" onClick="window.location='editar-auto.php?id=4';">
								<img src="imagenes/iconos/editar.png" title= "editar registro" border="0" />
							</a>
						</h4>
					</div>
				</div>
					<div class="col-xs-4">
							<a 	href="javascript:void(0);" onClick="window.location='upload.php';">
								Cambiar imagen
							</a>
					</div>
			</div>
		</div>
	</div>

		<script src="js/jquery-1.11.1-min.js"></script>
		<script src="js/bootstrap.js"></script>


</body>
</html>












