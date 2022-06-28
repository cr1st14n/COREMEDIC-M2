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
            /* border-style: solid;
            border-width: 1px;
            border-left-width: 1px;
            border-right-width: 1px;
            border-color: black; */
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
                    Edificio el Faro Nro 65 <br>
                    Frente a la estación del Teleférico Morado <br>
                </h5>

            </td>
            <td align="right" valign="bottom" width=50%>
                <strong style="font-size: 11;"> RECETA MÉDICA</strong><br>
                Ambulatoria|Consulta externa
            </td>
            <td width=10%></td>
        </tr>

    </table>
    <table width="100%">
        <tr style="margin: 0px;">
            <td width=50%>
                <strong>Paciente:</strong> {{$paciente1}} <br>
                <strong>Fecha Nac.:</strong> {{$paciente->pa_fechnac}} <br>
                <strong>Edad:</strong> {{ $edad}}
            </td>
            <td>
                <strong>Médico:</strong> {{$medico->usu_nombre }} {{ $medico->usu_appaterno}} {{ $medico->usu_apmaterno}} <br>
                <strong>Fecha:</strong> {{$data->created_at }} <br>
                <strong>Teléfono:</strong> {{$medico->usu_telf }}
            </td>
        </tr>
    </table>
    <hr><br>
    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>Medicamento</th>
                <th>Forma</th>
                <th>Vía</th>
                <th>Cant</th>
                <th>Dosis</th>
            </tr>
        </thead>
        <tbody>
            @foreach($farmacos as $key=>$medic)
            <tr>
                <td>{{ $farmacos[$key]['a']}}</td>
                <td align="center">{{ $farmacos[$key]['b']}}</td>
                <td align="center">{{ $farmacos[$key]['c']}}</td>
                <td align="center">{{ $farmacos[$key]['e']}}</td>
                <td align="center" style="font-size: 9px;">{{ $farmacos[$key]['d']}}</td>
            </tr>
            @endforeach
            <!-- <tr>
                <th scope="row">1</th>
                <td>Playstation IV - Black</td>
                <td align="right">1</td>
                <td align="right">1400.00</td>
                <td align="right">1400.00</td>
            </tr> -->
        </tbody>

        <!-- <tfoot>
            <tr>
                <td colspan="3"></td>
                <td align="right">Subtotal $</td>
                <td align="right">1635.00</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td align="right">Tax $</td>
                <td align="right">294.3</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td align="right">Total $</td>
                <td align="right" class="gray">$ 1929.3</td>
            </tr>
        </tfoot> -->
    </table>
    <hr>
    <table width="100%">
        <tbody>
            <tr>
                <td align="left" >
                    <strong>Nota:</strong>
                    {{$descMedico}}
                </td>
                <td align="right">
                    <img src="data:image/png;base64,{!! base64_encode($qr)!!}" alt="" width="50">
                </td>
                <!-- <td valign="top" align="right"><br><img src="https://static-unitag.com/images/help/QRCode/qrcode.png?mh=07b7c2a2" width="100px" height="100px" alt=""> -->
            </tr>
        </tbody>
    </table>
</body>

</html>