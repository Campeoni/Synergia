<?php
/*
|-----------------
| Chip Error Manipulation
|------------------
*/

error_reporting(-1);

/*
|-----------------
| Chip Constant Manipulation
|------------------
*/
/* mueve el directorio entero donde esta el archivo utilizado */
define( "CHIP_DEMO_FSROOT",				__DIR__ . "/" );

/*
|-----------------
| POST
|------------------
*/

if( $_POST ) {
	
	/*
	|-----------------
	| Chip Upload Class
	|------------------
	*/
	/* llama a la clase */
	require_once("class/class_upload.php");
	
	/*
	|-----------------
	| Upload(s) Directory
	|------------------
	*/
	/* Donde va a dejar los archivos*/

	$upload_directory = CHIP_DEMO_FSROOT . "uploads/";
	
	/*
	|-----------------
	| Class Instance
	|------------------
	*/
	
	/* instancia la clase*/
	$object = new chip_upload();
	
	/*
	|-----------------
	| $_FILES Manipulation
	|------------------
	*/
	
	/* se mueven los archivos para realizar el UPLOAD */
	$files = $object->get_upload_var( $_FILES['upload_file'] );

	/* Si se descomenta esta linea se ven datos adicionales */
	//------>	object->chip_print( $files );
	
	/*
	|-----------------
	| Upload File
	|------------------
	*/
	
	foreach( $files as $file ) {
	
		/*
		|---------------------------
		| Upload Inputs
		|---------------------------
		*/
		
		$args = array(
			  'upload_file'			=>	$file,
			  'upload_directory'	=>	$upload_directory,
			  'allowed_size'		=>	512000,
			  'extension_check'		=>	TRUE,
			  'upload_overwrite'	=>	FALSE,
		  );
		  
		$allowed_extensions = array(
			'pdf'	=> FALSE,
		);
		
		/*
		|---------------------------
		| Upload Hook
		|---------------------------
		*/		
		
		$upload_hook = $object->get_upload( $args, $allowed_extensions );		
		//$object->chip_print( $upload_hook );
		//exit;
		
		/*
		|---------------------------
		| Move File
		|---------------------------
		*/
		
		if( $upload_hook['upload_move'] == TRUE ) {
			
			/*
			|---------------------------
			| Any Logic by User
			|---------------------------
			*/
			
			/*
			|---------------------------
			| Move File
			|---------------------------
			*/
			
			$upload_output[] = $object->get_upload_move();
			//$object->chip_print( $upload_output );
		
		} else {
		

			/*$temp['uploaded_status'] = FALSE;
			$temp['uploaded_file'] = $upload_hook['upload_file']['name'] ;
			
			$upload_output[] = $temp;*/
		
		}
		
	
	} // foreach( $files as $file )
	

} // if( $_POST )

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Synergya upload archivos</title>
	<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
	<link href="css/spacelab.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
</head>

<body>

<div id="wrap">
  <div id="wrapdata">
    
    
    <div id="header">
      <div id="headerdata">      
        
        <div class="chipboxw1 chipstyle1">
          <div class="chipboxw1data">          
            <h2 class="margin0">UPLOAD DE ARCHIVOS</h2>
          </div>
        </div>
        
            
      </div>
    </div>
    
    <div id="content">
      <div id="contentdata">
        
        <?php if( !empty($upload_output) ): ?>
        <?php
        //$object->chip_print( $upload_output );
		foreach( $upload_output as $val ):
		?>
        <div class="chipboxw1 chipstyle2">
          <div class="chipboxw1data">          
            <h2 class="margin0"><?php echo $val['uploaded_file'] . "." . $val['uploaded_extension'] . " Imagen Cargada"; ?></h2>
           </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
        
        <div class="chipboxw1 chipstyle1">
          <div class="chipboxw1data">          
              <form method="post" action="" enctype="multipart/form-data">
                <p>Upload File 1: <input name="upload_file[]" id="upload_file[]" type="file" class="inputtext" /></p> 
                <p>Upload File 2: <input name="upload_file[]" id="upload_file[]" type="file" class="inputtext" /></p>
                <p>Upload File 3: <input name="upload_file[]" id="upload_file[]" type="file" class="inputtext" /></p>
                <p>Upload File 4: <input name="upload_file[]" id="upload_file[]" type="file" class="inputtext" /></p>
                <p>Upload File 5: <input name="upload_file[]" id="upload_file[]" type="file" class="inputtext" /></p>                 
                <input type="submit" name="submit" value="Upload File" />
              </form>
          </div>
        </div>
        
      </div>
    </div>
    
    
  </div>
</div>

</body>
</html>