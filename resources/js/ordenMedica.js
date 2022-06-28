function btn_listOrden(param) {
    $.ajax({
        type: "get",
        url: "/COREMEDIC-M2/ordenMedica/list_1",
        data: { paciente: idPacienteSelect },
        // dataType: "dataType",
        success: function (response) {
            console.log(response);
            var html = response
                .map(function (a, b) {
                    var f = new Date(a.created_at);
                    f = f.toLocaleString("es-ES", "dd/mm/yyyy");
                    // console.log(f.format('dd/mm/yyyy'));
                    return (a = `
                    <tr>
                        <td>${f}</td>
                        <td>${a.usu_nombre} ${a.usu_appaterno}</td>
                        <td>
                            <span class="tooltip-area">
                                <button class="btn btn-default btn-sm" title="Edit" onclick="show_modalOrMed(${a.id})"><i class="fa fa-eye-slash"></i></button>
                            </span>
                        </td>
                </tr>
                    `);
                })
                .join(" ");
            $("#table_listOM").html(html);
        },
    });
}

function showFormOrdenMedica() {
    if (idPacienteSelect == null) {
        notif("3", "Seleccione un Paciente");
    } else {
        $("#form_create_ordenMedica").trigger("reset");
        $("#md-formOrdenMedica").modal("show");
        initSample();
    }
}
$("#btn_registrarOrdenMedica").click(function (e) {
    e.preventDefault();
    var editor2 = CKEDITOR.instances["editor"].getData();
    console.log(editor2);
    $.ajax({
        type: "post",
        url: "/COREMEDIC-M2/ordenMedica/store_1",
        data: {
            _token: $("meta[name=csrf-token]").attr("content"),
            data: editor2,
            paci: idPacienteSelect,
            diag:$('#inp_oredenM_diag').val(),
        },
        success: function (response) {
            console.log(response);
            if (response == "1") {
                notif("1", "Restrado");
                $("#md-formOrdenMedica").modal("hide");
                CKEDITOR.instances["editor"].setData('')
            } else {
                notif("2", "Error");
            }
        },
    });
});

function show_modalOrMed(id) { 
    $('#md-mod_ordenMedica_PDF').modal('show');
    var url = `/COREMEDIC-M2/ordenMedica/showPDF/${id}`;

    $("#linkUrlPdf_ordenMedica").attr("src", url);
    setTimeout(() => {
        $("#loadingAni").hide();
    }, 1200);
    if ($("#linkUrlPdf_ordenMedica").attr("src") == "") {
        console.log("esta vacio");
    }
 }
