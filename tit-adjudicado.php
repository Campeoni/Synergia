<?php
	require_once("class/class.php");
	$class_TituloAdjudicados =new TituloAdjudicados();

	// recupera todos los titulos que existan actualmente.
	$ordenado_por = 'id';
	$reg_tit_adjudicados=$class_TituloAdjudicados->get_titulo_adjudicados($ordenado_por)
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Synergya - Titulo Adjudicados</title>
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
    		<div class="container">

 				<a 	href="javascript:void(0);" onClick="window.location='abm-tit-adjudicado.php?accion=agregar&id=0>';">
				<img src="imagenes/iconos/editar.png" title= "agregar un nuevo plan" border="0" />
				</a>			
		
		                <h1 align="center">Administrador de planes adjudicados</h1>

		                <table border="1" cellspacing="0" cellpadding="0">
			                <tr>	
			                    <td width="80" valign="top"><p align="center"><strong>Nº Plan</strong></p></td>
			                    <td width="500" valign="top"><p align="center"><strong>Titulo plan</strong></p></td>
		                </table>	

                <?php
                
                $i = 0;
					while ($i<sizeof($reg_tit_adjudicados))
					{
				?>

							<table border="1" cellspacing="0" cellpadding="0">
								<tr>
				                    <td width="80" valign="top"><p align="center"><?php echo $reg_tit_adjudicados[$i]["tit_id"];?></p></td>
				                    <td width="500" valign="top"><p align="center"><?php echo $reg_tit_adjudicados[$i]["tit_titulo"];?></p></td>
				                </tr>
				            </table>
				                <a 	href="javascript:void(0);" onClick="window.location='abm-tit-adjudicado.php?accion=editar&id=<?php echo $reg_tit_adjudicados[$i]["tit_id"];?>';">
								<img src="imagenes/iconos/editar.png" title= "editar el plan" border="0" />
								</a>
								<a 	href="javascript:void(0);" onClick="window.location='abm-tit-adjudicado.php?accion=eliminar&id=<?php echo $reg_tit_adjudicados[$i]["tit_id"];?>';">
								<img src="imagenes/iconos/eliminar.png" title= "eliminar el plan" border="0" />
								</a>

				<?php								
							 $i++;
							
						}
				?>

				<p>&nbsp;</p>
				<input type="button" value="Volver" title="Volver" onClick="window.location='adjudicados-usuario.php';">
			</div>
		</div>
	</div>

		<script src="js/jquery-1.11.1-min.js"></script>
		<script src="js/bootstrap.js"></script>


</body>
</html>







