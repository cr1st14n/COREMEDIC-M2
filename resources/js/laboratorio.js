var labformselect; //*variable para asignar tipo de formualrio a llenar
var contLab = [];

function btn_listLab() {
    showHistLabPaciente();
}
function showHistLabPaciente() {
    $.ajax({
        type: "get",
        url: "laboratorio/showHistLabPaci",
        data: { paciente: idPacienteSelect },
        // dataType: "dataType",
        success: function (response) {
            var html = response
                .map(function (e) {
                    if (e.lab.lab_tipoPago == 1) {
                        var tipoPago = "Facturado";
                    } else {
                        var tipoPago = "Autorizado";
                    }
                    var f = new Date(e.lab.created_at);
                    f = f.toLocaleString("es-ES", "dd/mm/yyyy");
                    var html2 = e.cont
                        .map(function (param) {
                            return (a = `${verificarTipoDeLab(param.tipo)}`);
                        })
                        .join(" ");
                    return (body = `
                <tr>
                    <td>${f}</td>
                    <td>${tipoPago}</td>
                    <td>${e.lab.lab_respaldo}</td>
                    <td>${html2}</td>
                    <td>${e.lab.lab_medTratante}</td>
                    <td>
                        <span class="tooltip-area">
                            <button type="button" onclick="vistaPdfLab(${e.lab.id})" class="btn btn-default btn-sm" title="Mostrar"><i class="fa fa-eye"></i></button>
                        </span>
                    </td>
                </tr>
                `);
                })
                .join(" ");
            $("#table_body_labPaciente").html(html);
        },
    });
}
function verificarTipoDeLab(veri) {
    switch (veri) {
        case "1":
            tipoText = "Bioquimica Clinica,";
            break;
        case "2":
            tipoText = "Coagulograma,";
            break;
        case "3":
            tipoText = "Biometria Hematica,";
            break;

        default:
            break;
    }
    return tipoText;
}
function showModSelectTipoLab() {
    data = new Object();
    contLab = [];
    $("#form-selectTipoLab").trigger("reset");
    $("#md_selectTipoPro").modal("show");
    $("#sect_result_lab").html("");
}

function showContent(form) {
    console.log(form);
    element = document.getElementById(form);
    check = document.getElementById("check_" + form);
    if (check.checked) {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
}

function showMdFormLab(tipo) {
    labformselect = tipo;
    if (ComprobarLab(tipo)) {
        notif("4", "Formuario ya cargado!");
    } else {
        switch (tipo) {
            case 1:
                $("#lab_form1").html(contentFormLab(1));
                $("#md_lab_form1").modal("show");
                break;
            case 2:
                $("#lab_form1").html(contentFormLab(2));
                $("#md_lab_form1").modal("show");
                break;
            case 3:
                $("#lab_form1").html(contentFormLab(3));
                $("#md_lab_form1").modal("show");
                break;
            case 4:
                $("#lab_form1").html(contentFormLab(4));
                $("#md_lab_form1").modal("show");
                break;
            default:
                break;
        }
    }
}

function ComprobarLab(tipo) {
    let pueblo = contLab.find((x) => x.tipo == tipo);
    if (pueblo) {
        pueblo = true;
    } else {
        pueblo = false;
    }
    return pueblo;
}

$("#lab_form1").submit(function (e) {
    //* validacion y registro
    e.preventDefault();
    form = $("#lab_form1");
    console.log(form.serialize());
    console.log(form.serializeArray());
    lab1 = {
        tipo: labformselect,
        dataTa: form.serialize(),
        data: form.serializeArray(),
    };
    contLab.push(lab1);
    $("#md_lab_form1").modal("hide");
    mostrarVista(lab1);
});

function eraseFormLab(nom, tipo) {
    console.log(nom);
    console.log(tipo);
    $(`#${nom}`).remove();
    console.log(contLab);
    for (let i = 0; i < contLab.length; i++) {
        if (contLab[i].tipo == tipo) {
            console.log(contLab[i].tipo);
            contLab.splice(i, 1);
        } else {
        }
    }
    console.log(contLab);
}

function funDectTipoPago(tipo) {
    sect_1 = document.getElementById("sec_input_pago_1");
    sect_2 = document.getElementById("sec_input_pago_2");
    if (tipo == 1) {
        sect_1.style.display = "block";
        sect_2.style.display = "none";
    } else {
        sect_1.style.display = "none";
        sect_2.style.display = "block";
    }
}

function regLab_create() {
    var tipoPago = $("input:radio[name=lab_TipoPago]:checked").val();
    let medicoTratante = $("#lab_medicoTrtante").val();
    switch (tipoPago) {
        case "1":
            var medioEjec = $("#inp_tipoPago_fac").val();
            break;
        case "2":
            var medioEjec = $("#inp_tipoPago_aut").val();
            break;
        default:
            var medioEjec = "casa blanda";
            break;
    }
    if (medioEjec.length <= 0) {
        notif("4", "Completar Autorizacion o # de facturación");
    } else {
        data = new Object();
        data.a = {
            paciente: idPacienteSelect,
            tipoDePago: tipoPago,
            respaldo: medioEjec,
            medicoTratante: medicoTratante,
        };
        data.b = contLab;
        $.ajax({
            type: "get",
            url: "laboratorio/registerLab",
            data: data,
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                if (response.estR) {
                    notif("1", "Resultado Registrado");
                    $("#inp_tipoPago_fac").val("");
                    $("#md_selectTipoPro").modal("hide");
                    showHistLabPaciente();
                    vistaPdfLab(response.idR);
                } else {
                    notif("2", "Error!. Vuelva a intentarlo");
                }
            },
        });
    }
}

function vistaPdfLab(data) {
    console.log(data);
    // * se procede a abrir modal para imprimir el recetario
    var url = `laboratorio/viewPdfLabPaciente/${data}`;
    $("#linkUrlPdf").attr("src", url);
    $("#loadingAni").show();
    $("#md-form1_vistaReceta").modal("show");
    setTimeout(() => {
        $("#loadingAni").hide();
    }, 1200);
}
