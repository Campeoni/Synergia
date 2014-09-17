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
		<header>
			<div id="container">
				<?php include ('estaticas/encabezado.html');	?>	
			</div>

		</header>
		
    		<div class="btn-group btn-group-justified">
			  <a href="#" class="btn btn-primary">Planes de ahorro</a>
			  <a href="#" class="btn btn-primary">Adjudicados</a>
			  <a href="#" class="btn btn-primary">Comenzados</a>
			  <a href="#" class="btn btn-primary">Vender mi plan</a>
			</div>			

				<a 	href="javascript:void(0);" onClick="window.location='abm-adjudicado.php?accion=agregar&id=0>';">
				<img src="imagenes/iconos/editar.png" title= "agregar registro" border="0" />
				</a>			
					
				<a 	href="javascript:void(0);" onClick="window.location='tit-adjudicado.php?accion=mostrar>';">
				<img src="imagenes/iconos/editar.png" title= "administrador titulo adjudicado" border="0" />
				</a>		
							
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
					                
						                <td><a 	href="javascript:void(0);" onClick="window.location='abm-adjudicado.php?accion=editar&id=<?php echo $reg_adjudicados[$i]["adj_id"];?>';">
										<img src="imagenes/iconos/editar.png" title= "editar registro" border="0" />
										</a>
										<a 	href="javascript:void(0);" onClick="window.location='abm-adjudicado.php?accion=eliminar&id=<?php echo $reg_adjudicados[$i]["adj_id"];?>';">
										<img src="imagenes/iconos/eliminar.png" title= "eliminar registro" border="0" />
										</a>
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
                 
				<p>&nbsp;</p>
				<input type="button" value="Salir" title="Salir" onClick="window.location='index-usuario.php';">

		<script src="js/jquery-1.11.1-min.js"></script>
		<script src="js/bootstrap.js"></script>


</body>
</html>