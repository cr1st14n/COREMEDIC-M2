<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Aloha!</title>
    <!-- <link type="text/css" rel="stylesheet" href="{{ asset('Plantilla/bootstrap/style.css')}}" /> -->
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        body {
            border-style: solid;
            border-width: 1px;
            border-left-width: 1px;
            border-right-width: 1px;
            border-color: black;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>
</head>

<body>
    <table width="100%">
        <tr>
            <td align="rigth" valign=""><img src="{{ asset('Plantilla/assets/img/logo_reporte.png')}}" alt="" width="150" />
                <h5 style="font-size: 7; border:none ;" rows="6" align="rigth">
                    ALTA ESPECIALIDAD EN REEMPLAZOS ARTICULARES <br>
                    Av. Arica esquina Calle Fernando Romero <br>
                    Edificio el Faro, Nro 65 <br>
                    Frente a la estación del Teleférico Morado <br>
                </h5>

            </td>
            <td align="right" valign="bottom" width=50%>
                <strong style="font-size: 11;"> HISTORIA CLINICA</strong><br>
                Ambulatoria|Consulta externa
            </td>
        </tr>

    </table>
    <table width="100%">
        <tr style="margin: 0px;">
            <td width=50%>
                <strong>Paciente:</strong> {{$paciente->pa_nombre}} {{$paciente->pa_appaterno}} {{$paciente->pa_apmaterno}} <br>
                <strong>Fecha Nac.:</strong> {{$paciente->pa_fechnac}} <br>
                <strong>Edad:</strong> {{ $edad}}
            </td>
            <td>
              
            </td>
        </tr>
        <tr>
            <td colspan="2">
            </td>
        </tr>
    </table>
    <hr><br>
    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th width=10% style="font-size: 5 px;">Fecha</th>
                <th width=15% style="font-size: 5 px;">Médico</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key=>$d)
            <tr>
                <td align="center">{{$data[$key]['fecha']}}</td>
                <td align="center">{{$data[$key]['med']['usu_nombre']}} {{$data[$key]['med']['usu_appaterno']}} {{$data[$key]['med']['usu_apmaterno']}}</td>
                <td align="left" style="font-size: 9px;">
                    Motivo: {{$data[$key]['c1']['cc_motivo']}} <br>
                    Examen Físico: {{$data[$key]['c2']['examenFisico']}} <br>
                    Diagnóstico: {{$data[$key]['c1']['cc_diagnostico']}} <br>
                    Plan: {{$data[$key]['c2']['tratamiento']}} <br>
                    <!-- Inyectable: {{$data[$key]['c2']['inyectable']}} <br> -->
                    <!-- Suero: {{$data[$key]['c2']['suero']}} <br> -->
                    Curaciones o Suturas: {{$data[$key]['c2']['curacionSuturas']}} <br>
                    Otros Procedimientos: {{$data[$key]['c2']['otros']}} <br>
                    <hr>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    <hr>
    <table width="100%">
        <tbody>
            <tr>
                <td align="left">
                    <!-- <strong>Nota:</strong> -->
                </td>
                <td align="right">
                </td>
                <!-- <td valign="top" align="right"><br><img src="https://static-unitag.com/images/help/QRCode/qrcode.png?mh=07b7c2a2" width="100px" height="100px" alt=""> -->
            </tr>
        </tbody>
    </table>
</body>

</html>