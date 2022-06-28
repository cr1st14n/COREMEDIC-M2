
function showFormSignosVitales() {
    if (idPacienteSelect == null) {
        notif("3", "Seleccione un Paciente");
    } else {
        $("#form_create_signosVitales").trigger("reset");
        $("#md-formSignosVitales").modal("show");
        $("#icmPaciente").html("");
    }
}

function calcularIMC() {
    t = $("#tallaPaciente").val();
    t = t / 100;
    p = $("#pesoPaciente").val();
    if (t >= 0 && p >= 0) {
        imc = Math.round(p / (t * t)).toFixed(2);
        if (imc <= 18.5) {
            $("#icmPaciente").html(`${imc} -> Bajo Peso`);
        }
        if (imc >= 18.5 && imc < 25.0) {
            $("#icmPaciente").html(`${imc} -> Peso Normal`);
        }
        if (imc >= 25.0 && imc < 30.0) {
            $("#icmPaciente").html(`${imc} -> Sobre Peso`);
        }
        if (imc >= 30.0 && imc < 35.0) {
            $("#icmPaciente").html(`${imc} -> Obesidad grado I`);
        }
        if (imc >= 35.0 && imc < 40.0) {
            $("#icmPaciente").html(`${imc} -> Obesidad grado II`);
        }
        if (40.0 < imc) {
            $("#icmPaciente").html(`${imc} -> Obesidad grado III`);
        }
    } else {
        $("#icmPaciente").html("");
    }
}
function calcularIMC1(t, p) {
    t = t / 100;
    if (t >= 0 && p >= 0) {
        imc = Math.round(p / (t * t)).toFixed(2);
        if (imc <= 18.5) {
            return `${imc} -> Bajo Peso`;
        }
        if (imc >= 18.5 && imc < 25.0) {
            return `${imc} -> Peso Normal`;
        }
        if (imc >= 25.0 && imc < 30.0) {
            return `${imc} -> Sobre Peso`;
        }
        if (imc >= 30.0 && imc < 35.0) {
            return `${imc} -> Obesidad grado `;
        }
        if (imc >= 35.0 && imc < 40.0) {
            return `${imc} -> Obesidad grado I`;
        }
        if (40.0 < imc) {
            return `${imc} -> Obesidad grado II`;
        }
    } else {
        return `--`;
    }
}

$("#btn_submitFormCreateSV").click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: `signosVitales/store/${idPacienteSelect}`,
        data: $("#form_create_signosVitales").serialize(),
        success: function (response) {
            console.log(response);
            if (response) {
                $("#form_create_signosVitales").trigger("reset");
                $("#md-formSignosVitales").modal("hide");
                $("#icmPaciente").html("");
                notif("1", "Signos registrados.");
                btn_listSV();
            } else {
                notif("2", "Error Vuelva a intertarlo!.");
            }
        },
    });
});

function btn_listSV() {
    $.ajax({
        type: "get",
        url: "signosVitales/list1",
        data: { paciente: idPacienteSelect },
        // dataType: "dataType",
        success: function (response) {
            console.log(response);
            var html = response
                .map(function (a, b) {
                    var f = new Date(a.created_at);
                    f = f.toLocaleString("es-ES", "dd/mm/yyyy");
                    // console.log(f.format('dd/mm/yyyy'));
                    imp=calcularIMC1(a.sv_ta, a.sv_pe);
                    return (a = `
                    <tr>
                        <td>${f}</td>
                        <td>${a.sv_pa} p.a.</td>
                        <td>${a.sv_fc}</td>
                        <td>${a.sv_fr}</td>
                        <td>${a.sv_st}</td>
                        <td>${a.sv_te} C.</td>
                        <td>${a.sv_pe} Kg.</td>
                        <td>${a.sv_ta} Cm.</td>
                        <td>${imp}</td>
                </tr>
                    `);
                })
                .join(" ");
            $("#table_listSV").html(html);
        },
    });
}
