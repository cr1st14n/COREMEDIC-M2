var myDropzone = new Dropzone("#subImagen", {
    url: "error",
    headers: {
        "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content"),
    },
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 15, // MB
    accept: function (file, done) {
        a = $("#textrx1").val();
        b = $("#textrx2").val();
        c = $("#textrx3").val();
        if (a.length > 0 && b.length > 0 && b.length > 0) {
            done("");
        } else {
            setTimeout(() => {
                myDropzone.removeFile(file);
            }, 3000);
            notif("2", "Error! ");
            done("Error en llenado de detalle");
        }
    },
    success: function (file, response) {
        console.log(response);
        if (response) {
            notif("1", "Imagen cargada a sistema");
            btn_funlistserRX();
        } else {
        }
    },
});

function showModalRegisterfunlistserRX() {
    if (fun001()) {
        showModalFormRX();
    } else {
        notif("4", "Seleccione un Paciente!");
    }
}

function showModalFormRX() {
    $("#md-formCargaRX").modal("show");
    myDropzone.options.url = "servRX/store/" + idPacienteSelect;
    myDropzone.removeAllFiles(true);
}

// *Funcion de DROOPZONE
function clonar(data, tipo) {
    switch (tipo) {
        case 1:
            $("#textRX1").val(data);
            break;
        case 2:
            $("#textRX2").val(data);
            break;
        case 3:
            $("#textRX3").val(data);
            break;
    }
}

function btn_funlistserRX() {
    console.log("hola");
    $.ajax({
        type: "get",
        url: "servRX/listPaciSerRX",
        data: { paciente: idPacienteSelect },
        // dataType: JSON,
        success: function (response) {
            console.log(response);
            var html = response
                .map(function (index, data) {
                    var f = new Date(index.created_at);
                    f = f.toLocaleString("es-ES", "dd/mm/yyyy");
                    return (a = `
                <tr>
                    <td>${veriNull(index.rx_factura)}</td>
                    <td>${f}</td>
                    <td>${veriNull(index.rx_medicoTratante)}</td>
                    <td>${veriNull(index.rx_descripcion)}</td>
                    <td>
                        <span class="tooltip-area">
                            <button class="btn btn-default btn-sm" title="Edit" onclick="show_modalPlacaRX(${
                                index.id
                            })"><i class="fa fa-eye-slash"></i></button>
                            <button class="btn btn-default btn-sm" title="Edit" onclick="show_modalDeleteRX(${
                                index.id
                            })"><i class="fa fa-eye-slash"></i></button>
                        </span>
                    </td>
                </tr>
                `);
                })
                .join(" ");
            $("#table_listServRX").html(html);
        },
    });
}

function show_modalPlacaRX(id_placaRX) {
    console.log(id_placaRX);
    $("#srcImagenPlacaRX").attr("src", "");
    $("#ex1").zoom(); // add zoom
    $("#ex1").trigger("zoom.destroy"); // remove zoom

    $.ajax({
        type: "get",
        url: "servRX/showPlacaRX",
        data: { id_rx: id_placaRX },
        init: function () {
            return false;
        },
        success: function (response) {
            var url = "/COREMEDIC-M2/" + response.rx_rutaImagen;
            // $("#md_body_show_imagen ").html(html);
            $("#srcImagenPlacaRX").attr("src", url);
            $("#md_body_show_desc").html(response.rx_descripcion);
            console.log(response);
            $("#md-formCarga-imagenRX").modal("show");
            $(document).ready(function () {
                $("#ex1").zoom({
                    magnify: 2.7,
                    on: "click",
                });
            });
        },
    });
}
function show_modalDeleteRX(idPlacaRX) {
    console.log(idPlacaRX);
    $("#md-confEliminacion").modal("show");
    $("#btn_funEliminar").attr("onclick", "deletePlacaRX(" + idPlacaRX + ")");
}
function deletePlacaRX(id) {
    $.ajax({
        type: "post",
        url: "servRX/delete/" + id,
        data: { _token: token },
        // dataType: "dataType",
        success: function (response) {
            console.log(response);
            if (response) {
                notif("3", "Eliminado.!");
                btn_funlistserRX();
                $("#md-confEliminacion").modal("hide");
            } else {
                notif("2", "Error.!");
            }
        },
    });
}

// function () {
//     fetch('https://httpbin.org/post', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded'
//         },
//         body: 'a=1&b=2'
//     })
//     .then(function(response) {
//         console.log('response =', response);
//         return response.json();
//     })
//     .then(function(data) {
//         console.log('data = ', data);
//     })
//     .catch(function(err) {
//         console.error(err);
//     });
//   }
