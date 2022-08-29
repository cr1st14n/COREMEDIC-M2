<!DOCTYPE html>
<html lang="es">

<head>

	<!-- Meta information -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Title-->
	<title>{{ config('app.name', 'Laravel') }} | Med</title>
	<!-- Favicons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('Plantilla/assets/ico/apple-touch-icon-144-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('Plantilla/assets/ico/apple-touch-icon-114-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('Plantilla/assets/ico/apple-touch-icon-72-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" href="{{ asset('Plantilla/assets/ico/apple-touch-icon-57-precomposed.png')}}">
	<link rel="shortcut icon" href="{{ asset('Plantilla/assets/ico/CSJO.ico')}}">

	<!-- CSS Stylesheet-->
	<link type="text/css" rel="stylesheet" href="{{ asset('Plantilla/assets/css/bootstrap/bootstrap.min.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('Plantilla/assets/css/bootstrap/bootstrap-themes.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('Plantilla/assets/css/style.css')}}" />

	<!-- Styleswitch if  you don't chang theme , you can delete -->
	<link type="text/css" rel="alternate stylesheet" media="screen" title="style1" href="{{ asset('Plantilla/assets/css/styleTheme1.css')}}" />
	<link type="text/css" rel="alternate stylesheet" media="screen" title="style2" href="{{ asset('Plantilla/assets/css/styleTheme2.css')}}" />
	<link type="text/css" rel="alternate stylesheet" media="screen" title="style3" href="{{ asset('Plantilla/assets/css/styleTheme3.css')}}" />
	<link type="text/css" rel="alternate stylesheet" media="screen" title="style4" href="{{ asset('Plantilla/assets/css/styleTheme4.css')}}" />


	<!-- editor de texto -->
	<script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
	<script src="{{ asset('ckeditor/samples/js/sample.js')}}"></script>
	<!-- <link rel="stylesheet" href="{{ asset('ckeditor/samples/css/samples.css')}}"> -->
	<link rel="stylesheet" href="{{ asset('ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css')}}">
	<style>
		/* styles unrelated to zoom */
		* {
			border: 0;
			margin: 0;
			padding: 0;
		}

		/* p {
			position: absolute;
			top: 3px;
			right: 28px;
			color: #555;
			font: bold 13px/1 sans-serif;
		} */

		/* these styles are for the demo, but are not required for the plugin */
		.zoom {
			display: inline-block;
			position: relative;
		}

		/* magnifying glass icon */
		.zoom:after {
			content: '';
			display: block;
			width: 33px;
			height: 33px;
			position: absolute;
			top: 0;
			right: 0;
			background: url(icon.png);
		}

		.zoom img {
			display: block;
		}

		.zoom img::selection {
			background-color: transparent;
		}

		#ex2 img:hover {
			cursor: url(grab.cur), default;
		}

		#ex2 img:active {
			cursor: url(grabbed.cur), default;
		}
	</style>
	<!-- css de dropzone para carga de imagenes -->



	<style>
		#preloader_1 {
			position: relative;
		}

		#preloader_1 span {
			display: block;
			bottom: 0px;
			width: 9px;
			height: 5px;
			background: #9b59b6;
			position: absolute;
			animation: preloader_1 1.5s infinite ease-in-out;
		}

		#preloader_1 span:nth-child(2) {
			left: 11px;
			animation-delay: .2s;

		}

		#preloader_1 span:nth-child(3) {
			left: 22px;
			animation-delay: .4s;
		}

		#preloader_1 span:nth-child(4) {
			left: 33px;
			animation-delay: .6s;
		}

		#preloader_1 span:nth-child(5) {
			left: 44px;
			animation-delay: .8s;
		}

		@keyframes preloader_1 {
			0% {
				height: 5px;
				transform: translateY(0px);
				background: #9b59b6;
			}

			25% {
				height: 30px;
				transform: translateY(15px);
				background: #3498db;
			}

			50% {
				height: 5px;
				transform: translateY(0px);
				background: #9b59b6;
			}

			100% {
				height: 5px;
				transform: translateY(0px);
				background: #9b59b6;
			}
		}
	</style>
	<link href="{{ asset('Plantilla/dropzone/dist/dropzone.css')}}" rel="stylesheet" />
	<link href="{{ asset('Plantilla/diseños/barraCarga.css')}}" rel="stylesheet" />
</head>

<body>

	<div id="wrapper">
		<div id="header">
			<div class="logo-area clearfix">
				<a href="#" class="logo"></a>
			</div>
			<div class="tools-bar">
				<ul class="nav navbar-nav nav-main-xs">
					<li><a href="#menu" class="icon-toolsbar"><i class="fa fa-bars"></i></a></li>
				</ul>
				<ul class="nav navbar-nav nav-top-xs hidden-xs tooltip-area">
					<li class="h-seperate"></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="fa fa-th-large"></i></a>
						<ul class="dropdown-menu arrow animated fadeInDown fast">
							<li><a href="#"> Cotizaciones Realizadas</a></li>
						</ul>
						<!-- //dropdown-menu-->
					</li>
					<li class="h-seperate"></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="fa fa-star"></i></a>
						<ul class="dropdown-menu arrow animated fadeInDown fast">
							<li><a href="#" id="alarma"> Activar Tono De N.P.F.</a></li>
						</ul>
						<!-- //dropdown-menu-->
					</li>
					<li class="h-seperate"></li>

				</ul>
				<ul class="nav navbar-nav navbar-right tooltip-area">
					<li><a href="#" class="nav-collapse avatar-header" data-toggle="tooltip" title="Show / hide  menu" data-container="body" data-placement="bottom">
							<img alt="" src="{{asset('Plantilla/assets/img/usuMed1.png')}}" class="circle">
							<span class="badge">3</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
							<em><strong>Hola</strong>, {{Auth::user()->usu_nombre}} {{Auth::user()->usu_appaterno}} </em> <i class="dropdown-icon fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-right icon-right arrow">
							<li><a href="#" id="btn_showPerfinUser"><i class="fa fa-user"></i> Actualizar Datos </a></li>
							<li><a href="#" id="btn_showEditPass"><i class="fa fa-user"></i> Actualizar Contraseña </a></li>
							<li class="divider"></li>
							<li><a href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
									<i class="fa fa-sign-out"></i>salir
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
					<li class="visible-lg">
						<a href="#" class="h-seperate fullscreen" data-toggle="tooltip" title="Full Screen" data-container="body" data-placement="left">
							<i class="fa fa-expand"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="nav">
			<div id="nav-scroll">
				<div class="avatar-slide">

					<span class="easy-chart avatar-chart" data-color="theme-inverse" data-percent="100" data-track-color="rgba(255,255,255,0.1)" data-line-width="5" data-size="118">
						<span class="percent"></span>
						<img alt="" src="{{asset('Plantilla/assets/img/usuMed1.png')}}" class="circle">
					</span>
					<!-- //avatar-chart-->

					<div class="avatar-detail">
						<p><strong>Dr.</strong>, {{Auth::user()->usu_nombre}} {{Auth::user()->usu_appaterno}}</p>
					</div>
					<!-- //avatar-detail-->

					<div class="avatar-link btn-group btn-group-justified">
						<!-- <a class="btn" href="#" onclick="show_modal_corizacion_formulario(1)" title="Formulario de Cotizacion">
							<i class="fa fa-medkit"></i><em class="green"></em>
						</a> -->
						<a class="btn" onclick="colaPacienteMedAten()" title="Pacientes en Espera">
							<i class="fa fa-stethoscope"></i><em class="active"></em>
						</a>
					</div>
				</div>
				<div class="widget-collapse dark">
					<header>
						<a href="#"><i class="collapse-caret fa fa-cloud-download "></i> Actual Pacientes en espera </a>
					</header>
					<section class="" id="collapseSummary">
						<div class="collapse-boby" style="padding:0">
						</div>
					</section>
				</div>
			</div>
		</div>
		<div id="main">
			<ol class="breadcrumb">
				<li class="active">Inicio</li>
				<!-- <li><a href="#">Home</a></li> -->
			</ol>
			<div id="content">
				<div class="row">
					<div class="col-lg-9" id="panel1">

					</div>
					<div class="col-lg-3">
						<div class="well bg-theme">
							<div class="widget-tile">
								<section>
									<h5><strong>Pacientes </strong> En Espera </h5>
									<h2 id="nroPacientesFila">...</h2>
								</section>
								<div class="hold-icon"><i class="fa fa-wheelchair"></i></div>
							</div>
						</div>
						<section class="panel">
							<div class="widget-clock">
								<div id="clock"></div>
							</div>
						</section>
						<section class="panel">
							<header class="panel-heading" id="tarjeta_signosV_title">
								<h4><strong>Signos Vitales</strong>
							</header>
							<div class=" panel-body align-xs-center">
								<div id="sector_ani_carga"></div>
								<!-- <button type="button" class="btn btn-primary btn-transparent"><i class="fa fa-comment-o"></i> Reporte RX</button> -->
								<!-- <table width="100%" id="table_SV_data">
									<tr align="left">
										<td style="width:50%">
											P.A. : <strong>1</strong><br>
											F.C. : <strong>1</strong><br>
											F.R. : <strong>1</strong><br>
											Sat. : <strong>1</strong><br>
										</td>
										<td style="width:50%">
											Temp. : <strong>1</strong><br>
											Peso : <strong>1</strong><br>
											Talla : <strong>1</strong><br>
											IMC : <strong>1</strong><br>
										</td>
									</tr>
								</table>
								<div class="contenedor">
									<span class="char1">C</span>
									<span class="char2">A</span>
									<span class="char3">R</span>
									<span class="char4">G</span>
									<span class="char5">A</span>
									<span class="char6">N</span>
									<span class="char7">D</span>
									<span class="char8">O</span>
								</div>
								<div class="carga">
									<div class="barra"></div>
								</div> -->
							</div>
						</section>
						<section class="panel">
							<header class="panel-heading" id="tarjeta_signosV_title">
								<h4><strong>Motivo de la Consulta</strong>
							</header>
							<div class=" panel-body align-xs-center">
								<div id="sector_ani_carga_2"></div>

								<!-- <button type="button" class="btn btn-primary btn-transparent"><i class="fa fa-comment-o"></i> Reporte RX</button> -->
								<!-- <table width="100%" id="table_SV_data">
									<tr align="left">
										<td style="width:50%">
											P.A. : <strong>1</strong><br>
											F.C. : <strong>1</strong><br>
											F.R. : <strong>1</strong><br>
											Sat. : <strong>1</strong><br>
										</td>
										<td style="width:50%">
											Temp. : <strong>1</strong><br>
											Peso : <strong>1</strong><br>
											Talla : <strong>1</strong><br>
											IMC : <strong>1</strong><br>
										</td>
									</tr>
								</table>
								<div class="contenedor">
									<span class="char1">C</span>
									<span class="char2">A</span>
									<span class="char3">R</span>
									<span class="char4">G</span>
									<span class="char5">A</span>
									<span class="char6">N</span>
									<span class="char7">D</span>
									<span class="char8">O</span>
								</div>
								<div class="carga">
									<div class="barra"></div>
								</div> -->
							</div>
						</section>
						<!-- <input type="button" id="alarma" value="Activar Tono de Paciente"> -->

					</div>
				</div>
			</div>
		</div>

		<div id="md-listPacientesEspera" class="modal fade md-slideUp bg-theme-inverse" tabindex="-1" data-width="450">
			<div class="modal-header bd-theme-inverse-darken">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-paste"></i> Pacientes en espera</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im">
					<ul id="list_PacientesEspera">
						<li>
							<section class="thumbnail-in">
								<div class="widget-im-tools tooltip-area pull-right">
									<span>
										<time datetime="2013-11-16">1 : 52 am</time>
									</span>
								</div>
								<h4><a href="#" onclick="showHistoriaClinica(1)">Nombre del paciente</a>
								</h4>
								<div class="im-thumbnail"><img alt="" src="{{('Plantilla/assets/img/paciente.png')}}" /></div>
								<label></label>
								<div class="pre-text">Tipo de procedimiento requerido</div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class="widget-im-tools tooltip-area pull-right">
									<span>
										<time datetime="2013-11-16">1 : 52 am</time>
									</span>
								</div>
								<h4><a href="javascript:void(0)">Nombre del paciente</a>
								</h4>
								<div class="im-thumbnail"><img alt="" src="{{('Plantilla/assets/img/paciente.png')}}" /></div>
								<label></label>
								<div class="pre-text">Tipo de procedimiento requerido</div>
							</section>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- start modal modal list tipos de procedimientos -->
		<div id="md-tipoConsulta" class="modal fade md-stickTop bg-danger" tabindex="-1" data-width="300">
			<div class="modal-header bg-theme-inverse-darken">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-plus-square"></i> Tipo de procedimiento</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im notification">
					<ul>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle bg-inverse" onclick="ShowModalAtencion(1)"><i class="fa fa-arrow-right "></i></button>
								</div>
								<h4>Consulta Externa</h4><br>
								<div class="im-thumbnail btn-theme-inverse "><img src="Plantilla/assets/img/consultaExterna.png" alt="" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(2)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Prenatal, Parto <br> y Puerperio</h4><br>
								<div class="im-thumbnail bg-warning-gradient"><img src="Plantilla/assets/img/prenatal.png" alt="" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(3)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Anticoncepcion</h4><br>
								<div class="im-thumbnail bg-primary-gradient"><img src="Plantilla/assets/img/vacunas.png" alt="" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(4)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Internacines</h4><br>
								<div class="im-thumbnail bg-theme-inverse-gradient"><img src="Plantilla/assets/img/internaciones.png" alt="" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(5)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Odontologia</h4><br>
								<div class="im-thumbnail bg-theme-inverse-gradient"><img src="Plantilla/assets/img/odontologia.png" alt="" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(6)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Vacunas</h4><br>
								<div class="im-thumbnail bg-danger-gradient"><img src="Plantilla/assets/img/vacunas.png" style="height: 40px; width:50px "></div>
							</section>
						</li>

					</ul>
				</div>
			</div>
		</div>

		<!-- modal de cotizaciones -->
		<div id="md-notification" class="modal fade md-stickTop bg-gradient-blue " tabindex="-1" data-width="500">
			<div class="modal-header bd-danger-darken">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-bell-o"></i> Formularios para cotizaciones</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im notification">
					<ul>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="show_modal_corizacion_formulario(1)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Formulario Basico</h4><br>
								<div class="im-thumbnail bg-danger-gradient"><img src="Plantilla/assets/img/vacunas.png" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(6)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Gastroenterología</h4><br>
								<div class="im-thumbnail bg-danger-gradient"><img src="Plantilla/assets/img/vacunas.png" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(6)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Traumatologia</h4><br>
								<div class="im-thumbnail bg-danger-gradient"><img src="Plantilla/assets/img/vacunas.png" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(6)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Ginecologia</h4><br>
								<div class="im-thumbnail bg-danger-gradient"><img src="Plantilla/assets/img/vacunas.png" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(6)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Pediatria</h4><br>
								<div class="im-thumbnail bg-danger-gradient"><img src="Plantilla/assets/img/vacunas.png" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(6)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Medicina familiar</h4><br>
								<div class="im-thumbnail bg-danger-gradient"><img src="Plantilla/assets/img/vacunas.png" style="height: 40px; width:50px "></div>
							</section>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- modal form registro de signos vitales -->
		<div id="md-formSignosVitales" class="modal fade md-flipVer bg-theme-inverse-lighten" tabindex="-1" data-width="800">
			<div class="modal-header ">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-bell-o"></i> Registro de signos vitales</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im notification">
					<div class="panel-body">
						<form id="form_create_signosVitales">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<span style="color:dimgrey ;font-weight:bolder">Precion Arterial </span>
									<div class="input-group">
										<input type="text" class="form-control" tabindex="1" name="pa">
										<span class="input-group-addon">P.A.</span>
									</div>
								</div>
								<div class="col-md-6">
									<span style="color:dimgrey ;font-weight:bolder">Frecuencia Cardiaca</span>
									<div class="input-group">
										<input type="text" class="form-control" tabindex="2" name="fc">
										<span class="input-group-addon">F.C.</span>
									</div>
								</div>
								<div class="col-md-6">
									<span style="color:dimgrey ;font-weight:bolder">Frecuencia Respiratoria </span>
									<div class="input-group">
										<input type="text" class="form-control" tabindex="3" name="fr">
										<span class="input-group-addon">F.R.</span>
									</div>
								</div>
								<div class="col-md-6">
									<span style="color:dimgrey ;font-weight:bolder">Saturacion</span>
									<div class="input-group">
										<input type="text" class="form-control" tabindex="4" name="st">
										<span class="input-group-addon">SAT.</span>
									</div>
								</div>
								<div class="col-md-6">
									<span style="color:dimgrey ;font-weight:bolder">Peso</span>
									<div class="input-group">
										<input type="number" class="form-control" id="pesoPaciente" name="pe" onkeyup="calcularIMC()" tabindex="5">
										<span class="input-group-addon">Kg.</span>
									</div>
								</div>
								<div class="col-md-6">
									<span style="color:dimgrey ;font-weight:bolder">Temperatura</span>
									<div class="input-group">
										<input type="text" class="form-control" tabindex="7" name="te">
										<span class="input-group-addon">°C</span>
									</div>
								</div>
								<div class="col-md-6">
									<span style="color:dimgrey ;font-weight:bolder">Talla</span>
									<div class="input-group">
										<input type="number" class="form-control" id="tallaPaciente" name="ta" onkeyup="calcularIMC()" tabindex="6" placeholder="Medica en Centimetros">
										<span class="input-group-addon">Cm.</span>
									</div>
								</div>
								<div class="col-md-6" style="color: black;">
									<h2>Indice de masa corporal: <strong id="icmPaciente">44</strong></h2>
								</div>
							</div>
							<br>
							<button class="btn btn-theme-inverse align-lg-right" id="btn_submitFormCreateSV" tabindex="8">Registrar en Historial Clinico</button>
							<button class="btn btn-danger">Cancelar</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- modal form carga de imagen de RX -->
		<div id="md-formCargaRX" class="modal fade md-flipVer" tabindex="-1" data-width="550">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h3>Imagen radiografica</h3>
			</div>
			<div class="modal-body">
				<div class="panel panel-primary">
					<div class="row">
						<div class="col-lg-6">
							<input type="number" class="form-control" id="textrx1" onkeyup="clonar(this.value,1)" placeholder="# de factura">
						</div>
						<div class="col-lg-6">
							<input type="text" class="form-control" id="textrx2" onkeyup="clonar(this.value,2)" placeholder="Medico designante">
						</div>
					</div>
					<br>
					<input type="text" class="form-control" id="textrx3" onkeyup="clonar(this.value,3)" placeholder="Descripcion del archivo a cargar">

					<hr>
					<div class="panel-body" id="myId" style="padding: 0;">
						<form id="subImagen" class="dropzone">
							<input type="text" id="textRX1" name="rxfactura" hidden>
							<input type="text" id="textRX2" name="rxmedicoTratante" hidden>
							<input type="text" id="textRX3" name="rxDescImagen" hidden>
							<div class="fallback" id="2121">
								<input name="file" type="file" multiple />
							</div>
						</form>
					</div>
				</div>
				<div>
				</div>
			</div>
		</div>

		<div id="md-formCarga-imagenRX" class="modal fade md-flipVer" tabindex="-1" data-width="1000">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4>Placa radiografica:</h4><br>
				<h4 id="md_body_show_desc"></h4>
			</div>
			<div class="modal-body" id="md_body_show_imagen">
				<span class='zoom' id='ex1'>
					<img id="srcImagenPlacaRX" src='' width='950' height='' alt='Daisy on the Ohoopee' />
				</span>
			</div>
		</div>
		<!-- vistas orden medica -->
		<div id="md-formOrdenMedica" class="modal fade md-flipVer" tabindex="-1" data-width="1000">
			<div class="modal-body">
				<form class="form-horizontal" data-collabel="3" data-alignlabel="left">
					<div class="form-group">
						<label class="control-label">Diagnostico: </label>
						<div>
							<input type="text" class="form-control rounded" id="inp_oredenM_diag">
						</div>
					</div>
				</form>
				<div class="adjoined-bottom">
					<div class="grid-container">
						<div class="grid-width-100">
							<div id="editor">
								<h1></h1>
							</div>
						</div>
					</div>
				</div>
				<button class="btn btn-theme-inverse btn-block" id="btn_registrarOrdenMedica">Registrar</button>
			</div>
		</div>
		<div id="md-mod_ordenMedica_PDF" class="modal fade md-stickTop" tabindex="-1" data-width="1000">

			<div class="moda-body" height=800 id="" style="background-color: black;">
				<div align="center" id="loadingAni">
					<svg width="51px" height="50px" viewBox="0 0 51 50">

						<rect y="0" width="13" height="50" fill="#1fa2ff">
							<animate attributeName="height" values="50;10;50" begin="0s" dur="1s" repeatCount="indefinite" />
							<animate attributeName="y" values="0;20;0" begin="0s" dur="1s" repeatCount="indefinite" />
						</rect>

						<rect x="19" y="0" width="13" height="50" fill="#12d8fa">
							<animate attributeName="height" values="50;10;50" begin="0.2s" dur="1s" repeatCount="indefinite" />
							<animate attributeName="y" values="0;20;0" begin="0.2s" dur="1s" repeatCount="indefinite" />
						</rect>

						<rect x="38" y="0" width="13" height="50" fill="#06ffcb">
							<animate attributeName="height" values="50;10;50" begin="0.4s" dur="1s" repeatCount="indefinite" />
							<animate attributeName="y" values="0;20;0" begin="0.4s" dur="1s" repeatCount="indefinite" />
						</rect>

					</svg>
				</div>
				<embed src="" type="" width="1000" height="800" id="linkUrlPdf_ordenMedica">
			</div>

		</div>
		<!-- --------------------------------- -->

		<div id="md-stack" class="modal fade" tabindex="-1" data-width="600">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h3>Stack One</h3>
			</div>
			<div class="modal-body">
				<p>One fine body…</p>
				<p>Two fine body…</p>
				<p>Three fine body…</p>

			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-inverse">Close</button>

				<button class="btn btn-theme" data-toggle="modal" data-target="#md-stack2">Launch modal</button>
			</div>
		</div>

		<!-- modal recetario virtual -->
		<div id="md-form1_recetario" class="modal fade md-slideRight " tabindex="-1" data-width="80%">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h3>Nueva receta</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id="form-createRecetario">
						<div class="col-lg-12">
							<div class="form-group col-lg-2">
								<label>Droga (Medicamiento)</label>
								<input type="text" class="form-control rounded" id="c_medi" name="c_medi" required autocomplete="on">
							</div>
							<div class="form-group col-lg-2">
								<label>Forma Farmaceutica</label>
								<input type="text" class="form-control rounded" id="c_forma" name="c_forma" required>
							</div>
							<div class="form-group col-lg-2">
								<label>Via de administración</label>
								<select class="form-control" data-size="10" data-live-search="true" name="c_via" id="c_via" require>
									<option value="">Selecionar ... </option>
									<option value="ocular">Ocular</option>
									<option value="V.Topico">Ótica</option>
									<option value="V.Topico">Nasal</option>
									<option value="V.Topico">Inhalatoria</option>
									<option value="V.O.">Oral</option>
									<option value="Sub. Cut.">Sub. Cutania</option>
									<option value="V.Topico">Topico</option>
									<option value="I.M.">Intra Muscular</option>
									<option value="I.V">Intra Muscular</option>
									<option value="V.R.">Rectal</option>
									<option value="V.Topico">V.Vaginal</option>
									<option value="V.Topico">Nebulización</option>
								</select>
							</div>
							<div class="form-group col-lg-1">
								<label>Cantidad</label>
								<input type="text" class="form-control rounded" id="c_medi_cant" name="c_medi_cant" required autocomplete="off">
							</div>
							<div class="form-group col-lg-4">
								<label>Duración del tratamiento</label>
								<input type="text" class="form-control rounded" id="c_dosis" name="c_dosis" required>
							</div>
							<div class="form-group col-lg-1">
								<br>
								<button class="btn btn-theme-inverse" type="submit" id="btn-addMedicamento"><i class="fa fa-save"></i></button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-9">
					<table class="table col-lg-9">
						<thead>
							<th>Medicamento </th>
							<th>Forma farmaceutica</th>
							<th>Via</th>
							<th>Cant</th>
							<th>Dosis</th>
							<th></th>
						</thead>
						<tbody align="center" id="tableBodilistMedicamentos">
						</tbody>
					</table>
				</div>
				<div class="form-group col-lg-3">
					<label for=""> Descripion opcional del tratamiento</label>
					<textarea class="form-control" name="c_otroTra" id="c_otroTra" cols="60" rows="8"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-inverse"><i class="fa fa-refresh" id="refreshRecetario"></i></button>
				<button class="btn btn-primary" onclick="registerReceta(1)">Registrar</button>
				<button class="btn btn-theme-inverse" onclick="registerReceta(2)">Registrar e Imprimir <i class="fa fa-print"></i></button>
			</div>
		</div>

		<!-- modal para vista previa de la receta medica -->
		<div id="md-form1_vistaReceta" class="modal fade md-stickTop" tabindex="-1" data-width="600">

			<div class="moda-body" height=800 id="" style="background-color: black;">
				<div align="center" id="loadingAni">
					<svg width="51px" height="50px" viewBox="0 0 51 50">

						<rect y="0" width="13" height="50" fill="#1fa2ff">
							<animate attributeName="height" values="50;10;50" begin="0s" dur="1s" repeatCount="indefinite" />
							<animate attributeName="y" values="0;20;0" begin="0s" dur="1s" repeatCount="indefinite" />
						</rect>

						<rect x="19" y="0" width="13" height="50" fill="#12d8fa">
							<animate attributeName="height" values="50;10;50" begin="0.2s" dur="1s" repeatCount="indefinite" />
							<animate attributeName="y" values="0;20;0" begin="0.2s" dur="1s" repeatCount="indefinite" />
						</rect>

						<rect x="38" y="0" width="13" height="50" fill="#06ffcb">
							<animate attributeName="height" values="50;10;50" begin="0.4s" dur="1s" repeatCount="indefinite" />
							<animate attributeName="y" values="0;20;0" begin="0.4s" dur="1s" repeatCount="indefinite" />
						</rect>

					</svg>
				</div>
				<embed src="" type="" width="600" height="800" id="linkUrlPdf">
			</div>

		</div>

		<!-- start modal cotizacianes -->
		<div id="md_cotizacion_fomr_1" class="modal fade md-flipVer bg-theme-inverse-lighten" tabindex="-1" data-width="60%">
			<div class="modal-header ">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-bell-o"></i> Formulario PRE-COTIZACION</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im notification">
					<div class="panel-body">
						<h5 style="color: black;">- Dia de internacion 100 Bs. <br>- Procedimientos de enfermeria se cobra segun el consumo <br>- RX, Lab, Medicamentos en SALA: Tienen un costo adicional </h5>
						<h4 style="color: black;"></h4>
						<hr>
						<form class="form-horizontal" data-collabel="4" data-alignlabel="left" id="form_new_cotizacion">@csrf
							<input type="text" id="id_paciente_new_cotizacion" name="id_paciente_new_cotizacion" hidden>
							<div class=" col-lg-6">
								<div class="form-group">
									<label class="control-label col-md-3" style="text-align: left;">Especialidad Medica*</label>
									<div class="col-md-9">
										<input type="text" class="form-control rounded" name="EspecialidadMedica" autocomplete="off" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" style="text-align: left;">Nombre de la Cirugia*</label>
									<div class="col-md-9">
										<input type="text" class="form-control rounded" name="nombreCirugia" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" style="text-align: left;">Tiempo Aproximado</label>
									<div class="col-md-9">
										<!-- <input type=" number" class="form-control rounded" name="tiempoAproximado"> -->
										<div class="input-group">
											<input type="number" class="form-control" name="tiempoAproximado">
											<span class="input-group-addon">Hora </span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" style="text-align: left;">Cirujano (Honorarios Solicitados)</label>
									<div class="col-md-9">
										<input type="number" class="form-control rounded" name="cirujanoHonorarios">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" style="text-align: left;">Procedimiento</label>
									<div class="col-md-9">
										<select class="form-control" name="procedimiento">
											<option value="1">Mayor</option>
											<option value="2">Mediana</option>
											<option value="3">Menor</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" for="otros" style="text-align: left;">Otros</label>
									<div class="col-md-9">
										<textarea name="otros" cols="25" rows="2" class="form-control"></textarea>
									</div>
								</div>
							</div>
							<div class=" col-lg-6">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="anesteseologo" value="1">
										Anesteseologo </label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="quirofano_mayor" value="1">
										Quirofano mayor </label>
								</div>

								<div class="checkbox">
									<label>
										<input type="checkbox" name="sala_endoscopia" value="1">
										Sala de endoscopia </label>
								</div>

								<div class="checkbox">
									<label>
										<input type="checkbox" name="sala_partos" value="1">
										Sala de Partos </label>
								</div>

								<div class="checkbox">
									<label>
										<input type="checkbox" name="equipo_laparoscopia" value="1">
										Equipo de laparoscopia </label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="ayudante_1" value="1">
										Un Ayudante </label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="ayudante_2" value="1">
										Dos Ayudantes </label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="instrumentador" value="1">
										Intrumentador</label>
								</div>

								<div class="checkbox">
									<label>
										<input type="checkbox" name="circulante" value="1">
										Circulante </label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="oxigeno" value="1">
										Oxigeno </label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="aguja_k" value="1">
										Aguja K </label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="insumos_quirofano" value="1">
										Insumos en Quirofano </label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="medicamentos_quirofano" value="1">
										Medicamentos en quirofano </label>
								</div>
							</div>
							<hr>
							<div class="form-group offset">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn btn-theme-inverse">Registrar</button>
									<button type="reset" class="btn btn-danger">Cancelar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- modal parar consulta externa -->
		<div id="md-atencion_consultaExterna" class="modal fade " tabindex="-1" data-width="1000">
			<div class="modal-header ">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-bell-o"></i> Consulta externa</h4>
			</div>
			<form class="form-horizontal" id="form_registrarConsulta">@csrf
				<div class="modal-body" style="padding:0">
					<div class="widget-im notification">
						<div class="panel-body">
							<!--   -->
							<div class="row">
								<div class="col-lg-7">
									<div class="col-md-12">
										<span style="color:dimgrey ;font-weight:bolder"> Motivo de la consulta: </span>
										<textarea class="form-control" name="razon" rows="2" required></textarea>
									</div>
									<div class="col-md-12">
										<span style="color:dimgrey ;font-weight:bolder">Examen fisico: </span>
										<textarea class="form-control" name="examenFisico" rows="2"></textarea>
									</div>
									<div class="col-md-12">
										<span style="color:dimgrey ;font-weight:bolder"> Diagnóstico: </span>
										<textarea class="form-control" name="diagnostico" rows="2" required></textarea>
									</div>
									<div class="col-md-12">
										<span style="color:dimgrey ;font-weight:bolder">Plan: </span>
										<textarea class="form-control" name="tratamiento" rows="2" required></textarea>
									</div>
								</div>
								<div class="col-lg-5">

									<div class="col-md-12">
										<span style="color:dimgrey ;font-weight:bolder">Curaciones o suturas:</span>
										<textarea class="form-control" name="curacionSuturas" rows="5"></textarea>
									</div>
									<div class="col-md-12">
										<span style="color:dimgrey ;font-weight:bolder">Otras actividades de enfermería:</span>
										<textarea class="form-control" name="otros" rows="5"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-theme-inverse align-lg-right" type="submit">Registrar en Historial Clínico</button>
					<button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</form>
		</div>
		<!-- modal mostrar detalle de consulta -->
		<div id="md-detalleContulstaClinica" class="modal fade" tabindex="-1" data-width="800">
			<div class="moda-header">
				<section class="panel">
					<header class="panel-heading">
						<h2><strong>Consulta</strong> Médica</h2>
						<label class="color">Detalle completo de consulta médica</label>
					</header>
					<div id="bodyDetalleConsulta">
					</div>
				</section>
			</div>
			<div class=" modal-footer">
				<p>
				</p>
			</div>
		</div>
		<!-- End Cotizaciones -->
		<div id="md-atencion_prenatal" class="modal fade md-flipVer bg-theme-inverse-lighten" tabindex="-1" data-width="96%">
			<div class="modal-header ">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-bell-o"></i> Control Prenatal</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im notification">
					<div class="panel-body">
						<form class="form-horizontal ">
							<div class="form-group">
								<!-- <label class="control-label col-md-2">Signos Vitales</label> -->
								<div class="col-md-2">
									<label>Signos Vitales</label>
								</div>
								<div class="col-md-10">
									<div class="row">
										<div class="col-sm-7">
											<div class="col-md-4">
												<span style="color:dimgrey ;font-weight:bolder">Peso (KG) </span>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-8">
												<span style="color:dimgrey ;font-weight:bolder">Estado nutricional IMC </span>
												<select name="estadoNutricional" class="form-control">
													<option value="1">Bajo peso</option>
													<option value="2">Peso normal</option>
													<option value="3">Sobre peso</option>
													<option value="4">Obesidad</option>
												</select>
											</div>
											<div class="col-md-4">
												<span style="color:dimgrey ;font-weight:bolder">Talla (CM) </span>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-8">
												<span style="color:dimgrey ;font-weight:bolder">FUM </span>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-sm-5">
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Temperatura </span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">°C</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Fercuencia Cardiaca</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">Pul/Min</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Frecuencia respiratoria</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">RPM</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Presión arterial</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">mmHg</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<!-- <label class="control-label col-md-2">Signos Vitales</label> -->
								<div class="col-md-2">
									<label>Consulta Médica</label>
								</div>
								<div class="col-md-10">
									<div class="row">
										<div class="col-sm-5">
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Control Prenatal </span>
												<select class="form-control" name="">
													<option value="1">Nuevos antes del 5to Mes-Dentro</option>
													<option value="2">Nuevos antes del 5to Mes-Fuera</option>
													<option value="3">Nuevos a partir del 5to Mes-Dentro</option>
													<option value="4">Nuevos a partir del 5to Mes-Fuera</option>
													<option value="5">Repetidos Dentro</option>
													<option value="6">Rpetidos Fuera</option>
												</select>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Con cuatro controles<span>
														<select class="form-control" name="">
															<option value="1">Dentro</option>
															<option value="2">Fuera</option>
														</select>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Curaciones o suturas</span>
												<input type="text" class="form-control">

											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Otras actividades de enfermería</span>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-sm-7">
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder"> </span>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder">Examen físico </span>
												<input type="text" class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<!-- <label class="control-label col-md-2">Signos Vitales</label> -->
								<div class="col-md-2">
									<label></label>
								</div>
								<div class="col-md-10">
									<div class="row">
										<div class="col-sm-7">
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder"> Diagnóstico </span>
												<textarea class="form-control" name="" rows="2"></textarea>
											</div>
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder">Tratamiento </span>
												<textarea class="form-control" name="" rows="2"></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
						<button class="btn btn-theme-inverse align-lg-right">Registrar en Historial Clínico</button>
						<button class="btn btn-danger">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		<div id="md-atencion_anticoncepcion" class="modal fade md-flipVer bg-theme-inverse-lighten" tabindex="-1" data-width="50%">
			<div class="modal-header ">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-bell-o"></i> Anticoncepción</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im notification">
					<div class="panel-body">
						<form class="form-horizontal ">
							<div class="form-group">
								<!-- <label class="control-label col-md-2">Signos Vitales</label> -->
								<div class="col-md-2">
									<label>Signos Vitales</label>
								</div>
								<div class="col-md-10">
									<div class="row">
										<div class="col-sm-7">
											<div class="col-md-4">
												<span style="color:dimgrey ;font-weight:bolder">Peso (KG) </span>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-8">
												<span style="color:dimgrey ;font-weight:bolder">Estado nutricional IMC </span>
												<select name="estadoNutricional" class="form-control">
													<option value="1">Bajo peso</option>
													<option value="2">Peso normal</option>
													<option value="3">Sobre peso</option>
													<option value="4">Obesidad</option>
												</select>
											</div>
											<div class="col-md-4">
												<span style="color:dimgrey ;font-weight:bolder">Talla (CM) </span>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-8">
												<span style="color:dimgrey ;font-weight:bolder">FUM </span>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-sm-5">
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Temperatura </span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">°C</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Fercuencia Cardiaca</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">Pul/Min</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Frecuencia respiratoria</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">RPM</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Presión arterial</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">mmHg</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<button class="btn btn-theme-inverse align-lg-right">Registrar en Historial Clínico</button>
							<button class="btn btn-danger">Cancelar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Inicio Modal para vistas de laboratorio -->
		<div id="md_selectTipoPro" class="modal fade  md-stickTop" data-width="700">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h3>Informe de analisis de laboratorio</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-6">
							<div class="col-md-5">
								<div class="radio">
									<label>
										<input type="radio" name="lab_TipoPago" value="2" onchange="funDectTipoPago(this.value)">
										Autorizado
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="lab_TipoPago" value="1" checked="checked" onchange="funDectTipoPago(this.value)">
										Facturado
									</label>
								</div>
							</div>

							<div class="col-md-7">
								<div class="form-group">
									<label>Facturado / Autorizado</label>
									<div id="sec_input_pago_1">
										<input type="text" class="form-control" placeholder="# de factura" id="inp_tipoPago_fac">
									</div>
									<div id="sec_input_pago_2" style="display: none;">
										<input type="text" class="form-control" placeholder="Autorizacion..." id="inp_tipoPago_aut">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Médico Tratante</label>
								<input type="text" class="form-control" id="lab_medicoTrtante">
							</div>
						</div>
					</div>
					<br>
					<div class="col-md-12  align-xs-center">
						<br>
						<div class="btn-toolbar" role="toolbar">
							<div class="btn-group btn-group-sm" id="sec_btn_formlab">
								<button type="button" class="btn btn-theme-inverse  btn-transparent" id="btn_form1" onclick="showMdFormLab(1)">Bioquimica Clinica</button>
								<button type="button" class="btn btn-theme-inverse  btn-transparent" id="btn_form2" onclick="showMdFormLab(2)">Coagulograma</button>
								<button type="button" class="btn btn-theme-inverse  btn-transparent" id="btn_form3" onclick="showMdFormLab(3)">Biometria Hematica</button>
								<button type="button" class="btn btn-theme-inverse  btn-transparent" id="btn_form4" onclick="showMdFormLab(4)">Serologia</button>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row" id="sect_result_lab">
					<div class="col-lg-12">
						<h3 align="center">----- Biometría Hepática-----</h3><br>
						<div class="col-lg-7">
							<h4 align="center">Cuadro Hepático</h4>
							<table class="table-striped" style="border-color: black;" width="100%" border="2" cellpadding="0" cellspacing="2">
								<tr>
									<td>Globulos rojos</td>
									<td width=""></td>
									<td style="font-size: x-small;" align="right">6 - 12 min</td>
								</tr>
								<tr>
									<td>Hemoglobina</td>
									<td width="">56 min</td>
									<td style="font-size: x-small;" align="right">1 - 3 min</td>
								</tr>
								<tr>
									<td>Hematocrito</td>
									<td width="">8 segundos</td>
									<td style="font-size: x-small;" align="right"></td>
								</tr>
								<tr>
									<td>VES</td>
									<td width="">65</td>
									<td style="font-size: x-small;" align="right"></td>
								</tr>
								<tr>
									<td>LEUCOCITOS</td>
									<td width="">65</td>
									<td style="font-size: x-small;" align="right"></td>
								</tr>
								<tr>
									<td>Cayados</td>
									<td width="">65</td>
									<td style="font-size: x-small;" align="right"></td>
								</tr>
								<tr>
									<td>Neutrofilos</td>
									<td width="">65</td>
									<td style="font-size: x-small;" align="right"></td>
								</tr>
								<tr>
									<td>Eosinófilos</td>
									<td width="">65</td>
									<td style="font-size: x-small;" align="right"></td>
								</tr>
								<tr>
									<td>Basófilos</td>
									<td width="">65</td>
									<td style="font-size: x-small;" align="right"></td>
								</tr>
								<tr>
									<td>Linfositos</td>
									<td width="">65</td>
									<td style="font-size: x-small;" align="right"></td>
								</tr>
								<tr>
									<td>Monocitos</td>
									<td width="">65</td>
									<td style="font-size: x-small;" align="right"></td>
								</tr><br>
								<tr>
									<td>Glicemia</td>
									<td width="">65</td>
									<td style="font-size: x-small;" align="right">mg/dL</td>
								</tr>
								<tr>
									<td>Creatinina</td>
									<td width="">65</td>
									<td style="font-size: x-small;" align="right">mg/dL</td>
								</tr>
							</table>
							<br>
							<h4>Control</h4>
							<p>
								Tiempo de protrombina => 13 seg <br>
								Actividad protrombinica => 100% <br>
								INR =>
							</p>
							<h3 align="center">----- // -----</h3><br>

						</div>
						<div class="col-lg-5">
							<h4>Valores de referencia</h4>
							<table class=" table-striped">
								<tr>
									<td style="font-size: x-small;" align="right">VARON </td>
									<td style="font-size: x-small;" align="right">MUJER</td>
									<td style="font-size: x-small;" align="right">NIÑOS</td>
								</tr>
								<tr>
									<td style="font-size: x-small;" align="right">5.2 - 6.6</td>
									<td style="font-size: x-small;" align="right">4.5 - 5.8</td>
									<td style="font-size: x-small;" align="right">3.8 - 5.5</td>
								</tr>
								<tr>
									<td style="font-size: x-small;" align="right">16.5 - 19.0</td>
									<td style="font-size: x-small;" align="right">14.4 - 17.0</td>
									<td style="font-size: x-small;" align="right">11.0 - 16</td>
								</tr>
								<tr>
									<td style="font-size: x-small;" align="right">48 - 57</td>
									<td style="font-size: x-small;" align="right">44 - 53</td>
									<td style="font-size: x-small;" align="right">31 - 43</td>
								</tr>
								<tr>
									<td style="font-size: x-small;" align="right">1 - 10</td>
									<td style="font-size: x-small;" align="right">1 - 10</td>
									<td style="font-size: x-small;" align="right">1 - 10</td>
								</tr>
							</table><br><br>
							<table class=" table-striped">
								<tr>
									<td style="font-size: x-small;" align="right">VARON - Mujer </td>
									<td style="font-size: x-small;" align="right">NIÑOS</td>
								</tr>
								<tr>
									<td style="font-size: x-small;" align="right">5000 - 10000</td>
									<td style="font-size: x-small;" align="right"> 6.200 - 12000</td>
								</tr>
								<tr>
									<td style="font-size: x-small;" align="right">%</td>
									<td style="font-size: x-small;" align="right">%</td>
								</tr>
								<tr>
									<td style="font-size: x-small;" align="right">0 - 3</td>
									<td style="font-size: x-small;" align="right">0 - 3</td>
								</tr>
								<tr>
									<td style="font-size: x-small;" align="right"> 0 - 1</td>
									<td style="font-size: x-small;" align="right"> 0 - 2</td>
								</tr>
								<tr>
									<td style="font-size: x-small;" align="right"> 25 - 35</td>
									<td style="font-size: x-small;" align="right"> 30 - 40</td>
								</tr>
								<tr>
									<td style="font-size: x-small;" align="right"> 2 - 8</td>
									<td style="font-size: x-small;" align="right"> 2 - 6</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<!--//row-->
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-inverse">Close</button>
				<button class="btn btn-theme" id="btn-showLabSeleccionados" onclick="regLab_create()">Continuar</button>
			</div>
		</div>
		<!-- modal registro de formularios laboratorio -->
		<div id="md_lab_form1" class="modal fade md-flipHor" tabindex="-1" data-width="600">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h3>Registro de resultados en laboratorio</h3>
			</div>
			<div class="modal-body">
				<form id="lab_form1"></form>
			</div>
		</div>

		<!-- Fin Modal para vistas de laboratorio -->
		<nav id="menu">
			<ul>
				<li><span><i class="icon  fa fa-laptop"></i> Registor de atención</span>
					<ul>
						<li><a href="dashboard.html"><i class="icon  fa fa-rocket"></i> Pre-Cotizaciones registradas </a></li>
						<li><a href="dashboard2.html"><i class="icon  fa fa-th"></i> </a></li>
					</ul>
				</li>
				<li><a href="front/index.html"><i class="icon  fa fa-rocket"></i> Front End </a></li>
			</ul>
		</nav>

		<!-- modal para confirmacion de eliminar -->
		<div id="md-confEliminacion" class="modal fade md-stickTop" tabindex="-1" data-width="280">
			<div class="modal-header bg-inverse bd-inverse-darken">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title">Desea eliminar elemento?</h4>
			</div>
			<!-- //modal-header-->
			<div class="modal-body">
				<div class="col-lg-6 align-lg-left">
					<button class="btn btn-theme-inverse btn-block" id="btn_funEliminar"><i class="fa fa-check"></i>Confirmar</button>
				</div>
				<div class="col-lg-6 align-lg-right">
					<button class="btn btn-danger btn-block" data-dismiss="modal"><i class="fa fa-warning"></i> Cancelar</button>
				</div>
			</div>
			<!-- //modal-body-->

		</div>
		<div id="md-form1_vistaHCL" class="modal fade md-stickTop" tabindex="-1" data-width="1200">

			<div class="moda-body" height=1100 id="" style="background-color: black;">
				<div align="center" id="loadingAni">
					<svg width="51px" height="50px" viewBox="0 0 51 50">

						<rect y="0" width="13" height="50" fill="#1fa2ff">
							<animate attributeName="height" values="50;10;50" begin="0s" dur="1s" repeatCount="indefinite" />
							<animate attributeName="y" values="0;20;0" begin="0s" dur="1s" repeatCount="indefinite" />
						</rect>

						<rect x="19" y="0" width="13" height="50" fill="#12d8fa">
							<animate attributeName="height" values="50;10;50" begin="0.2s" dur="1s" repeatCount="indefinite" />
							<animate attributeName="y" values="0;20;0" begin="0.2s" dur="1s" repeatCount="indefinite" />
						</rect>

						<rect x="38" y="0" width="13" height="50" fill="#06ffcb">
							<animate attributeName="height" values="50;10;50" begin="0.4s" dur="1s" repeatCount="indefinite" />
							<animate attributeName="y" values="0;20;0" begin="0.4s" dur="1s" repeatCount="indefinite" />
						</rect>

					</svg>
				</div>
				<embed src="" type="" width="1200" height="600" id="linkUrlPdf_hcl">
			</div>

		</div>

		<!-- modal perfil de usuario -->
		<div id="md-perfilUsuario" class="modal fade md-stickTop" tabindex="-1" data-width="950">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h3>Actualizar Información</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<form class="form-horizontal" data-collabel="6" data-alignlabel="rigth" id="form_updateUser">
						@csrf
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label">CI*:</label>
								<div>
									<input type="number" min="0" class="form-control rounded" placeholder="# de C.I." id="createUserCiUp" name="createUserCiUp" onkeyup="validar('createUserCi')" required autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Nombre*:</label>
								<div>
									<input type="text" class="form-control rounded" id="nombreUp" name="nombreUp" placeholder="Nombre completo" pattern="[A-ZñÑa-z ]+" onkeyup="validar('nombre')" required autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Apellidos*:</label>
								<div>
									<input type="text" class="form-control rounded" id="apellido1Up" name="apellido1Up" placeholder="Apellido paterno" pattern="[A-ZñÑa-z ]+" onkeyup="validar('apellido1')" required autocomplete="off"><br>
									<input type="text" class="form-control rounded" id="apellido2Up" name="apellido2Up" placeholder="Apellido materno" pattern="[A-ZñÑa-z ]+" onkeyup="validar('apellido2')" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label" for="inputTwo">Fecha Nacimiento*:</label>
								<div>
									<input type="date" class="form-control rounded" id="fechaNacimientoUp" name="fechaNacimientoUp" required autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Pais de nacimiento*:</label>
								<div>
									<input type="text" class="form-control rounded" id="paisNacimientoUp" name="paisNacimientoUp" pattern="[A-ZñÑa-z ]+" onkeyup="validar('paisNacimiento')" required autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Departamento nacimiento*:</label>
								<div>
									<input type="text" class="form-control rounded" id="depNacimientoUp" name="depNacimientoUp" pattern="[A-ZñÑa-z ]+" onkeyup="validar('depNacimiento')" required autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Tipo de Sangre:</label>
								<div>
									<input type="text" class="form-control rounded" id="tipoSangreUp" name="tipoSangreUp" onkeyup="validar('tipoSangre')" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Sexo</label>
								<div>
									<label class="radio-inline">
										<input type="radio" name="sexoUp" id="sexo1Up" value="masculino" checked>
										Masculino </label>
									<label class="radio-inline">
										<input type="radio" name="sexoUp" id="sexo2Up" value="femenino">
										Femenino </label>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label">Correo electronico*</label>
								<div>
									<input class="form-control" type="email" id="emailUp" name="emailUp" placeholder="nombre@gmail.com" onkeyup="validar('email')" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Estado Civil</label>
								<div>
									<select class="form-control" id="estadoCivilUp" name="estadoCivilUp" required>
										<option value="soltero">Soltero</option>
										<option value="casado">Casado</option>
										<option value="viudo">Viudo</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Telf / Cel*</label>
								<div>
									<div class="input-icon"> <i class="fa fa-map-marker ico"></i>
										<input class="form-control " type="text" pattern="[0-9]+" id="telfUp" name="telfUp" maxlength="10" required onkeyup="validar('telf')" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Telf / Cel Referencia</label>
								<div>
									<div class="input-icon"> <i class="fa fa-user ico"></i>
										<input class="form-control " type="text" id="telfRefUp" name="telfRefUp" pattern="[0-9]+" maxlength="10" onkeyup="validar('telfRef')" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Zona donde sufragia*:</label>
								<div>
									<div class="input-icon right"> <i class="fa fa-keyboard-o ico "></i>
										<input class="form-control " type="text" placeholder="Zona Especifica donde sufragia" pattern="[A-ZñÑa-z0-9 ]+" id="zonaSufragioUp" name="zonaSufragioUp" onkeyup="validar('zonaSufragio')" required autocomplete="off">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Zona donde recide*:</label>
								<div>
									<div class="input-icon right"> <i class="fa fa-keyboard-o ico "></i>
										<input class="form-control " type="text" placeholder="Zona Especifica donde recide" pattern="[A-ZñÑa-z0-9# ]+" id="zonaUp" name="zonaUp" onkeyup="validar('zona')" required autocomplete="off">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Domicilio</label>
								<div>
									<input class="form-control" type="text" placeholder="Direccion del domicilio" pattern="[A-ZÑña-z0-9# ]+" id="domicilioUp" name="domicilioUp" onkeyup="validar('domicilio')" autocomplete="off">
								</div>
							</div>
							<button type="submit" class="btn btn-danger btn-block">Actualizar </button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div id="md-perfilUsuario_pass" class="modal fade md-stickTop" tabindex="-1" data-width="950">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h3>Actualizar Contraseña</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<form class="form-horizontal" data-collabel="6" data-alignlabel="rigth" id="form_updateKey">
						@csrf
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label">Cambiar Contraseña*</label>
								<div>
									<input class="form-control" type="password" name="password" id="key" placeholder="*********" autocomplete="off">
								</div>
							</div>
							<div class="form-group offset">
								<div>
									<button type="submit" class="btn btn-theme-inverse">Actualizar Contraseña</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- modal confirmacion de conclucion de cita medica -->
		<div id="md-confTerminarCitaMedica" class="modal fade md-stickTop" tabindex="-1" data-width="450">
			<div class="modal-header bg-inverse bd-inverse-darken">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title">Desea Concluir Atencion Medica</h4>
			</div>
			<!-- //modal-header-->
			<div class="modal-body">
				<div class="col-lg-6">
					<button class="btn btn-danger btn-block" onclick="btnConcluirCitaMedica(0)">Cancelar</button>
				</div>
				<div class="col-lg-6">
					<button class="btn btn-theme-inverse btn-block" onclick="btnConcluirCitaMedica(1)">Aceptar</button>
				</div>
			</div>
			<!-- //modal-body-->
		</div>


		<!-- Jquery Library -->
		<script type="text/javascript" src="{{ asset('Plantilla/assets/js/jquery.min.js')}}"></script>
		<script type="text/javascript" src="{{ asset('Plantilla/assets/js/jquery.ui.min.js')}}"></script>
		<script type="text/javascript" src="{{ asset('Plantilla/assets/plugins/bootstrap/bootstrap.min.js')}}"></script>
		<!-- Modernizr Library For HTML5 And CSS3 -->
		<script type="text/javascript" src="{{ asset('Plantilla/assets/js/modernizr/modernizr.js')}}"></script>
		<script type="text/javascript" src="{{ asset('Plantilla/assets/plugins/mmenu/jquery.mmenu.js')}}"></script>
		<script type="text/javascript" src="{{ asset('Plantilla/assets/js/styleswitch.js')}}"></script>
		<script type="text/javascript" src="{{ asset('Plantilla/assets/js/styleswitch.js')}}"></script>
		<!-- Library 10+ Form plugins-->
		<script type="text/javascript" src="{{ asset('Plantilla/assets/plugins/form/form.js')}}"></script>
		<!-- Datetime plugins -->
		<script type="text/javascript" src="{{ asset('Plantilla/assets/plugins/datetime/datetime.js')}}"></script>
		<!-- Library Chart-->
		<script type="text/javascript" src="{{ asset('Plantilla/assets/plugins/chart/chart.js')}}"></script>
		<!-- Library  5+ plugins for bootstrap -->
		<script type="text/javascript" src="{{ asset('Plantilla/assets/plugins/pluginsForBS/pluginsForBS.js')}}"></script>
		<!-- Library 10+ miscellaneous plugins -->
		<script type="text/javascript" src="{{ asset('Plantilla/assets/plugins/miscellaneous/miscellaneous.js')}}"></script>
		<!-- Library Themes Customize-->
		<script type="text/javascript" src="{{ asset('Plantilla/assets/js/caplet.custom.js')}}"></script>

		<script type="text/javascript" src="{{ asset('Plantilla/zoom/jquery.zoom.js')}}"></script>




		<!--  funciones de historias clinicas -->
		<script type="text/javascript" src="{{ asset('resources/js/funIniciales.js') }}"></script>
		<script type="text/javascript" src="{{ asset('resources/js/historiaClinica.js') }}"></script>
		<script type="text/javascript" src="{{ asset('resources/js/cotizacion.js') }}"></script>
		<script type="text/javascript" src="{{ asset('resources/js/resetarioMedico.js') }}"></script>
		<script type="text/javascript" src="{{ asset('resources/js/signosVitales.js') }}"></script>
		<script type="text/javascript" src="{{ asset('resources/js/ordenMedica.js') }}"></script>
		<!-- js de dropzone -->
		<script type="text/javascript" src="{{ asset('Plantilla/dropzone/dist/dropzone.js')}}"></script>
		<script type="text/javascript" src="{{ asset('resources/js/servrx.js') }}"></script>
		<script type="text/javascript" src="{{ asset('resources/js/consultaMedica.js') }}"></script>
		<script type="text/javascript" src="{{ asset('resources/js/laboratorio.js') }}"></script>
		<script type="text/javascript" src="{{ asset('resources/js/laboratorioFormulario.js') }}"></script>


		<audio src="{{ asset('/resources/js/tono/alerta-nextel-ringtones.mp3') }}" id="sonido" preload="auto"></audio>

		<script type="text/javascript">
			$('#alarma').click(function(e) {
				e.preventDefault();
				document.getElementById('sonido').play();
				console.log('asdfasdf');

			});
		</script>
</body>

</html>