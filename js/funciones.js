function inicializador(){

	resizeCarrusel();
	$(window).resize( resizeCarrusel );
	slideContacto();
	mostrarFormConsultaPlan();
	cerrarConsultarPlan();

}

function resizeCarrusel() {

	var carouselHeight = $(window).height(),
		carouselWidth = $(window).width();

	console.log(carouselHeight);
	console.log(carouselWidth);

	$("#slide1").height(carouselHeight);
	/*$(".carousel").height(carouselHeight);*/
	$("#slide1").width(carouselWidth);
	/*$(".carousel").width(carouselWidth);*/
}

function slideContacto() {

	$(".mostrar").click(function() {
		$("#formulario-contacto").slideToggle(360);
		console.log(this);
	});
}

// Agregadas por nico
function limpiar()
{
	document.form.reset();
	document.form.modelo.focus();
}

function validar()
{
	var form =document.form;
	if (form.modelo.value==0)
	{
		alert("El modelo del auto no puede estar vacio, ingrese un modelo por favor.");
		form.modelo.value="";
		form.modelo.focus();
		return false;
	}
	if (form.descripcion.value==0)
	{
		alert("La descripcion del auto no puede estar vacio, ingrese una descripcion por favor.");
		form.descripcion.value="";
		form.descripcion.focus();
		return false;
	}
	if (form.cuota.value==0)
	{
		alert("La cuota del auto no puede estar vacio, ingrese la cuota por favor.");
		form.cuota.value="";
		form.cuota.focus();
		return false;
	}
	form.submit();
}


function limpiarConcesion()
{
	document.form.reset();
	document.form.modelo.focus();
}

function validarAdjudicado()
{
	var form =document.form;
	if (form.modelo.value==0)
	{
		alert("El modelo no puede estar vacio, ingrese un modelo por favor.");
		form.modelo.value="";
		form.modelo.focus();
		return false;
	}
	if (form.estado.value==0)
	{
		alert("El estado no puede estar vacio, ingrese un estado por favor.");
		form.estado.value="";
		form.estado.focus();
		return false;
	}
	if (form.cuota_plan.value==0)
	{
		alert("La cuota/plan no puede estar vacio, ingrese la cuota/plan por favor.");
		form.cuota_plan.value="";
		form.cuota_plan.focus();
		return false;
	}
	if (form.precio.value==0)
	{
		alert("El precio no puede estar vacio, ingrese el precio por favor.");
		form.precio.value="";
		form.precio.focus();
		return false;
	}
	if (form.cuota.value==0)
	{
		alert("La cuota no puede estar vacio, ingrese la cuota por favor.");
		form.cuota.value="";
		form.cuota.focus();
		return false;
	}
	if (form.concesion.value==0)
	{
		alert("La concesion no puede estar vacio, ingrese una por favor.");
		form.concesion.value="";
		form.concesion.focus();
		return false;
	}
	
	form.submit();
}

function validarcomenzados()
{
	var form =document.form;
	if (form.modelo.value==0)
	{
		alert("El modelo no puede estar vacio, ingrese un modelo por favor.");
		form.modelo.value="";
		form.modelo.focus();
		return false;
	}
	if (form.estado.value==0)
	{
		alert("El estado no puede estar vacio, ingrese un estado por favor.");
		form.estado.value="";
		form.estado.focus();
		return false;
	}
	if (form.cuota_plan.value==0)
	{
		alert("La cuota/plan no puede estar vacio, ingrese la cuota/plan por favor.");
		form.cuota_plan.value="";
		form.cuota_plan.focus();
		return false;
	}
	if (form.precio.value==0)
	{
		alert("El precio no puede estar vacio, ingrese el precio por favor.");
		form.precio.value="";
		form.precio.focus();
		return false;
	}
	if (form.cuota.value==0)
	{
		alert("La cuota no puede estar vacio, ingrese la cuota por favor.");
		form.cuota.value="";
		form.cuota.focus();
		return false;
	}
	if (form.concesion.value==0)
	{
		alert("La concesion no puede estar vacio, ingrese una por favor.");
		form.concesion.value="";
		form.concesion.focus();
		return false;
	}
	
	form.submit();
}

function limpiarPlan()
{
	document.form.reset();
	document.form.titulo.focus();
}

function validarPlan()
{
	var form =document.form;
	if (form.titulo.value==0)
	{
		alert("El nombre del plan debe completarse");
		form.titulo.value="";
		form.titulo.focus();
		return false;
	}
	
	form.submit();
}

function cambiar(id,color)
{
	document.getElementById(id).style.backgroundColor=color;
}

function mostrarFormConsultaPlan() {

	$(".mostrar").click(function(){
		$("#consultarPlan").fadeIn( "fast" );
	});
}

function cerrarConsultarPlan() {

	$("#cerrarConsultarPlan").click(function(){
		$("#consultarPlan").fadeOut( "fast" );
	});
}