<?php
require_once("class/class.php");
$Class_comenzados =new comenzados();
$reg_comenzados=$Class_comenzados->get_comenzados();
$Class_Titulocomenzados =new Titulocomenzados();
error_reporting(0);
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Synergya - Comenzados</title>
	<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
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
		<div id="consultarPlan">
			<span id="cerrarConsultarPlan" class="glyphicon glyphicon-remove"></span>
			<p class="text-center"><b><i>Consultar por este plan</i></b></p>
			<form class="form-inline" role="form">
				<div class="form-group">
	      			<label class="sr-only" for="exampleInputName">Nombre</label>
	      		      <input type="name" class="form-control" id="exampleInputName" placeholder="Nombre">
	      		 	</div>
	      		<div class="form-group">
      		      <label class="sr-only" for="exampleInputEmail1">Email</label>
      		      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="mail@ejemplo.com">
	      		</div>
	      		<div class="form-group">
      		      <label class="sr-only" for="exampleInputPhone">Teléfono</label>
      		      <input type="name" class="form-control" id="exampleInputPhone" placeholder="Teléfono">
      		 	</div>
    	  		 <button id="enviar" type="submit" class="btn btn-default">Enviar</button>
	      	</form>
	    </div>		
<?php
                	$i = 0;
	            	while ($i<sizeof($reg_comenzados))
					{				
		
                		$plan_ant = $reg_comenzados[$i]["com_plan"];
                		$c = 1;
                		//recupera el titulo del plan.
                		$reg_titulo_comenzados=$Class_Titulocomenzados->get_titulo_comenzados_por_id($reg_comenzados[$i]["com_plan"]) 
                ?>
		
		                <h1 class="text-center"><?php echo $reg_titulo_comenzados;?></h1>
		               <div class="table-responsive">
		               <table class="table table-striped table-middle">
                 		 <tr>
		                    <th>#</th>
		                    <th>Modelo</th>
		                    <th>Estado</th>
		                    <th>Ctas/Plan</th>
		                    <th>Precio</th>
		                    <th>Cuota</th>
		                    <th>Concesion</th>
		                    <th></th>
		                  </tr>


                <?php
                
						while ($plan_ant == $reg_comenzados[$i]["com_plan"])
						{ 
					?>							
									<tr>
					                    <td ><?php echo $c; ?></td>
					                    <td><?php echo $reg_comenzados[$i]["com_modelo"];?></td>
					                    <td><?php echo $reg_comenzados[$i]["com_estado"];?></td>
					                    <td><?php echo $reg_comenzados[$i]["com_cuota_plan"];?></td>
					                    <td>$<?php echo $reg_comenzados[$i]["com_precio"];?></td>
					                    <td><?php echo $reg_comenzados[$i]["com_cuota"];?></td>
					                    <td><?php echo $reg_comenzados[$i]["com_concesion"];?></td>
					                
						                <td><!--
						                <a class="btn btn-xs btn-success mostrar" href="javascript:void(0);" onClick="window.location='abm-comenzados.php?accion=editar&id=<?php echo $reg_comenzados[$i]["com_id"];?>';">Consultar</a>
						                -->
						                <a class="btn btn-xs btn-success mostrar">Consultar</a>
										</td>		
									</tr> 
					<?php								
								 $i++;
								 $c++;
								
							} // cierre del 2 while
					?>		
							</table>

							</div>
					<?php				
					} // cierre del 1 while

				?>
		<script src="js/jquery-1.11.1-min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/funciones.js"></script>

		<script>$(document).ready( inicializador );</script>


</body>
</html>