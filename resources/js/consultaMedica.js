$("#form_registrarConsulta").submit(function (e) {
    e.preventDefault();
    var list = $("#form_registrarConsulta").serialize();
    list = $(this).serialize();
    createConsulMedica(list);
});

function createConsulMedica(paramentros) {
    $.ajax({
        type: "post",
        url: "consultaMedica/create/" + idPacienteSelect,
        data: paramentros,
        // dataType: "dataType",
        success: function (response) {
            if (response) {
                notif("1", "Agregado Correctamente");
                $("#md-atencion_consultaExterna").modal("hide");
                $("#form_registrarConsulta").trigger("reset");
            } else {
                notif("2", "Error!. Vulva a intentarlo");
            }
        },
    });
}
function btn_listConsultasMedicas() {
    $.ajax({
        type: "get",
        url: "consultaMedica/show/" + idPacienteSelect,
        //   data: "data",
        //   dataType: "dataType",
        success: function (response) {
            listconsulmedic1(response);
        },
    });
}

function listconsulmedic1(data) {
    var html = data
        .map(function (i) {
            var f = new Date(i.created_at);
            f = f.toLocaleString("es-ES", "dd/mm/yyyy");
            return (a = `
        <tr>
            <td>${f}</td>
            <td>${i.cc_motivo}</td>
            <td>${i.cc_diagnostico}</td>
            <td>${i.ca_usu_cod}</td>
            <td>
                <span class="tooltip-area">
                    <a href="javascript:void(0)" onclick="showConsulMedica(${i.id})" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-book"></i></a>
                </span>
            </td>
        </tr>
      `);
        })
        .join();
    $("#listConsultasMedicas").html(html);
}

function showConsulMedica(id) {
    $.ajax({
        type: "get",
        url: "consultaMedica/showdatos/" + id,
        // data: "data",
        // dataType: "dataType",
        success: function (response) {
            var html = `
            <ul class="list-group">
                <div class="col-lg-6">
                    <li class="list-group-item">
                        <label for="">Motivo de la consulta:</label>
                        <h4>${response.a.cc_motivo}</h4>
                    </li>
                    <li class="list-group-item">
                        <label for="">Examen Fisico:</label>
                        <h4>${response.b.examenFisico}</h4>
                    </li>
                    <li class="list-group-item">
                        <label for="">Diagnostico:</label>
                        <h4>${response.a.cc_diagnostico}</h4>
                    </li>
                    <li class="list-group-item">
                        <label for="">Tramamiento:</label>
                        <h4>${response.b.tratamiento}</h4>
                    </li>
                </div>
                <div class="col-lg-6">
                    <li class="list-group-item">
                        <label for="">Curaciones o Suturas:</label>
                        <h4>${response.b.curacionSuturas}</h4>
                    </li>
                    <li class="list-group-item">
                        <label for="">Otras Actividades:</label>
                        <h4>${response.b.otros}</h4>
                    </li>
                </div>
            </ul>
            `;

            
            $("#bodyDetalleConsulta").html(html);
            $("#md-detalleContulstaClinica").modal("show");
        },
    });
}
