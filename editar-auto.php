<?php
	require_once("class/class.php");

	$class_autos =new autos();

	$Class_imagenes = new AdministracionImagenes();

	$ArrayImag = $Class_imagenes->RecuperarImagenes();

	    
    if (isset($_POST["grabar"]) and $_POST["grabar"]=="si")
    {


    	$class_autos->edit_reg_autos($_POST["modelo"],$_POST["descripcion"],$_POST["cuota"],$_POST["id"],$_POST["imgoriginal"]);


    	exit;
    }

	$reg_autos=$class_autos->get_auto_por_id($_GET["id"]);
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

	<!-- Funcion Java Scrip para cambiar imagen principal por la seleccionada en el SHOW MODAL -->
	<script type="text/javascript">

		var form =document.formModal;

		function cambiar () 
		{
			var resultado="ninguno"; 
			var porNombre=document.getElementsByName("radiobutonimagen"); 
			// Recorremos todos los valores del radio button para encontrar el seleccionado 
			for(var i=0;i<porNombre.length;i++) 
			{ 
				if(porNombre[i].checked) 
					resultado=porNombre[i].value;
			}
			//como la imagen esta cargada inicialmente en el HTML se puede hacer que tome esta sin necesidad de hacer un refresh.
			document.getElementById("imgprincipal").src = "uploads/"+resultado;
			document.getElementById("imgoriginal").value = resultado;
		}		
	</script>
	<!-- FIN Funcion Java Scrip para cambiar imagen principal -->

</head>

<body onload="limpiar()">
	<form name="form" action="editar-auto.php" method="post">
		<h2>Modelo</h2>
		<input type="text" name="modelo" value="<?php echo $reg_autos[0]["aut_modelo"];?>" />
		</br>
		</br>
		<h2>Descripcion</h2>
		<textarea name="descripcion" cols="35" rows="5"><?php echo $reg_autos[0]["aut_descripcion"];?></textarea>
		</br>
		</br>
		<h2>Precio</h2>
		<input type="text" name="cuota" value="<?php echo $reg_autos[0]["aut_cuota"];?>" />
		</br>
		</br>

		<input type="hidden" name="grabar" value="si">
		<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
		<input type="hidden" name="imgoriginal" id="imgoriginal" value='<?php echo $reg_autos[0]["aut_imagen"];?>'>

		<img class="responsive center-block" id="imgprincipal" src="uploads/<?php echo $reg_autos[0]["aut_imagen"];?>" />
		<a data-toggle="modal" href="#myModal" class="btn btn-primary btn-large">cambiar imagen</a>
		</br>
		</br>
		<input type="button" value="Volver" title="Volver" onClick="window.location='index-usuario.php';">
		&nbsp;&nbsp;||&nbsp;&nbsp;
		<input type="button" value="Editar" title="Editar" onclick="validar();" />
	</form>

	<div class="modal" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Seleccione una imagen</h4>
				</div>
				<div class="modal-body">
					<form name="formModal">
						<div style="height: 690px; width: 550px; overflow-y: auto;"> 
							<?php
							//Pone podas las imagenes encontradas
								for( $i = 0; $i < count($ArrayImag); $i++ ) 
								{	
									echo "<input type=\"radio\" name=\"radiobutonimagen\" value=".$ArrayImag[$i]."> ".$ArrayImag[$i];
									echo "<img class=\"responsive center-block\" src=\"uploads/".$ArrayImag[$i]."\"/> ";						
								}
							?>
						</div>
						<div class="modal-footer">
							<input type="button" value="Modificar" class="btn btn-primary" title="Modificar" onclick="cambiar();"/>
							<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
						</div>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>


	<script src="js/jquery-1.11.1-min.js"></script>
	<script src="js/bootstrap.js"></script>


</body>
</html>