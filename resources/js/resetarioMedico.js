let Receta = [];
// $('#btn-addMedicamento').on("click",addMedicamento);
$("#form-createRecetario").submit(function (e) {
    e.preventDefault();
    addMedicamento();
});
$("#refreshRecetario").on("click", refreshRecetario);
$("#form_resetarioMedico").click(function (e) {
    e.preventDefault();
    if ($("#paciente_id_HCL").val() == null) {
        $.notific8("Seleccione Paciente!.", {
            life: "3000",
            theme: "primary",
        });
    } else {
        $("#id_paciente_new_cotizacion").val($("#paciente_id_HCL").val());
        $("#md-form1_recetario").modal("show");
    }
});
function showFormRcetario() {
    if ($("#paciente_id_HCL").val() == null) {
        $.notific8("Seleccione Paciente!.", {
            life: "3000",
            theme: "primary",
        });
    } else {
        $("#id_paciente_new_cotizacion").val($("#paciente_id_HCL").val());
        $("#md-form1_recetario").modal("show");
    }
}
function addMedicamento() {
    if ($("#c_medi").val() == "") {
        notif("2", "Error! Seleccione Medicamento");
    } else {
        var medicamentos = {
            a: $("#c_medi").val(),
            b: $("#c_forma").val(),
            c: $("#c_via").val(),
            d: $("#c_dosis").val(),
            e: $("#c_medi_cant").val(),
        };
        Receta.push(medicamentos);
        listRecetario();
        $("#c_medi").focus();
    }
}
function listRecetario() {
    const html = Receta.map(
        (e, i) =>
            (variable = `
                <tr>
                    <td>${e.a}</td>
                    <td>${e.b} </td>
                    <td>${e.c} </td>
                    <td>${e.e} </td>
                    <td>${e.d} </td>
                    <td>
                        <button class="btn btn-danger" onclick="listReceMedicDelete(${i})"> <i class="fa fa-ban"></i></button>
                    </td>
                <tr>    
                `)
    ).join(" ");
    $("#tableBodilistMedicamentos").html(html);
}

function refreshRecetario() {
    $("#c_medi").val("");
    $("#form-createRecetario").trigger("reset");
    Receta = [];
    listRecetario();
}
function listReceMedicDelete(dit) {
    Receta.splice(dit, 1);
    listRecetario();
}

function registerReceta(tipo) {
    $("#paciente_id_HCL").val();
    if (Receta == "") {
        console.log("no hay regsiros");
    } else {
        $.ajax({
            type: "POST",
            url: "recetarioM/create",
            data: {
                _token: $("meta[name=csrf-token]").attr("content"),
                paciente: $("#paciente_id_HCL").val(),
                detalleRecete: $("#c_otroTra").val(),
                data: Receta,
            },
            // dataType: "dataType",
            success: function (response) {
                if (response.a == 0) {
                    notif(2, "Error!, Vuelva a intentarlo");
                } else {
                    posCreate(tipo, response);
                }
            },
        });
    }
}

function posCreate(tipo, response) {
    notif("1", "Registrado.");
    refreshRecetario();
    $("#md-form1_recetario").modal("hide");
    $("#linkUrlPdf").attr("src", "");
    if (tipo == 2) {
        console.log(response.b);
        // * se procede a abrir modal para imprimir el recetario
        var url = `recetarioM/pdf_recetamedica/${response.b}`;
        $("#linkUrlPdf").attr("src", url);
        $("#md-form1_vistaReceta").modal("show");
    }
}

function showHCL2(id) {
    $("#loadingAni").show();
    $("#md-form1_vistaReceta").modal("show");
    var url = `recetarioM/pdf_recetamedica/${id}`;
    $("#linkUrlPdf").attr("src", url);
    setTimeout(() => {
        $("#loadingAni").hide();
    }, 1200);
    if ($("#linkUrlPdf").attr("src") == "") {
        console.log("esta vacio");
    }
}

$("#btn_showFormConsulta").click(function (e) {
    e.preventDefault();
});

setTimeout(() => {
    console.log("hola mundo");
}, 5000);
