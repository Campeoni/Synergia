<?php
require_once("class/class.php");
$Class_adjudicados =new Adjudicados();
$reg_adjudicados=$Class_adjudicados->get_adjudicados();
$Class_TituloAdjudicados =new TituloAdjudicados();
error_reporting(0);
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Synergya - Adjudicados</title>
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
		
<?php
                	$i = 0;
	            	while ($i<sizeof($reg_adjudicados))
					{				
		
                		$plan_ant = $reg_adjudicados[$i]["adj_plan"];
                		$c = 1;
                		//recupera el titulo del plan.
                		$reg_titulo_adjudicados=$Class_TituloAdjudicados->get_titulo_adjudicado_por_id($reg_adjudicados[$i]["adj_plan"]) 
                ?>
		
		                <h1 class="text-center"><?php echo $reg_titulo_adjudicados;?></h1>
		               <div class="table-responsive">
		               <table class="table table-striped table-middle">
                 		 <tr>
		                    <th class="col-xs-1">#</th>
		                    <th class="col-xs-2">Modelo</th>
		                    <th class="col-xs-2">Estado</th>
		                    <th class="col-xs-2">Ctas/Plan</th>
		                    <th class="col-xs-1">Precio</th>
		                    <th class="col-xs-2">Cuota</th>
		                    <th class="col-xs-1">Concesion</th>
		                    <th class="col-xs-1"></th>
		                  </tr>


                <?php
                
						while ($plan_ant == $reg_adjudicados[$i]["adj_plan"])
						{ 
					?>							
									<tr>
					                    <td ><?php echo $c; ?></td>
					                    <td><?php echo $reg_adjudicados[$i]["adj_modelo"];?></td>
					                    <td><?php echo $reg_adjudicados[$i]["adj_estado"];?></td>
					                    <td><?php echo $reg_adjudicados[$i]["adj_cuota_plan"];?></td>
					                    <td>$<?php echo $reg_adjudicados[$i]["adj_precio"];?></td>
					                    <td><?php echo $reg_adjudicados[$i]["adj_cuota"];?></td>
					                    <td><?php echo $reg_adjudicados[$i]["adj_concesion"];?></td>
					                
						                <td>
						                <a class="btn btn-xs btn-success" href="javascript:void(0);" onClick="window.location='abm-adjudicado.php?accion=editar&id=<?php echo $reg_adjudicados[$i]["adj_id"];?>';">Consultar</a>
						                
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


</body>
</html>