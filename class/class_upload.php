<?php
/*
|-----------------
| Author:	Life.Object
| E-Mail:	life.object@gmail.com
| Website:	http://www.tutorialchip.com/
| Help:		http://www.tutorialchip.com/php-upload-class/
| Version:	1.0
| Released: December 18, 2010
| Updated: December 18, 2010
|------------------
*/

class chip_upload {
	
	/*
	|---------------------------
	| Properties
	|---------------------------
	*/
	
	private $upload_hook = array();
	
	private $args = array (
						'upload_file'		=>	NULL,
						'upload_directory'	=>	NULL,
						'allowed_size'		=>	512000,												
						'extension_check'	=>	TRUE,
						'upload_overwrite'	=>	FALSE,
					);
	
	private $allowed_extensions = array (
						
						/* Archives */
						'zip'	=> FALSE,
						'7z'	=> FALSE,
					
					  	/* Documents */
					  	'txt'	=> FALSE,
						'pdf'	=> FALSE,
					  	'doc' 	=> FALSE,
					  	'xls'	=> FALSE,
					  	'ppt'	=> FALSE,
					  
					  	/* Executables */
					  	'exe'	=> FALSE,
					
					  	/* Images */
					  	'gif'	=> FALSE,
					  	'png'	=> TRUE,
					  	'jpg'	=> TRUE,
					  	'jpeg'	=> TRUE,
					
					  	/* Audio */
					  	'mp3'	=> FALSE,
					  	'wav'	=> FALSE,
					
					  	/* Video */
					  	'mpeg'	=> FALSE,
					  	'mpg'	=> FALSE,
					  	'mpe'	=> FALSE,
					  	'mov'	=> FALSE,
					  	'avi'	=> FALSE
					
					);
	

	/*
	|---------------------------
	| Constructor
	|
	| @public
	| @param array $args
	| @param array $allowed_extensions
	|
	|---------------------------
	*/
	
	public function __construct() {
	}
	
	/*
	|---------------------------
	| Print variable in readable format
	|
	| @public
	| @param string|array|object $var
	|
	|---------------------------
	*/
	
	public function chip_print( $var ) { 
		
		echo "<pre>";
    	print_r($var);
   	 	echo "</pre>";
	
	}
	
	/*
	|---------------------------
	| Update default arguments
	| It will update default array of class i.e $args
	|
	| @private
	| @param array $args - input arguments
	| @param array $defatuls - default arguments 
	| @return array
	|
	|---------------------------
	*/
	
	private function chip_parse_args( $args = array(), $defaults = array() ) { 
		return array_merge( $defaults, $args );	 
	}
	
	/*
	|---------------------------
	| Get extension and name of file
	|
	| @private
	| @param string $file_name 
	| @return array - having file_name and file_ext
	|
	|---------------------------
	*/
	
	private function chip_extension($file_name) {
		$temp = array();
		$temp['file_name'] = strtolower( substr( $file_name, 0, strripos( $file_name, '.' ) ) );
	    $temp['file_extension'] = strtolower( substr( $file_name, strripos( $file_name, '.' ) + 1 ) );
		return $temp;
	}
	
	/*
	|---------------------------
	| Get safe string
	|
	| @private
	| @param string $var 
	| @return string
	|
	|---------------------------
	*/
	
	public function chip_safe_string( $var = "", $separator = "" ) {
		return preg_replace('|[^a-zA-Z0-9_]|',$separator,$var);
	}
	
	/*
	|--------------------------
	| Get error status of uploaded file
	|
	| @private
	| @param integer $error_code
	| @return string
	|--------------------------
	*/
	
	private function chip_upload_error( $error_code ) {
		
		switch ( $error_code ) {
		   
		   case UPLOAD_ERR_OK:
			   	$error = "All OK";
			   	break;
		   
		   case UPLOAD_ERR_INI_SIZE:
			   	$error = "The uploaded file exceeds the upload_max_filesize directive (".ini_get("upload_max_filesize").") in php.ini.";
			   	break;
		   
		   case UPLOAD_ERR_FORM_SIZE:
			   	$error = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
			   	break;
		   
		   case UPLOAD_ERR_PARTIAL:
				$error = "The uploaded file was only partially uploaded.";
			   	break;
		   
		   case UPLOAD_ERR_NO_FILE:
				$error = "No file was uploaded.";
			   	break;
		   
		   case UPLOAD_ERR_NO_TMP_DIR:
				$error = "Missing a temporary folder.";
			   	break;
		   
		   case UPLOAD_ERR_CANT_WRITE:
				$error = "Failed to write file to disk.";
			   	break;
		   
		   default:
				$error = "Unknown Error.";
		
		}
		
		return $error;
		
	}
	
	/*
	|---------------------------
	| Set default arguments
	| It will set default array of class i.e $args
	|
	| @private
	| @param array $args
	| @return 0
	|
	|---------------------------
	*/
	
	private function set_args( $args = array() ) { 
		
		$defaults = $this->get_args();
		$args = $this->chip_parse_args( $args, $defaults );
		$this->args = $args;	 
	}
	
	/*
	|---------------------------
	| Get default arguments
	| It will get default array of class i.e $args
	|
	| @public
	| @return array
	|
	|---------------------------
	*/
	
	public function get_args() { 
		return $this->args;	 
	}
	
	/*
	|---------------------------
	| Set default allowed extensions
	| It will set default array of class i.e $allowed_extensions
	|
	| @private
	| @param array $allowed_extensions
	| @return 0
	|
	|---------------------------
	*/
	
	private function set_allowed_extensions( $allowed_extensions = array() ) { 
		
		$defaults = $this->get_allowed_extensions();
		$allowed_extensions = $this->chip_parse_args( $allowed_extensions, $defaults );
		$this->allowed_extensions = $allowed_extensions;	 
	
	}
	
	/*
	|---------------------------
	| Get default allowed extensions
	| It will get default array of class i.e $allowed_extensions
	|
	| @public
	| @return array
	|
	|---------------------------
	*/
	
	public function get_allowed_extensions() { 
		return $this->allowed_extensions;	 
	}
	
	/*
	|---------------------------
	| Set Upload Var
	| It will set upload variable
	|
	| @private
	| @param string $upload_directory
	! @return boolean
	|
	|---------------------------
	*/
	
	private function set_upload_var( $files ) { 
		
		$temp = array();
		$files_upload_attributes = array( 'name', 'type', 'tmp_name', 'error', 'size' );
		
		//$this->chip_print( $files );
		$upload_files = count( $files['name'] );
		$upload_files = ( !empty( $upload_files ) ) ? $upload_files : 0 ;  		
		
		$foreachindex = 0;
		for( $i = 1; $i <= $upload_files; $i++ ) {
			
			
			foreach( $files_upload_attributes as $val ) {				
				$temp[$i][$val] =  $files[$val][$foreachindex];	
				
				if( $val == "error" ) {
					$temp[$i]['error_status'] = $this->chip_upload_error( $files[$val][$foreachindex] );
				}
											
			}
			++$foreachindex;
			
		}
		
		return $temp;
				 
	}
	
	/*
	|---------------------------
	| Get Upload Var
	| It will set upload variable
	|
	| @private
	| @param array $files
	! @return array
	|
	|---------------------------
	*/
	
	public function get_upload_var( $files = array() ) { 
		return $this->set_upload_var( $files );
	}
	
	/*
	|---------------------------
	| Set Directory Path
	| It will validate upload directory
	|
	| @private
	| @param string $upload_directory
	! @return boolean
	|
	|---------------------------
	*/
	
	private function set_directory_path( $upload_directory ) { 
		
		if( is_dir( $upload_directory ) ) {
			return 1;
		}
		
		return 0;
			 
	}
	
	/*
	|---------------------------
	| Set Directory Writable
	| It will validate writable directory
	|
	| @private
	| @param string $upload_directory
	! @return boolean
	|
	|---------------------------
	*/
	
	private function set_directory_writable( $upload_directory ) { 
		
		if( is_writable( $upload_directory ) ) {
			return 1;
		}
		
		return 0;
			 
	}
	
	/*
	|---------------------------
	| Set Upload Hook
	| It will set upload hook
	|
	| @private
	| @param array $var
	|
	|---------------------------
	*/
	
	private function set_upload_hook( $var = array() ) { 		
		$this->upload_hook = $var;			 
	}
	
	/*
	|---------------------------
	| Get Upload Hook
	| It will Get upload hook
	|
	| @public
	| @param array $var
	|
	|---------------------------
	*/
	
	public function get_upload_hook() { 		
		return $this->upload_hook;			 
	}
	
	/*
	|---------------------------
	| Set Upload
	| It will upload file.
	|
	| @private
	! @return array
	|
	|---------------------------
	*/
	
	public function set_upload( $args, $allowed_extensions ) { 
		
		/* Arguments */
		$this->set_args( $args );
		$args = $this->get_args();
		//$this->chip_print( $args );
		extract( $args );
		
		/* Allowed Extensions */
		$this->set_allowed_extensions( $allowed_extensions );
		$allowed_extensions = $this->get_allowed_extensions();
		//$this->chip_print( $allowed_extensions );
		
		/* Output */
		$temp = array();
		$temp['upload_directory'] = "Invalid - " . $upload_directory;
		$temp['upload_directory_writable'] = "Invalid - Directory is not writable";
		$temp['upload_file_extension'] = "Invalid - Extension is not allowed";
		$temp['upload_file_size'] = "Invalid - Size " . $upload_file['size'] . " bytes";
		$temp['upload_process'] = 0;
		$temp['upload_move'] = FALSE;
		$temp['upload_overwrite'] = $upload_overwrite;
		
		/* Submitted Data */
		
		$temp['upload_file']['name'] = $upload_file['name'];
		$temp['upload_file']['type'] = $upload_file['type'];
		$temp['upload_file']['tmp_name'] = $upload_file['tmp_name'];
		$temp['upload_file']['error'] = $upload_file['error'];
		$temp['upload_file']['error_status'] = $upload_file['error_status'];
		$temp['upload_file']['size'] = $upload_file['size'];
		
		/*
		|---------------------------
		| Set 1 - Directory Path Validation
		|---------------------------
		*/
		
		if( !empty($upload_directory) ) {
		
			/* Upload Directory Path Validation */
			if ( $this->set_directory_path( $upload_directory ) ) {
				
				$temp['upload_directory'] = "Valid - " . $upload_directory;
				$temp['upload_process']++;
				
				/*
				|---------------------------
				| Set 2 - Directory Write Permissions
				|---------------------------
				*/
				
				if ( $this->set_directory_writable( $upload_directory ) ) {
				
					$temp['upload_directory_writable'] = "Valid - Directory is writable";
					$temp['upload_process']++;
					$temp['upload_file']['directory'] = $upload_directory;
					
				} // if ( $this->set_directory_writable( $upload_directory ) )
			
			} // if ( $this->set_directory_path( $upload_directory ) )
		
		} // if( !empty($upload_directory) )
		
		
		if ( !empty( $upload_file['name'] ) ) {
		
			/*
			|---------------------------
			| Set 3 - Extension Validation
			|---------------------------
			*/
			
			/* File Name and Extension */
			$nameext = $this->chip_extension( $upload_file['name'] );
			$file_name = $nameext['file_name'];
			$file_extension = $nameext['file_extension'];
			
			$temp['upload_file']['nameonly'] = $file_name;
			$temp['upload_file']['extension'] = $file_extension;
			
			/* Allowed Extension - Validation */
			if ( $extension_check == FALSE ) {
				$temp['upload_file_extension'] = "Valid - Extension is allowed";
				$temp['upload_process']++;
			} 
			
			else if ( array_key_exists( $file_extension, $allowed_extensions ) && $allowed_extensions[$file_extension] == TRUE ) {
				$temp['upload_file_extension'] = "Valid - Extension is allowed";
				$temp['upload_process']++;		
			}
			
			/*
			|---------------------------
			| Set 4 - Size Validation
			|---------------------------
			*/
			
			/* Allowed Size Manipulation*/
			if ( $allowed_size >= $upload_file['size'] ) {
				$temp['upload_file_size'] = "Valid - Size " . $upload_file['size'] . " bytes";
				$temp['upload_process']++;
			}		
		
		} // if ( !empty( $upload_file['name'] ) )
		
		/*
		|---------------------------
		| Upload Move Status
		|---------------------------
		*/		
		
		if ( $temp['upload_process'] == 4 && is_uploaded_file( $upload_file['tmp_name'] ) && $upload_file['error'] == UPLOAD_ERR_OK ) {		
			$temp['upload_move'] = TRUE;
		}
		
		/*
		|---------------------------
		| Upload Hook
		|---------------------------
		*/
		
		$this->set_upload_hook( $temp );
		
		//$this->chip_print( $temp );
		
		return $temp;
			 
	}
	
	/*
	|---------------------------
	| Get Upload
	| It will upload file.
	|
	| @public
	! @return array
	|
	|---------------------------
	*/
	
	public function get_upload( $args = array(), $allowed_extensions = array() ) { 
		return $this->set_upload( $args, $allowed_extensions );	 
	}
	
	/*
	|---------------------------
	| Set Upload Move
	| It will upload file.
	|
	| @public
	! @return array
	|
	|---------------------------
	*/
	
	public function set_upload_move( $name ) { 
		
		/* Output */
		$temp = array();		
		
		/* Upload Hook */
		$upload_hook = $this->get_upload_hook();
		
		if ( $upload_hook['upload_move'] == TRUE ) {
			
			/*
			|---------------------------
			| Move Upload Manipulation
			|---------------------------
			*/
						
        	$name = ( !empty( $name ) ) ? $name : $upload_hook['upload_file']['nameonly'];
			$name = $this->chip_safe_string( $name );
			
			$extension = $upload_hook['upload_file']['extension'];
        	
			$temp_name = $upload_hook['upload_file']['tmp_name'];
			$dest_name = $upload_hook['upload_file']['directory'] . $name . "." . $extension;
			
			/*
			|---------------------------
			| Overwrite Validation
			|---------------------------
			*/
			
			if ( $upload_hook['upload_overwrite'] == FALSE ) {
				
				if ( file_exists( $dest_name ) ) {
					
					$i = 1;
					$max_loops = 100;
					while ( file_exists( $dest_name ) && $i <= $max_loops ) {
						
						$name_new = $name . "_" . $i;
						$name_new = $this->chip_safe_string( $name_new );
						
						$dest_name = $upload_hook['upload_file']['directory'] . $name_new . "." . $extension;
						
						$i++; 
						
					} // while ( file_exists( $dest_name ) )
					
				} // if ( file_exists( $dest_name ) )
				
			}
			
			/*
			|---------------------------
			| Move File
			|---------------------------
			*/
			
			$name = ( empty($name_new) ) ? $name : $name_new ;			
			
			if ( move_uploaded_file( $temp_name, $dest_name ) ) {
				
				$temp['uploaded_status'] = TRUE;
				$temp['uploaded_file'] = $name;
				$temp['uploaded_extension'] = $extension;
				$temp['uploaded_directory'] = $dest_name;
				
				
			} else {
			
				$temp['uploaded_status'] = FALSE;
				$temp['uploaded_file'] = $name;
				$temp['uploaded_extension'] = $extension;
				$temp['uploaded_directory'] = $dest_name;
			
			} // if ( move_uploaded_file( $temp_name, $dest_name ) )
			
			
		}
		
		return $temp;
		
		//return $this->set_upload_move( $name );	 
	}
	
	/*
	|---------------------------
	| Get Upload Move
	| It will upload file.
	|
	| @public
	| @param string $name
	! @return array
	|
	|---------------------------
	*/
	
	public function get_upload_move( $name = FALSE ) { 
		return $this->set_upload_move( $name );	 
	}

	/*
	|---------------------------
	| Destructor
	|---------------------------
	*/
	
	public function __destruct() {
	}
}
?>