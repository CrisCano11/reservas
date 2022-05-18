alertify.set("notifier", "position", "top-right");
const controller = "Cinicio";


function actualDate() {
  var d = new Date(),
    month = "" + (d.getMonth() + 1),
    day = "" + d.getDate(),
    year = d.getFullYear();

  if (month.length < 2) month = "0" + month;
  if (day.length < 2) day = "0" + day;

  return year + "-" + month + "-" + day;
}

$(document).ready(function () {
  $("#fecha").attr("min", actualDate());
  $("#fecha").change(function actualizarReservas() {
    $("tbody").empty();

    $.ajax({
      url: base_url() + controller + "/consultarReserva",
      type: "POST",
      async: false,
      data: {
        id: $("#fecha").val(),
      },
      success: function (resultado) {
        let consulta = JSON.parse(resultado);
        if (consulta.length > 0) {
          $.each(consulta, function (idx, opt) {
            $("#tbody").append(
              "<tr>" +
                "<td>" +
                opt.motivo +
                "</td>" +
                '<td id="hora_ocupada">' +
                opt.hora_inicial +
                "</td>" +
                "<td>" +
                opt.hora_final +
                "</td>" +
                "<td>" +
                opt.nombre_funcionario +
                "</td>" +
                "</tr>"
            );
          });
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  });

  $("#hora_inicial").change(function () {
    let descripcion = $("#tbody").find("td:nth-child(2)").text();
    if (descripcion.includes($("#hora_inicial").val())) {
      alertify.warning(
        "La hora de inicio no puede ser igual a las horas que ya estan asignadas"
      );
      $("#hora_inicial").focus();
      $("#hora_inicial").addClass("is-invalid");
      $("#hor_ini").append(
        '<span id="span1" style="color: red; font-weight: bold;">Escoja una hora diferente que no este entre la inicial y la final de las reservas</span>'
      );
      return;
    } else {
      $("#hora_inicial").removeClass("is-invalid");
      $("#span1").remove();
    }
  });

  $("#guardar").on("click", function (e) {
    e.preventDefault();
    let data = $("#form").serialize();

    let fecha = document.getElementById("fecha").value;
    if (fecha.length == 0) {
      alertify.error("El campo Fecha es <strong> OBLIGATORIO </strong>");
      $("#fecha").focus();
      $("#fecha").addClass("is-invalid");
      $("#fech").append(
        '<span id="span1" style="color: red; font-weight: bold;">El campo es obligatorio</span>'
      );
      return;
    } else {
      $("#fecha").removeClass("is-invalid");
      $("#span1").remove();
    }

    let hinicial = document.getElementById("hora_inicial").value;
    if (hinicial.length == 0) {
      alertify.error("El campo Hora Inicial es <strong> OBLIGATORIO </strong>");
      $("#hora_inicial").focus();
      $("#hora_inicial").addClass("is-invalid");
      $("#hor_ini").append(
        '<span id="span1" style="color: red; font-weight: bold;">El campo es obligatorio</span>'
      );
      return;
    } else {
      $("#hora_inicial").removeClass("is-invalid");
      $("#span1").remove();
    }

    let hfinal = document.getElementById("hora_final").value;
    if (hfinal.length == 0) {
      alertify.error("El campo Hora Final es <strong> OBLIGATORIO </strong>");
      $("#hora_final").focus();
      $("#hora_final").addClass("is-invalid");
      $("#hor_fin").append(
        '<span id="span1" style="color: red; font-weight: bold;">El campo es obligatorio</span>'
      );
      return;
    } else {
      $("#hora_final").removeClass("is-invalid");
      $("#span1").remove();
    }

    let funcionario = document.getElementById("nombre_funcionario").value;
    if (funcionario.length == 0) {
      alertify.error("El campo Hora Final es <strong> OBLIGATORIO </strong>");
      $("#nombre_funcionario").focus();
      $("#nombre_funcionario").addClass("is-invalid");
      $("#funci").append(
        '<span id="span1" style="color: red; font-weight: bold;">El campo es obligatorio</span>'
      );
      return;
    } else {
      $("#nombre_funcionario").removeClass("is-invalid");
      $("#span1").remove();
    }

    let motivo = document.getElementById("motivo").value;
    if (motivo.length == 0) {
      alertify.error("El campo Hora Final es <strong> OBLIGATORIO </strong>");
      $("#motivo").focus();
      $("#motivo").addClass("is-invalid");
      $("#motiv").append(
        '<span id="span1" style="color: red; font-weight: bold;">El campo es obligatorio</span>'
      );
      return;
    } else {
      $("#motivo").removeClass("is-invalid");
      $("#span1").remove();
    }

    let equipos = document.getElementById("equipos").value;
    if (equipos.length == 0) {
      alertify.error("El campo Hora Final es <strong> OBLIGATORIO </strong>");
      $("#equipos").focus();
      $("#equipos").addClass("is-invalid");
      $("#equip").append(
        '<span id="span1" style="color: red; font-weight: bold;">El campo es obligatorio</span>'
      );
      return;
    } else {
      $("#equipos").removeClass("is-invalid");
      $("#span1").remove();
    }

    $.ajax({
      url: base_url() + controller + "/guardarReserva",
      type: "POST",
      async: false,
      data: data,
      success: function (data) {
        let dato = JSON.parse(data);
        $("#guardar").text("Enviando...");
        $("#overlay").css("display", "block");

        setTimeout(function () {
          if (dato.success == true) {
            alertify.success(dato.message);
            $("#form")[0].reset();
            $("#guardar").text("Guardar");
            $("#overlay").css("display", "none");
          } else {
            alertify.error("Error al guardar la reserva intentelo de nuevo");
          }
        }, 3000);
      },
      error: function (error) {
        let errorBD = String(error.responseText);
        let palabra = "Duplicate entry";
        let resumerror = errorBD.includes(palabra);
        if (resumerror) {
          alertify.warning(
            "La hora que intenta escoger ya se encuentra ocupada. <br> <strong>intente con otra</strong> "
          );
        } else {
          alertify.error(
            "No se ha podido procesar la información, comuniquese con el administrador del sistema"
          );
        }
        return false;
      },
    });
  });
});
