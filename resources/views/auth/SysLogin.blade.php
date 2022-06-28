<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title-->
    <title>{{ config('app.name', 'Laravel') }} | Med</title>
    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('Plantilla/assets/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('Plantilla/assets/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('Plantilla/assets/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('/Plantilla/assets/ico/apple-touch-icon-57-precomposed.png')}}">
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

</head>

<body class="full-lg">
    <div id="wrapper">

        <div id="loading-top">
            <div id="canvas_loading"></div>
            <span>Comprovando...</span>
        </div>

        <div id="main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="account-wall">
                            <section class="align-lg-center">
                                <div class="site-logo"></div>
                                <h1 class="login-title"> <span>TRAUMA MEDICAL</span> <br>
                                    <h5>Alta Especialidad en Remplazos Articulares</h5>
                                </h1>
                            </section>
                            <form id="form-signin" class="form-signin">
                                {{ csrf_field()}}
                                <section>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" class="form-control" name="usu_ci" placeholder="CI de usuario" autocomplete="off">
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                        <input type="password" class="form-control" name="password" placeholder="Contraseña">
                                    </div>
                                    <button class="btn btn-lg btn-theme-inverse btn-block" type="submit" id="sign-in">Ingresar</button>
                                </section>
                                <!-- <span class="or" data-text="Or"></span> -->
                            </form>
                            <section class="align-lg-center">
                                <h1 class="login-title"><span>COREMEDIC </span> <small> Médico Clinico <br> Versión 1.5</small>
                                </h1>
                            </section>
                            <!-- <a href="#" class="footer-link">&copy; 2014 ziceinclude &trade; </a> -->
                        </div>
                        <!-- //account-wall-->

                    </div>
                    <!-- //col-sm-6 col-md-4 col-md-offset-4-->
                </div>
                <!-- //row-->
            </div>
            <!-- //container-->

        </div>
        <!-- //main-->


    </div>
    <!-- //wrapper-->


    <!--
////////////////////////////////////////////////////////////////////////
//////////     JAVASCRIPT  LIBRARY     //////////
/////////////////////////////////////////////////////////////////////
-->
    <!-- Jquery Library -->
    <script type="text/javascript" src="{{ asset('Plantilla/assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('Plantilla/assets/js/jquery.ui.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('Plantilla/assets/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <!-- Modernizr Library For HTML5 And CSS3 -->
    <script type="text/javascript" src="{{ asset('Plantilla/assets/js/modernizr/modernizr.js')}}"></script>
    <script type="text/javascript" src="{{ asset('Plantilla/assets/plugins/mmenu/jquery.mmenu.js')}}"></script>
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
    <script type="text/javascript">
        $(function() {
            //Login animation to center 
            function toCenter() {
                var mainH = $("#main").outerHeight();
                var accountH = $(".account-wall").outerHeight();
                var marginT = (mainH - accountH) / 2;
                if (marginT > 30) {
                    $(".account-wall").css("margin-top", marginT - 15);
                } else {
                    $(".account-wall").css("margin-top", 30);
                }
            }
            toCenter();
            var toResize;
            $(window).resize(function(e) {
                clearTimeout(toResize);
                toResize = setTimeout(toCenter(), 500);
            });

            //Canvas Loading
            var throbber = new Throbber({
                size: 32,
                padding: 17,
                strokewidth: 2.8,
                lines: 12,
                rotationspeed: 0,
                fps: 15
            });
            throbber.appendTo(document.getElementById('canvas_loading'));
            throbber.start();

            //Set note alert
            setTimeout(function() {
                $.notific8('Hola, recuerda que tu usuario es tu : <strong>CI</strong>.<br> Si no tienes una cuenta en el sistema <strong> Consulta en administracion.</strong>', {
                    life: 2000,
                    sticky: false,
                    horizontalEdge: 'top',
                    theme: 'inverse',
                    heading: 'Iniciode secion'
                })
            }, 1000);

            $("#form-signin").submit(function(event) {
                event.preventDefault();
                var main = $("#main");
                //scroll to top
                main.animate({
                    scrollTop: 0
                }, 5000);
                main.addClass("slideDown");

                // send username and password to php check login
                // console.log($(this).());
                $.ajax({
                    url: "login",
                    data: $(this).serializeArray(),
                    type: "POST",
                    dataType: 'json',
                    success: function(e) {
                        console.log(typeof(e));
                        setTimeout(function() {
                            main.removeClass("slideDown")
                        }, /* !e.status ? 500 : */ 3000);
                        setTimeout(function() {
                            $("#loading-top span").text("Verificando datos...")
                        }, 500);
                        if (e) {
                            setTimeout(function() {
                                $("#loading-top span").text("Datos Correctos.! Direcccionando a pagina de inicio...")
                            }, 2000);
                            setTimeout(function() {
                                window.location.href = 'home';
                            }, 3000);
                            // $.notific8('Datos correctos !! ', {
                            //     life: 3000,
                            //     horizontalEdge: "top",
                            //     theme: "inverse",
                            //     heading: " Bien :); "
                            // });
                        } else {
                            setTimeout(() => {
                                $.notific8('Datos Incorrectos.!  ', {
                                    life: 3000,
                                    horizontalEdge: "top",
                                    theme: "danger",
                                    heading: " ERROR :; "
                                });
                            }, 1700);
                        }
                    }
                });

            });
        });
    </script>
</body>

</html>