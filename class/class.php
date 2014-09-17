<?php
class Conectar 
{
	public static function con()
	{	
		$server     = 'localhost'; //servidor
		$username   = 'okcompu3_syner'; //usuario de la base de datos
		$password   = '$alam1n'; //password del usuario de la base de datos
		$database   = 'okcompu3_synergya'; //nombre de la base de datos

		
		$conexion = @new mysqli($server, $username, $password, $database);
		// cotejamiento --> "utf8"
		$conexion -> query("SET 'utf8'");
												

		if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarlo
		{
			die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
		}
		else
		{
			return $conexion;
		}	
	
	}
}

//******************************************************************
//						Clase autos
//******************************************************************
class Autos
{
	
	private $reg_autos;
	
	public function __construct()
	{
		$this->reg_autos=array();
	}

	public function get_autos()
	{
		$sql="select * from auto order by aut_id desc";

		$res=mysqli_query(Conectar::con(),$sql);
		
		while ($reg=mysqli_fetch_assoc($res))
		{
			$this->reg_autos[]=$reg;
		}
			return $this->reg_autos;
	}	

	public function get_auto_por_id($id)
	{
		$sql="select * from auto where aut_id=$id";
		$res=mysqli_query(Conectar::con(),$sql);
		while ($reg=mysqli_fetch_assoc($res))
		{
			$this->reg_autos[]=$reg;
		}
			return $this->reg_autos;
	}

	public function edit_reg_autos($modelo,$descripcion,$cuota,$id,$imagen)
	{
				
		$sql="update auto "
			." set "
			." aut_modelo='$modelo', "
			." aut_descripcion='$descripcion', "			
			." aut_cuota='$cuota', "
			." aut_imagen='$imagen' "
			." where "
			." aut_id=$id ";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
		alert('El registro ha sido modificado correctamente');
		window.location='index-usuario.php';
		</script>";		

	}
}

//******************************************************************
//						Clase adjudicados
//******************************************************************
class Adjudicados
{
	
	private $reg_adjudicados;
	
	public function __construct()
	{
		$this->reg_adjudicados=array();
	}

	public function get_adjudicados()
	{
		$sql="select * from adjudicados order by adj_plan,adj_id";

		$res=mysqli_query(Conectar::con(),$sql);
		
		while ($reg=mysqli_fetch_assoc($res))
		{
			$this->reg_adjudicados[]=$reg;
		}
			return $this->reg_adjudicados;
	}	

	public function get_adjudicado_por_id($id)
	{
		$sql="select * from adjudicados where adj_id=$id";
		$res=mysqli_query(Conectar::con(),$sql);
		while ($reg=mysqli_fetch_assoc($res))
		{
			$this->reg_adjudicados[]=$reg;
		}
			return $this->reg_adjudicados;
	}

	public function edit_reg_adjudicados($modelo,$estado,$cuota_plan,$precio,$cuota,$concesion,$plan,$id)
	{
		$sql="update adjudicados "
			." set "
			." adj_plan='$plan', "
			." adj_modelo='$modelo', "
			." adj_estado='$estado', "			
			." adj_cuota_plan='$cuota_plan', "
			." adj_precio='$precio', "
			." adj_cuota='$cuota', "
			." adj_concesion='$concesion' "
			." where "
			." adj_id=$id ";
			
        $res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
		alert('El registro ha sido modificado correctamente');
		window.location='adjudicados-usuario.php';
		</script>";			
	}

	public function agregar_reg_adjudicados($modelo,$estado,$cuota_plan,$precio,$cuota,$concesion,$plan,$id)
	{
		$sql="insert into adjudicados "
			."(adj_plan,"
			."adj_modelo,"
			."adj_estado,"			
			."adj_cuota_plan,"
			."adj_precio,"
			."adj_cuota,"
			."adj_concesion) "
			."values"
			." ('$plan',"
			."'$modelo',"
			."'$estado',"			
			."'$cuota_plan',"
			."'$precio',"
			."'$cuota',"
			."'$concesion');";
			
        $res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
		alert('El registro ha sido añadido correctamente');
		window.location='adjudicados-usuario.php';
		</script>";			
	}

	public function eliminar_adjudicado($id)
	{
		$sql="delete from adjudicados where adj_id=$id";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
		alert('El registro ha sido eliminado correctamente');
		window.location='adjudicados-usuario.php';
		</script>";			
	}
}
//******************************************************************
//						Clase titulos adjudicados (planes)
//******************************************************************
class TituloAdjudicados
{
	
	private $reg_titulo_adjudicados;
	
	public function __construct()
	{
		$this->reg_titulo_adjudicados=array();
	}

	public function get_titulo_adjudicado_por_id($id)
	{	
		$sql="select tit_titulo from titulo_adjudicados where tit_id=$id";
		$res=mysqli_query(Conectar::con(),$sql);
		//hace la consulta induvidualmetne 
				
	    $res->data_seek(0); 
    	$reg = $res->fetch_array(); 
    	
		$this->reg_titulo_adjudicados=$reg[0];
		
		return $this->reg_titulo_adjudicados;
	}

	public function get_titulo_adjudicados($ordenado_por)
	{
		if ($ordenado_por == 'titulo')
		{
			$sql="select * from titulo_adjudicados order by tit_titulo;";	
		}
		else
		{
			$sql="select * from titulo_adjudicados order by tit_id desc;";
		}

		$res=mysqli_query(Conectar::con(),$sql);
		
		while ($reg=mysqli_fetch_assoc($res))
		{
			$this->reg_titulo_adjudicados[]=$reg;
		}
			return $this->reg_titulo_adjudicados;
	}	


	public function edit_reg_tit_adjudicados($tit_titulo,$id)
	{
				
		$sql="update titulo_adjudicados "
			." set "
			." tit_titulo='$tit_titulo' "
			." where "
			." tit_id=$id; ";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
		alert('El plan ha sido modificado correctamente');
		window.location='tit-adjudicado.php';
		</script>";			
	}
	public function agregar_reg_tit_adjudicados($tit_plan,$tit_titulo)
	{
		$sql="insert into titulo_adjudicados "
			."(tit_titulo)"
			."values"
			."('$tit_titulo');";
			
        $res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
		alert('El plan ha sido añadido correctamente');
		window.location='tit-adjudicado.php';
		</script>";			
	}

	public function eliminar_tit_adjudicado($id)
	{
		$sql="select count(*) from adjudicados where adj_plan = $id;";

		$res=mysqli_query(Conectar::con(),$sql);
		//hace la consulta induvidualmetne 
				
	    $res->data_seek(0); 
    	$reg = $res->fetch_array(); 

    	if ($reg[0] > 0)
    	{
    		echo "<script type='text/javascript'>
			alert('El plan que quiere eliminar tiene registros asociados, desasocie todos los registros y luego vuelva a eliminar');
			window.location='tit-adjudicado.php';
			</script>";	
    	}	
    	else
    	{
    		$sql="delete from titulo_adjudicados where tit_id=$id;";
			$res=mysqli_query(Conectar::con(),$sql);
			echo "<script type='text/javascript'>
			alert('El plan ha sido eliminado correctamente');
			window.location='tit-adjudicado.php';
			</script>";	


    	}
		
	}
}

//******************************************************************
//						Clase comenzados
//******************************************************************
class comenzados
{
	
	private $reg_comenzados;
	
	public function __construct()
	{
		$this->reg_comenzados=array();
	}

	public function get_comenzados()
	{
		$sql="select * from comenzados order by com_plan,com_id";

		$res=mysqli_query(Conectar::con(),$sql);
		
		while ($reg=mysqli_fetch_assoc($res))
		{
			$this->reg_comenzados[]=$reg;
		}
			return $this->reg_comenzados;
	}	

	public function get_comenzados_por_id($id)
	{
		$sql="select * from comenzados where com_id=$id";
		$res=mysqli_query(Conectar::con(),$sql);
		while ($reg=mysqli_fetch_assoc($res))
		{
			$this->reg_comenzados[]=$reg;
		}
			return $this->reg_comenzados;
	}

	public function edit_reg_comenzados($modelo,$estado,$cuota_plan,$precio,$cuota,$concesion,$plan,$id)
	{
		$sql="update comenzados "
			." set "
			." com_plan='$plan', "
			." com_modelo='$modelo', "
			." com_estado='$estado', "			
			." com_cuota_plan='$cuota_plan', "
			." com_precio='$precio', "
			." com_cuota='$cuota', "
			." com_concesion='$concesion' "
			." where "
			." com_id=$id ";
			
        $res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
		alert('El registro ha sido modificado correctamente');
		window.location='comenzados-usuario.php';
		</script>";			
	}

	public function agregar_reg_comenzados($modelo,$estado,$cuota_plan,$precio,$cuota,$concesion,$plan,$id)
	{
		$sql="insert into comenzados "
			."(com_plan,"
			."com_modelo,"
			."com_estado,"			
			."com_cuota_plan,"
			."com_precio,"
			."com_cuota,"
			."com_concesion) "
			."values"
			." ('$plan',"
			."'$modelo',"
			."'$estado',"			
			."'$cuota_plan',"
			."'$precio',"
			."'$cuota',"
			."'$concesion');";
			
        $res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
		alert('El registro ha sido añadido correctamente');
		window.location='comenzados-usuario.php';
		</script>";			
	}

	public function eliminar_comenzados($id)
	{
		$sql="delete from comenzados where com_id=$id";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
		alert('El registro ha sido eliminado correctamente');
		window.location='comenzados-usuario.php';
		</script>";			
	}
}

//******************************************************************
//						Clase titulos comenzados (planes)
//******************************************************************
class Titulocomenzados
{
	
	private $reg_titulo_comenzados;
	
	public function __construct()
	{
		$this->reg_titulo_comenzados=array();
	}

	public function get_titulo_comenzados_por_id($id)
	{	
		$sql="select tic_titulo from titulo_comenzados where tic_id=$id";
		$res=mysqli_query(Conectar::con(),$sql);
		//hace la consulta induvidualmetne 
				
	    $res->data_seek(0); 
    	$reg = $res->fetch_array(); 
    	
		$this->reg_titulo_comenzados=$reg[0];
		
		return $this->reg_titulo_comenzados;
	}

	public function get_titulo_comenzados($ordenado_por)
	{
		if ($ordenado_por == 'titulo')
		{
			$sql="select * from titulo_comenzados order by tic_titulo;";	
		}
		else
		{
			$sql="select * from titulo_comenzados order by tic_id desc;";
		}

		$res=mysqli_query(Conectar::con(),$sql);
		
		while ($reg=mysqli_fetch_assoc($res))
		{
			$this->reg_titulo_comenzados[]=$reg;
		}
			return $this->reg_titulo_comenzados;
	}	


	public function edit_reg_tit_comenzados($tic_titulo,$id)
	{
				
		$sql="update titulo_comenzados "
			." set "
			." tic_titulo='$tic_titulo' "
			." where "
			." tic_id=$id; ";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
		alert('El plan ha sido modificado correctamente');
		window.location='tit-comenzados.php';
		</script>";			
	}
	public function agregar_reg_tit_comenzados($tic_plan,$tic_titulo)
	{
		$sql="insert into titulo_comenzados "
			."(tic_titulo)"
			."values"
			."('$tic_titulo');";
			
        $res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
		alert('El plan ha sido añadido correctamente');
		window.location='tit-comenzados.php';
		</script>";			
	}

	public function eliminar_tit_comenzados($id)
	{
		$sql="select count(*) from comenzados where com_plan = $id;";

		$res=mysqli_query(Conectar::con(),$sql);
		//hace la consulta induvidualmetne 
				
	    $res->data_seek(0); 
    	$reg = $res->fetch_array(); 

    	if ($reg[0] > 0)
    	{
    		echo "<script type='text/javascript'>
			alert('El plan que quiere eliminar tiene registros asociados, desasocie todos los registros y luego vuelva a eliminar');
			window.location='tit-comenzados.php';
			</script>";	
    	}	
    	else
    	{
    		$sql="delete from titulo_comenzados where tic_id=$id;";
			$res=mysqli_query(Conectar::con(),$sql);
			echo "<script type='text/javascript'>
			alert('El plan ha sido eliminado correctamente');
			window.location='tit-comenzados.php';
			</script>";	


    	}
		
	}
}



//******************************************************************
//						Clase adjudicados_moto
//******************************************************************
class AdjudicadosMoto
{
	
	private $reg_adjudicados_moto;
	
	public function __construct()
	{
		$this->reg_adjudicados_moto=array();
	}

	public function get_adjudicados_moto()
	{
		$sql="select * from adjudicados_moto order by mot_plan,mot_id";

		$res=mysqli_query(Conectar::con(),$sql);
		
		while ($reg=mysqli_fetch_assoc($res))
		{
			$this->reg_adjudicados_moto[]=$reg;
		}
			return $this->reg_adjudicados_moto;
	}	

	public function get_adjudicado_moto_por_id($id)
	{
		$sql="select * from adjudicados_moto where mot_id=$id";
		$res=mysqli_query(Conectar::con(),$sql);
		while ($reg=mysqli_fetch_assoc($res))
		{
			$this->reg_adjudicados_moto[]=$reg;
		}
			return $this->reg_adjudicados_moto;
	}

	public function edit_reg_adjudicados_moto($modelo,$estado,$cuota_plan,$precio,$cuota,$concesion,$plan,$id)
	{
		$sql="update adjudicados_moto "
			." set "
			." mot_plan='$plan', "
			." mot_modelo='$modelo', "
			." mot_estado='$estado', "			
			." mot_cuota_plan='$cuota_plan', "
			." mot_precio='$precio', "
			." mot_cuota='$cuota', "
			." mot_concesion='$concesion' "
			." where "
			." mot_id=$id ";
			
        $res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
		alert('El registro ha sido modificado correctamente');
		window.location='adjudicados-moto.php';
		</script>";			
	}

	public function agregar_reg_adjudicados_moto($modelo,$estado,$cuota_plan,$precio,$cuota,$concesion,$plan,$id)
	{
		$sql="insert into adjudicados_moto "
			."(mot_plan,"
			."mot_modelo,"
			."mot_estado,"			
			."mot_cuota_plan,"
			."mot_precio,"
			."mot_cuota,"
			."mot_concesion) "
			."values"
			." ('$plan',"
			."'$modelo',"
			."'$estado',"			
			."'$cuota_plan',"
			."'$precio',"
			."'$cuota',"
			."'$concesion');";
			
        $res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
		alert('El registro ha sido añadido correctamente');
		window.location='adjudicados-moto.php';
		</script>";			
	}

	public function eliminar_adjudicado_moto($id)
	{
		$sql="delete from adjudicados_moto where mot_id=$id";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
		alert('El registro ha sido eliminado correctamente');
		window.location='adjudicados-moto.php';
		</script>";			
	}
}
//******************************************************************
//						Clase titulos adjudicados moto (planes)
//******************************************************************
class TituloAdjudicadosMoto
{
	
	private $reg_titulo_adjudicados_moto;
	
	public function __construct()
	{
		$this->reg_titulo_adjudicados_moto=array();
	}

	public function get_titulo_adjudicado_moto_por_id($id)
	{	
		$sql="select tim_titulo from titulo_moto where tim_id=$id";
		$res=mysqli_query(Conectar::con(),$sql);
		//hace la consulta induvidualmetne 
				
	    $res->data_seek(0); 
    	$reg = $res->fetch_array(); 
    	
		$this->reg_titulo_adjudicados_moto=$reg[0];
		
		return $this->reg_titulo_adjudicados_moto;
	}

	public function get_titulo_adjudicados_moto($ordenado_por)
	{
		if ($ordenado_por == 'titulo')
		{
			$sql="select * from titulo_moto order by tim_titulo;";	
		}
		else
		{
			$sql="select * from titulo_moto order by tim_id desc;";
		}

		$res=mysqli_query(Conectar::con(),$sql);
		
		while ($reg=mysqli_fetch_assoc($res))
		{
			$this->reg_titulo_adjudicados_moto[]=$reg;
		}
			return $this->reg_titulo_adjudicados_moto;
	}	


	public function edit_reg_tit_adjudicados_moto($tim_titulo,$id)
	{
				
		$sql="update titulo_moto "
			." set "
			." tim_titulo='$tim_titulo' "
			." where "
			." tim_id=$id; ";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
		alert('El plan ha sido modificado correctamente');
		window.location='tit-adjudicado-moto.php';
		</script>";			
	}
	public function agregar_reg_tit_adjudicados_moto($tim_plan,$tim_titulo)
	{
		$sql="insert into titulo_moto "
			."(tim_titulo)"
			."values"
			."('$tim_titulo');";
			
        $res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
		alert('El plan ha sido añadido correctamente');
		window.location='tit-adjudicado-moto.php';
		</script>";			
	}

	public function eliminar_tit_adjudicado_moto($id)
	{
		$sql="select count(*) from adjudicados_moto where mot_plan = $id;";

		$res=mysqli_query(Conectar::con(),$sql);
		//hace la consulta induvidualmetne 
				
	    $res->data_seek(0); 
    	$reg = $res->fetch_array(); 

    	if ($reg[0] > 0)
    	{
    		echo "<script type='text/javascript'>
			alert('El plan que quiere eliminar tiene registros asociados, desasocie todos los registros y luego vuelva a eliminar');
			window.location='tit-adjudicado-moto.php';
			</script>";	
    	}	
    	else
    	{
    		$sql="delete from titulo_moto where tim_id=$id;";
			$res=mysqli_query(Conectar::con(),$sql);
			echo "<script type='text/javascript'>
			alert('El plan ha sido eliminado correctamente');
			window.location='tit-adjudicado-moto.php';
			</script>";	


    	}
		
	}
}
//******************************************************************
//						Clase titulos adjudicados moto (planes)
//******************************************************************
class AdministracionImagenes
{

	public function __construct()
	{
	
	}

	public function RecuperarImagenes()
	{
		$imagenes[]='';
		$tot_img = 0;
		$directorio = opendir("uploads"); //ruta actual
		while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
		{
			if (!is_dir($archivo))//verificamos si es o no un directorio
			{
			
				//si imagenes contiene .jpg
				if ( stripos($archivo,'.png') !== FALSE ) 
				{ 
					$imagenes[$tot_img]= $archivo;
					$tot_img+=1;
				}
			}
		}
		return $imagenes;
	}	
}

?>