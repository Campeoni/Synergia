<?php
	require_once("class/class.php");
	$class_Titulocomenzados =new Titulocomenzados();
	

	switch ($_GET["accion"]) {
	    case "eliminar":
	        $class_Titulocomenzados->eliminar_tit_comenzados($_GET['id']);
	        break;
	    case "editar":
	        if ((isset($_POST["grabar"])) and $_POST["grabar"]=="si")
		    {
		      	$class_Titulocomenzados->edit_reg_tit_comenzados($_POST["titulo"],$_POST["id"]);
		    	exit;
		    }
		    
			$reg_tit_comenzados=$class_Titulocomenzados->get_titulo_comenzados_por_id($_GET["id"]);
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

			<body onload="limpiarPlan()">
				<form name="form" action="abm-tit-comenzados.php?accion=editar&id=<?php echo $_GET["id"];?>" method="post">
					<h2>Titulo</h2>
					
					<input type="text" name="titulo" value="<?php echo $reg_tit_comenzados;?>" />

					<input type="hidden" name="grabar" value="si">
					<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">

					<input type="button" value="Volver" title="Volver" onClick="window.location='tit-comenzados.php';">
					&nbsp;&nbsp;||&nbsp;&nbsp;
					<input type="button" value="Editar" title="Editar" onclick="validarPlan();" />
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
		      	$class_Titulocomenzados->agregar_reg_tit_comenzados($_POST["id"],$_POST["titulo"]);
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
				<form name="form" action="abm-tit-comenzados.php?accion=agregar&id=0" method="post">
					
					<input type="text" name="titulo" value="" />

					<input type="hidden" name="grabar" value="si">
					<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">

					<input type="button" value="Volver" title="Volver" onClick="window.location='tit-comenzados.php';">
					&nbsp;&nbsp;||&nbsp;&nbsp;
					<input type="button" value="agregar" title="agregar" onclick="validarPlan();" />
				</form>

				<script src="js/jquery-1.11.1-min.js"></script>
				<script src="js/bootstrap.js"></script>


			</body>
			</html>

			<?php
	        break;
}
?>
   


