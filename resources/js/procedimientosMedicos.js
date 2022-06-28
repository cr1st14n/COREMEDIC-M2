$("#btn-buscarPacientes").click(function (e) {
    e.preventDefault();

    $("#md-searchPacienteDescargo").modal("show");
});

$("#HCLpaciente_promed").keyup(function (e) {
    var hcl = $(this).val();
    if (hcl == "") {
        console.log("sin nuemro");
        $("#resulBusqPacientes").html("");
    } else {
        $.get("/C.S.J.O.bo/api/buscarPacienteHCL/" + hcl + "", function (
            paciente
        ) {
            listPacientes(paciente);

            /*$('#resulBusqPacientes').html("");
              for (var i = 0; i <= paciente.length - 1; i++) {
                  console.log(paciente[i]);
                  var tr = `<tr>
                        <td>`+paciente[i].pa_hcl+`</td>
                        <td>`+paciente[i].pa_ci+`</td>
                        <td>`+paciente[i].pa_nombre+`</td>
                        <td>`+paciente[i].pa_appaterno+` / `+paciente[i].pa_apmaterno+`</td>
                       <td>
                          <span class="tooltip-area">
                          <button name="`+paciente[i].pa_id+`" onclick="rutaAtender(this.name)" class="btn btn-default btn-sm" title="Atender"><i class="fa  fa-plus-square"></i></button>
                          <a name="`+paciente[i].pa_id+`" onclick="rutaprintHCL(this.name)" class="btn btn-default btn-sm" target="_blank" title="Inprimir"><i class="glyphicon glyphicon-print"></i></a>
                          <button name="`+paciente[i].pa_id+`" onclick="rutaEditPaciente(this.name)" class="btn btn-default btn-sm" title="Editar"><i class="fa fa-pencil"></i></i></button>
                          <button name="`+paciente[i].pa_id+`" onclick="rutaDestroyPaHcl(this.name)" class="btn btn-default btn-sm" title="Eliminar"><i class="fa fa-trash-o"></i></button>
                          <button name="`+paciente[i].pa_id+`" onclick="rutaPrestarHCL(`+paciente[i].pa_id+`,`+paciente[i].pa_hcl+`)" class="btn btn-default btn-sm" title="Presatar HCl"><i class="fa fa-puzzle-piece"></i></button>
                          </span>
                      </td>
                  </tr>`;
  
                  $("#resulBusqPacientes").append(tr)
              }*/
        });
    }
});
$("#NOMBRESpaciente_promed").keyup(function (e) {
    var nombres = $(this).val();
    if (nombres == "") {
        console.log("sin letras");
        $("#resulBusqPacientes").html("");
    } else {
        nombres = nombres.replace(/[ ]/gi, "-");
        $.get("/C.S.J.O.bo/api/buscarPacienteNombre/" + nombres + "", function (
            paciente
        ) {
            listPacientes(paciente);
            /*$('#resulBusqPacientes').html("");
              for (var i = paciente.length - 1; i >= 0; i--) {
                  console.log(paciente[i]);
                  var tr = `<tr>
                        <td>`+paciente[i].pa_hcl+`</td>
                        <td>`+paciente[i].pa_ci+`</td>
                        <td>`+paciente[i].pa_nombre+`</td>
                        <td>`+paciente[i].pa_appaterno+` / `+paciente[i].pa_apmaterno+`</td>
                       <td>
                          <span class="tooltip-area">
                          <button name="`+paciente[i].pa_id+`" onclick="rutaAtender(this.name)" class="btn btn-default btn-sm" title="Atender"><i class="fa  fa-plus-square"></i></button>
                          <a name="`+paciente[i].pa_id+`" onclick="rutaprintHCL(this.name)" class="btn btn-default btn-sm" target="_blank" title="Inprimir"><i class="glyphicon glyphicon-print"></i></a>
                          <button name="`+paciente[i].pa_id+`" onclick="rutaEditPaciente(this.name)" class="btn btn-default btn-sm" title="Editar"><i class="fa fa-pencil"></i></i></button>
                          <button name="`+paciente[i].pa_id+`" onclick="rutaDestroyPaHcl(this.name)" class="btn btn-default btn-sm" title="Eliminar"><i class="fa fa-trash-o"></i></button>
                          <button name="`+paciente[i].pa_id+`" onclick="rutaPrestarHCL(`+paciente[i].pa_id+`)" class="btn btn-default btn-sm" title="Prestar HCL"><i class="fa fa-puzzle-piece"></i></button>
                          </span>
                      </td>
                  </tr>`;
  
                  $("#resulBusqPacientes").append(tr)
              }*/
        });
    }
});

function listPacientes(data) {
    var html = data
        .map(function (elem, index) {
            return (r = `<tr>
                      <td>${elem.pa_hcl}</td>
                      <td>${elem.pa_ci}</td>
                      <td>${elem.pa_nombre}</td>
                      <td>${elem.pa_appaterno} / ${elem.pa_apmaterno}</td>
                        <td>
                            <button type="button" title="Descargo quirofano" onClick="showModalCreateDescargo(${elem.pa_id})" class="btn btn-theme-inverse btn-transparent"><i class="glyphicon glyphicon-pencil"></i></button>
                        </td>
                     
                </tr>`);
        })
        .join(" ");
    //   document.getElementById("resulBusqPacientes_proCot").innerHTML = html;
    $("#resulBusqPacientes_promed").html(html);
}
function storePM1(id_dm, id_paciente) {
    console.log(id_dm, id_paciente);
    $.ajax({
        type: "get",
        url: "Descargo/make",
        data: { paciente: id_paciente, tipo: "quirofano" },
        // dataType: "",
        success: function (response) {
            // console.log(response);
            $("#panel1_descargo").html(response);
            $("#panelQuirofano").show();
            $("#panelEndoscopia").hide();
            $("input:text[name=id_desMed_createDesCon]").val(id_dm);
        },
    });
    $("#md-searchPacienteDescargo").modal("hide");
}
function storePM2(id_dm, id_paciente) {
    console.log(id_dm, id_paciente);
    $.ajax({
        type: "get",
        url: "Descargo/make",
        data: { paciente: id_paciente, tipo: "endoscopia" },
        // dataType: "",
        success: function (response) {
            // console.log(response);
            $("#panel1_descargo").html(response);
            $("#panelEndoscopia").show();
            $("#panelQuirofano").hide();
            $("input:text[name=id_desMed_createDesCon]").val(id_dm);
        },
    });
    $("#md-searchPacienteDescargo").modal("hide");
}

$("#btnPru").click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "delete",
        url: "Descargo/desMedCont/" + "88",
        data: { id: "ididid" },
        // dataType: "dataType",
        success: function (response) {
            console.log(response);
        },
    });
});

$("#btn-qui-tipo_1").click(function (e) {
    e.preventDefault();
    $("#form-quirRegisterMed").show();
    $("#form-quirRegisterInsu").hide();
});
$("#btn-qui-tipo_2").click(function (e) {
    e.preventDefault();
    $("#form-quirRegisterInsu").show();
    $("#form-quirRegisterMed").hide();
});
$("#btn-end-tipo_1").click(function (e) {
    e.preventDefault();
    $("#form-endRegisterMed").show();
    $("#form-endRegisterInsu").hide();
});
$("#btn-end-tipo_2").click(function (e) {
    e.preventDefault();
    $("#form-endRegisterInsu").show();
    $("#form-endRegisterMed").hide();
});

function showModalCreateDescargo(paciente) {
    $("#md-searchPacienteDescargo").modal("hide");
    $("#md-createDescargoMedico").modal("show");
    $("#idpacienteCreateDesMed").val(paciente);
}
$("#form_new_descargoMed1").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "Descargo/desMed",
        data: $("#form_new_descargoMed1").serialize(),
        // dataType: "dataType",
        success: function (response) {
            console.log(response);
            if (response == 0) {
                notif("2", "Error.!!!");
            } else {
                if (response["dm_area"] == "Quirofano") {
                    storePM1(response["idDM"], response["idPaciente"]);
                    $("#md-createDescargoMedico").modal("hide");
                }
                if (response["dm_area"] == "Endoscopia") {
                    storePM2(response["idDM"], response["idPaciente"]);
                    $("#md-createDescargoMedico").modal("hide");
                } else {
                    notif("2", "Error. vuelba a intentarlo");
                }
            }
        },
    });
});

$("#form-quirRegisterMed").submit(function (e) {
    e.preventDefault();
    console.log($("#form-quirRegisterMed").serialize());
    $.ajax({
        type: "post",
        url: "Descargo/desMedCont",
        data: $("#form-quirRegisterMed").serialize(),
        // dataType: "dataType",
        success: function (response) {
            descList1(response);
            notif("1", "Item Aregado");
        },
    });
});
$("#form-quirRegisterInsu").submit(function (e) {
    e.preventDefault();

    // console.log($("#form-quirRegisterInsu").serialize());


    // e.preventDefault();
    // console.log($("#form-quirRegisterInsu").serialize());
    $.ajax({
        type: "post",
        url: "Descargo/desMedCont",
        data: $("#form-quirRegisterInsu").serialize(),
        // dataType: "dataType",
        success: function (response) {
            descList2(response);
            notif("1", "Item Aregado");
        },
    });
});
$("#form-endRegisterMed").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "post",
        url: "Descargo/desMedCont",
        data: $("#form-endRegisterMed").serialize(),
        // dataType: "dataType",
        success: function (response) {
            descList1(response);
            notif("1", "Item Aregado");
        },
    });
});
$("#form-endRegisterInsu").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "Descargo/desMedCont",
        data: $("#form-endRegisterInsu").serialize(),
        // dataType: "dataType",
        success: function (response) {
            descList2(response);
            notif("1", "Item Aregado");
        },
    });
});

function descList1(data) {
    console.log(data);
    var html = data
        .map(function (elem, index) {
            return (a = `
            <tr>
                <th>${elem.dmi_nombre}</th>
                <th>${elem.dmc_cantidad}</th>
            </tr>
        `);
        })
        .join(" ");
    $("#desQui_list1").html(html);
}
function descList2(data) {
    console.log(data);
    var html = data
        .map(function (elem, index) {
            return (a = `
            <tr>
                <th>${elem.dmi_nombre}</th>
                <th>${elem.dmc_cantidad}</th>
            </tr>
        `);
        })
        .join(" ");
    $("#desQui_list2").html(html);
}
