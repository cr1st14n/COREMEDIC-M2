<?
function calculaedad($fechanacimiento)
{
    list($ano, $mes, $dia) = explode("-", $fechanacimiento);
    $ano_diferencia  = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia   = date("d") - $dia;
    if ($dia_diferencia < 0 || $mes_diferencia < 0)
        $ano_diferencia--;
    return $ano_diferencia;
}
?>
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
            /* border-style: solid; */
            /* border-width: 1px; */
            /* border-left-width: 1px; */
            /* border-right-width: 1px; */
            /* border-color: black; */
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
                <strong style="font-size: 11;"> NOTA DE PROCEDIMIENTO</strong><br>
                Ambulatoria|Consulta externa
            </td>
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
        <tr>
            <td colspan="2">
                <strong>Diagnostico: </strong> {{$data->om_otrotext }}
            </td>
        </tr>
    </table>
    <hr>
    <div class="row" style="font-size: 8; display: inline-block;
    margin: 5 px;
    padding: 5 px;">
        {{print $data->om_texto}}
    </div>
    <hr>
    <table width="100%">
        <tbody>
            <tr>
                <td align="left">
                    <strong> La solicitud carece de validez si no lleva firma y sello del médico</strong>
                </td>
                <td align="right">
                    <img src="data:image/png;base64,{!! base64_encode($QR)!!}" alt="" width="50">
                </td>
                <!-- <td valign="top" align="right"><br><img src="https://static-unitag.com/images/help/QRCode/qrcode.png?mh=07b7c2a2" width="100px" height="100px" alt=""> -->
            </tr>
        </tbody>
    </table>


</body>

</html>