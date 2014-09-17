<?php
require_once("class/class.php");
$Class_adjudicadosMoto =new AdjudicadosMoto();
$reg_adjudicados_moto=$Class_adjudicadosMoto->get_adjudicados_moto();
$Class_TituloAdjudicadosMoto =new TituloAdjudicadosMoto();
error_reporting(0);
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Synergya - Adjudicados Moto</title>
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
		
    	<div id="planes">
    		<div class="btn-group btn-group-justified">
			  <a href="#" class="btn btn-primary">Planes de ahorro</a>
			  <a href="#" class="btn btn-primary">Adjudicados</a>
			  <a href="#" class="btn btn-primary">Comenzados</a>
			  <a href="#" class="btn btn-primary">Vender mi plan</a>
			</div>
			<br/>
			<div class="container">

 				<p>ATENCIÓN!</p>
                <p><strong>Si lo que usted necesita no figura en esta lista de precios consulte, ya que también hay una amplia gama de  planes en consignación que ingresan a diario.</strong></p>
                <p>&nbsp;</p>

				<a 	href="javascript:void(0);" onClick="window.location='abm-adjudicado-moto.php?accion=agregar&id=0>';">
				<img src="imagenes/iconos/editar.png" title= "agregar registro" border="0" />
				</a>			
					
				<a 	href="javascript:void(0);" onClick="window.location='tit-adjudicado-moto.php?accion=mostrar>';">
				<img src="imagenes/iconos/editar.png" title= "administrador titulo adjudicado" border="0" />
				</a>		
							
                <?php
                	$i = 0;
	            	while ($i<sizeof($reg_adjudicados_moto))
					{				
		
                		$plan_ant = $reg_adjudicados_moto[$i]["mot_plan"];
                		$c = 1;
                		//recupera el titulo del plan.
                		$reg_titulo_adjudicados_moto=$Class_TituloAdjudicadosMoto->get_titulo_adjudicado_moto_por_id($reg_adjudicados_moto[$i]["mot_plan"]) 
                ?>
		
		                <h1 align="center"><?php echo $reg_titulo_adjudicados_moto;?></h1>
		                <table border="1" cellspacing="0" cellpadding="0">
			                <tr>	
			                    <td width="80" valign="top"><p align="center"><strong>Nº Plan</strong></p></td>
			                    <td width="153" valign="top"><p align="center"><strong>Modelo</strong></p></td>
			                    <td width="130" valign="top"><p align="center"><strong>Estado</strong></p></td>
			                    <td width="152" valign="top"><p align="center"><strong>Ctas/Plan</strong></p></td>
			                    <td width="130" valign="top"><p align="center"><strong>Precio</strong></p></td>
			                    <td width="150" valign="top"><p align="center"><strong>Cuota </strong></p></td>
			                    <td width="166" valign="top"><p align="center"><strong>Concesion.</strong></p></td>
			                </tr>

		                </table>	

                <?php
                
					while ($plan_ant == $reg_adjudicados_moto[$i]["mot_plan"])
					{ 
				?>

							<table border="1" cellspacing="0" cellpadding="0">
								<tr>
				                    <td width="80" valign="top"><p align="center"><strong> <?php echo $c; ?></strong></p></td>
				                    <td width="153" valign="top"><p align="center"><?php echo $reg_adjudicados_moto[$i]["mot_modelo"];?></p></td>
				                    <td width="130" valign="top"><p align="center"><?php echo $reg_adjudicados_moto[$i]["mot_estado"];?></p></td>
				                    <td width="152" valign="top"><p align="center"><?php echo $reg_adjudicados_moto[$i]["mot_cuota_plan"];?></p></td>
				                    <td width="130" valign="top"><p align="center">$<?php echo $reg_adjudicados_moto[$i]["mot_precio"];?></p></td>
				                    <td width="150" valign="top"><p align="center"><?php echo $reg_adjudicados_moto[$i]["mot_cuota"];?></p></td>
				                    <td width="166" valign="top"><p align="center"><?php echo $reg_adjudicados_moto[$i]["mot_concesion"];?></p></td>
				                </tr>
				            </table>    
				                <a 	href="javascript:void(0);" onClick="window.location='abm-adjudicado-moto.php?accion=editar&id=<?php echo $reg_adjudicados_moto[$i]["mot_id"];?>';">
								<img src="imagenes/iconos/editar.png" title= "editar registro" border="0" />
								</a>
								<a 	href="javascript:void(0);" onClick="window.location='abm-adjudicado-moto.php?accion=eliminar&id=<?php echo $reg_adjudicados_moto[$i]["mot_id"];?>';">
								<img src="imagenes/iconos/eliminar.png" title= "eliminar registro" border="0" />
								</a>

				<?php								
							 $i++;
							 $c++;
							
						}
					}
				?>
                 
				<p>&nbsp;</p>
				<input type="button" value="Salir" title="Salir" onClick="window.location='index-usuario.php';">	
			</div>
		</div>
	</div>

		<script src="js/jquery-1.11.1-min.js"></script>
		<script src="js/bootstrap.js"></script>


</body>
</html>