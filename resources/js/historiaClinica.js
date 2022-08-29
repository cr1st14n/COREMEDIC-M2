function colaPacienteMedAten() {
    $.ajax({
        type: "get",
        url: "historiaClinica/colaPacienteMedAten",
        data: "data",
        // dataType: "json",
        success: function (response) {
            console.log(response);
            var html2 = response.res
                .map(function (e) {
                    if (response.TipUsu!='SisMed_enf') {
                        botton1=`<button class="btn btn-theme-inverse btn-xs" onclick="concluirCita(${e.id})" >`;
                    }else{
                        botton1=``;
                    }
                    return (a = `
                        <div class="widget-mini-chart align-xs-left" id="fichaOrden_${e.id}">
                            <div class="pull-right">
                                <div class="im-thumbnail"><img alt="" src="Plantilla/assets/img/historiaClinica2.png"  width="50" height="50" /></div>
                            </div>
                            ${botton1}
                            <i class="fa fa-check"></i></button>
                            <p style=" color:tan; ">${e.ate_procedimiento}</p>
                             <a href="#" onclick="showHistoriaClinica(${e.pa_id},${e.id})" style=" color:aliceblue; "><h5>${e.pa_nombre} ${e.pa_appaterno}</h5></a>
                        </div>`);
                })
                .join(" ");
            $("#collapseSummary").html(html2);
        },
    });
}

// * funiones para concluir cita
var idCitaSelect = 0;
function concluirCita(id) {
    console.log(id);
    idCitaSelect = id;
    $("#md-confTerminarCitaMedica").modal("show");
}
function btnConcluirCitaMedica(param) {
    if (param == 1) {
        $.ajax({
            type: "post",
            url: "historiaClinica/concluirAte",
            data: {
                _token: $("meta[name=csrf-token]").attr("content"),
                id: idCitaSelect,
            },
            // dataType: "dataType",
            success: function (response) {
                console.log(response["estado"]);
                if (response["estado"]) {
                    $("#fichaOrden_" + response["id"]).remove();
                    $("#panel1").html("");

                    $("#sector_ani_carga").html("");
                    $("#sector_ani_carga_2").html("");
                    $("#tarjeta_signosV_title").html("");

                    colaPacienteMedAten();
                    $("#md-confTerminarCitaMedica").modal("hide");
                } else {
                    console.log("no funciono");
                }
            },
        });
    } else {
        $("#md-confTerminarCitaMedica").modal("hide");
    }
}

// *-------------------------------------

function showHistoriaClinica(paciente, idAtencion) {
    console.log(idAtencion);
    idPacienteSelect = paciente;
    idAtencionSelect = idAtencion;
    $("#form_new_cotizacion").trigger("reset");
    $.ajax({
        type: "GET",
        url: "historiaClinica/hcl",
        data: { id: idPacienteSelect },
        dataType: "text",
        success: function (dat) {
            $("#panel1").html(dat);
            $("#md-listPacientesEspera").modal("hide");
            $("#sector_ani_carga").html(html_ani_carga);
            $("#sector_ani_carga_2").html("");
            showSigVi();
        },
    });
}
function showSigVi(e) {
    setTimeout(() => {
        $.ajax({
            type: "get",
            url: "historiaClinica/showSigVi",
            data: { id: idPacienteSelect, id2: idAtencionSelect },
            // dataType: "dataType",
            success: function (response) {
                console.log(response.sv);
                console.log(response);
                if (response.mc != null) {
                    html3 = `
                <h4>${response.mc}</h4>
                `;
                }
                html = ``;
                if (response.sv == "sin datos") {
                    html = `
                <h4>Sin Registros</h4>
                `;
                } else {
                    html = `
                    <table width="100%" id="table_SV_data">
                        <tr align="left">
                            <td style="width:50%">
                                P.A. : <strong>${response.sv.sv_pa}</strong><br>
                                F.C. : <strong>${response.sv.sv_fc}</strong><br>
                                F.R. : <strong>${response.sv.sv_fr}</strong><br>
                                Sat. : <strong>${response.sv.sv_st}</strong><br>
                            </td>
                            <td style="width:50%">
                                Temp. : <strong>${
                                    response.sv.sv_te
                                }</strong><br>
                                Peso : <strong>${response.sv.sv_pe}</strong><br>
                                Talla : <strong>${
                                    response.sv.sv_ta
                                }</strong><br>
                                IMC : <strong>${calcularIMC1(
                                    response.sv.sv_ta,
                                    response.sv.sv_pe
                                )}</strong><br>
                            </td>
                        </tr>
                    </table>
                    `;
                }

                html2 = "";
                if (response.estado == "1") {
                    html2 = `
                <h4><strong>Signos Vitales</strong></h4> <span class="label bg-theme-inverse"> Actualizado a la Fecha Presente</span>
                `;
                } else {
                    html2 = `
                    <h4><strong>Signos Vitales</strong></h4> <span class="label bg-danger"> Toma de signos Desactualizada </span>
                    `;
                }

                $("#sector_ani_carga").html(html);
                $("#tarjeta_signosV_title").html(html2);
                $("#sector_ani_carga_2").html(html3);
            },
        });
    }, 3000);
}

$("#btn_showFormConsulta").click(function () {
    console.log(idPacienteSelect);
});
function showModalFormConsulta() {
    $("#md-tipoConsulta").modal("show");
}

// *------- funciones de contador-----------
cont = 0;
setInterval(() => {
    $.ajax({
        type: "GET",
        url: "historiaClinica/nroPacienteCola",
        // data: "data",
        // dataType: "text",
        success: function (pacientes) {
            if (cont != pacientes.cantidad) {
                $("#nroPacientesFila").text(pacientes.cantidad);
                if (pacientes.cantidad > cont) {
                    document.getElementById("sonido").play();
                }
                cont = pacientes.cantidad;
                colaPacienteMedAten();
            }
        },
    });
}, 4000);
// !----------------------------------
function showModalTipoConsulta() {
    $("#md-tipoConsulta").modal("show");
}
function ShowModalAtencion(tipo) {
    switch (tipo) {
        case 1:
            $("#md-atencion_consultaExterna").modal("show");

            break;
        case 2:
            $("#md-atencion_prenatal").modal("show");
            console.log("SLDFJLK");
            break;
        case 3:
            $("#md-atencion_anticoncepcion").modal("show");
            console.log("SLDFJLK");
            break;
        default:
            break;
    }
}
/* Show modal Formularios  */

function showhistoriaCompl_1() {
    $.ajax({
        type: "get",
        url: "/COREMEDIC-M2/historiaClinica/datoClinico_1",
        data: { id: idPacienteSelect },
        // dataType: "dataType",
        success: function (response) {
            if (response.d2 == "") {
                notif("4", "Sin registro en atención");
            } else {
                $("#md-form1_vistaHCL").modal("show");
                var url = `/COREMEDIC-M2/historiaClinica/pdf_hcl_1/${idPacienteSelect}`;
                $("#linkUrlPdf_hcl").attr("src", url);
                console.log(response);
                setTimeout(() => {
                    $("#loadingAni").hide();
                    console.log("asdf");
                }, 500);
            }
        },
    });
}
