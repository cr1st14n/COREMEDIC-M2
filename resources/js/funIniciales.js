// * variables iniciales
let idPacienteSelect;
let token = $("meta[name=csrf-token]").attr("content");

function notif(tipo, texto) {
    var data = new Array();
    switch (tipo) {
        case "1":
            // data.verticalEdge='right';
            // data.horizontalEdge='top';
            data.life = 3000;
            data.theme = "theme-inverse";
            $.notific8(texto, data);
            break;
        case "2":
            data.life = 3000;
            data.theme = "danger";
            $.notific8(texto, data);
            break;
        case "3":
            data.life = 3000;
            data.theme = "primary";
            $.notific8(texto, data);
            break;
        case "4":
            data.life = 5000;
            data.theme = "inverse";
            $.notific8(texto, data);
            break;
        case "5":
            data.life = 3000;
            $.notific8(texto, data);
            break;
    }
}
function veriNull(texto) {
    if (texto == null || texto.length == 0) {
        return "--";
    } else {
        return texto;
    }
}
function validar(id) {
    var elemento = document.getElementById(id);
    if (elemento.length != 0) {
        if (elemento.checkValidity()) {
            elemento.style.borderColor = "";
            elemento.style.backgroundColor = "";
        } else if (elemento.value == "") {
            elemento.style.borderColor = "";
            elemento.style.backgroundColor = "";
        } else {
            elemento.style.borderColor = "red";
            elemento.style.backgroundColor = "#ffd3d3";
        }
    }
}

// * verificar que se tenga un paciente seleccionado
function fun001() {
    if (idPacienteSelect != null) {
        return 1;
    } else {
        return 0;
    }
}
// * ANIMACION DE CARGA

html_ani_carga = `
    <div class="contenedor">
        <span class="char1">C</span>
        <span class="char2">A</span>
        <span class="char3">R</span>
        <span class="char4">G</span>
        <span class="char5">A</span>
        <span class="char6">N</span>
        <span class="char7">D</span>
        <span class="char8">O</span>
    </div>
    <div class="carga">
        <div class="barra"></div>
    </div>
`;

$("#btn_showPerfinUser").click(function (e) {
    e.preventDefault();



	$.get('/COREMEDIC-M2/user/editUsu/', function(data) {
		console.log(data);
		$('#createUserCiUp').val(data.usu_ci);
		$('#nombreUp').val(data.usu_nombre);
		$('#apellido1Up').val(data.usu_appaterno);
		$('#apellido2Up').val(data.usu_apmaterno);
		//  document.querySelector('input[name=sexo]:checked').value; 
		 if (data.usu_sexo == 'masculino') {
			document.getElementById('sexo1Up').checked = true;
			
		} else {
			document.getElementById('sexo2Up').checked = true;
		}
		$('#fechaNacimientoUp').val(data.usu_fechnac);
		$('#paisNacimientoUp').val(data.usu_paisnac);
		$('#depNacimientoUp').val(data.usu_depnac);
		$('#tipoSangreUp').val(data.usu_tipoSangre); 
		$('#estadoCivilUp').val(data.usu_estadocivil); 
		$('#telfUp').val(data.usu_telf), $('#telfRefUp').val(data.usu_telfref); 
		$('#zonaUp').val(data.usu_zona), $('#domicilioUp').val(data.usu_domicilio); 
		$('#zonaSufragioUp').val(data.usu_zonaSufragio);
		$('#emailUp').val(data.email);
	});
	$('#md-editDatUser').modal('show');
    $("#md-perfilUsuario").modal("show");
});
$("#form_updateKey").submit(function (e) {
    e.preventDefault();
    console.log($(this).serialize());

    $.ajax({
        type: "post",
        url: "/COREMEDIC-M2/user/updatePass",
        data: $(this).serialize(),
        success: function (response) {
            if (response) {
                notif("1", "Contraseña Actualizada");
                $("#md-perfilUsuario_pass").modal("hide");
                $('#form_updateKey').trigger('reset');
            } else {
                notif("2", "Error!");
            }
        },
    });
});
$("#form_updateUser").submit(function (e) {
    e.preventDefault();
    console.log($(this).serialize());

    $.ajax({
        type: "post",
        url: "/COREMEDIC-M2/user/updateUsu",
        data: $(this).serialize(),
        success: function (response) {
            console.log(response);

            if (response ==true) {
                console.log(response==true);
                notif("1", "Datos Actualizados");
                $("#md-perfilUsuario").modal("hide");
                $('#form_updateKey').trigger('reset');
            } else if (response=='2') {
                notif("4", "C.I. ya registrada!");
            }else {
                notif("2", "Error!");
            }
        },
    });
});
$('#btn_showEditPass').click(function (e) { 
    e.preventDefault();
    $('#md-perfilUsuario_pass').modal('show');
});
