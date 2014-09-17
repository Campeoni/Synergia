<?php
	require_once("class/class.php");
	$class_adjudicados =new Adjudicados();
	$class_TituloAdjudicados =new TituloAdjudicados();
	

	switch ($_GET["accion"]) {
	    case "eliminar":
	        $class_adjudicados->eliminar_adjudicado($_GET['id']);
	        break;
	    case "editar":
	        if ((isset($_POST["grabar"])) and $_POST["grabar"]=="si")
		    {
		      	$class_adjudicados->edit_reg_adjudicados($_POST["modelo"],$_POST["estado"],$_POST["cuota_plan"],$_POST["precio"],$_POST["cuota"],$_POST["concesion"],$_POST["plan"],$_POST["id"]);
		    	exit;
		    }
		    
			$reg_adjudicado=$class_adjudicados->get_adjudicado_por_id($_GET["id"]);

			?>
			<!doctype html>
			<html lang="es"><input type="button" value="Volver" title="Volver" onClick="window.location='adjudicados-usuario.php';">
			<head>
				<meta charset="UTF-8">
				<title>Synergya</title>
				<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
					<link href="css/spacelab.css" rel="stylesheet">
				<link href="css/custom.css" rel="stylesheet">
				<script language="javascript" type="text/javascript" src="js/funciones.js"></script>
			</head>

			<body onload="limpiarConcesion()">
				<form name="form" action="abm-adjudicado.php?accion=editar&id=<?php echo $_GET["id"];?>" method="post">
					<h2>Modelo</h2>
					<textarea name="modelo" cols="35" rows="5"><?php echo $reg_adjudicado[0]["adj_modelo"];?></textarea>
					</br>
					</br>
					<h2>Estado</h2>
					<input type="text" name="estado" value="<?php echo $reg_adjudicado[0]["adj_estado"];?>" />
					</br>
					</br>
					<h2>Cuota / Plan</h2>
					<textarea name="cuota_plan" cols="35" rows="5"><?php echo $reg_adjudicado[0]["adj_cuota_plan"];?></textarea>
					</br>
					</br>
					<h2>Precio</h2>
					<input type="text" name="precio" value="<?php echo $reg_adjudicado[0]["adj_precio"];?>" />
					</br>
					</br>
					<h2>Cuota</h2>
					<input type="text" name="cuota" value="<?php echo $reg_adjudicado[0]["adj_cuota"];?>" />
					</br>
					</br>
					<h2>Concesion</h2>
					<input type="text" name="concesion" value="<?php echo $reg_adjudicado[0]["adj_concesion"];?>" />
					</br>
					</br>
					<h2>Plan</h2>
					<select name="plan">
						<?php
						 	$i=0;
						 	$registros_adjudicados=$class_TituloAdjudicados->get_titulo_adjudicados("titulo");
						 	while ($i<sizeof($registros_adjudicados))
		   					{
		        				echo " <option value='".$registros_adjudicados[$i]["tit_id"]."'";
		        				if ($reg_adjudicado[0]["adj_plan"] == $registros_adjudicados[$i]["tit_id"] )
		        				{ echo " selected";}	
		        				echo ">".$registros_adjudicados[$i]["tit_titulo"]."</option>"; //concatenamos el los options para luego ser insertado en el HTML
		        				$i++;
		   					}	 
		       			?>
		   			</select>
					</br>
					</br>

					<input type="hidden" name="grabar" value="si">
					<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">

					<input type="button" value="Volver" title="Volver" onClick="window.location='adjudicados-usuario.php';">
					&nbsp;&nbsp;||&nbsp;&nbsp;
					<input type="button" value="Editar" title="Editar" onclick="validarAdjudicado();" />
				</form>

				<script src="js/jquery-1.11.1-min.js"></script>
				<script src="js/bootstrap.js"></script>


			</body>
			</html>

		<?php

	    break;

	    case "agregar":
            if ((isset($_POST["grabar"])) and $_POST["grabar"]=="si")
	    	{
	      	$class_adjudicados->agregar_reg_adjudicados($_POST["modelo"],$_POST["estado"],$_POST["cuota_plan"],$_POST["precio"],$_POST["cuota"],$_POST["concesion"],$_POST["plan"],$_POST["id"]);
	    	exit;
	    	}
	    
		?>
			<!doctype html>
			<html lang="es">
			<head>
				<meta charset="UTF-8">
				<title>Synergya</title>
				<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
					<link href="css/spacelab.css" rel="stylesheet">
				<link href="css/custom.css" rel="stylesheet">
				<script language="javascript" type="text/javascript" src="js/funciones.js"></script>
			</head>

			<body onload="limpiarConcesion()">
				<form name="form" action="abm-adjudicado.php?accion=agregar&id=0" method="post">
					<h2>Modelo</h2>
					<textarea name="modelo" cols="35" rows="5"></textarea>
					</br>
					</br>
					<h2>Estado</h2>
					<input type="text" name="estado" value="" />
					</br>
					</br>
					<h2>Cuota / Plan</h2>
					<textarea name="cuota_plan" cols="35" rows="5"></textarea>
					</br>
					</br>
					<h2>Precio</h2>
					<input type="text" name="precio" value="" />
					</br>
					</br>
					<h2>Cuota</h2>
					<input type="text" name="cuota" value="" />
					</br>
					</br>
					<h2>Concesion</h2>
					<input type="text" name="concesion" value="" />
					</br>
					</br>
					<h2>Plan</h2>
					<select name="plan">
						<?php
						 	$i=0;
						 	$registros_adjudicados=$class_TituloAdjudicados->get_titulo_adjudicados("titulo");
						 	while ($i<sizeof($registros_adjudicados))
		   					{
		        				echo " <option value='".$registros_adjudicados[$i]["tit_id"]."'";
	 	        				echo ">".$registros_adjudicados[$i]["tit_titulo"]."</option>"; //concatenamos el los options para luego ser insertado en el HTML
		        				$i++;
		   					}	 
		       			?>
		   			</select>
					</br>
					</br>

					<input type="hidden" name="grabar" value="si">
					<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">

					<input type="button" value="Volver" title="Volver" onClick="window.location='adjudicados-usuario.php';">
					&nbsp;&nbsp;||&nbsp;&nbsp;
					<input type="button" value="agregar" title="agregar" onclick="validarAdjudicado();" />
				</form>

				<script src="js/jquery-1.11.1-min.js"></script>
				<script src="js/bootstrap.js"></script>


			</body>
			</html>

			<?php
	        break;
}
?>
   


