
$("#nombre_registro").change(function () {

  var nombre = $("#nombre_registro").val();
  var datos = new FormData();
  datos.append("nombre", nombre)

  $.ajax({
    url: "ajax/ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    before: function () {

    },
    success: function (respuesta) {
      console.log(respuesta);
      if (respuesta == 1) {
        $("#nombre_registro").val("");
        $("#nombre_registro").select();
        document.querySelector("div[for='mensaje_error']").innerHTML = "El nombre de usuario ya existe";
      } else {
        document.querySelector("div[for='mensaje_error']").innerHTML = "";
      }
    },
    error: function (err) {
      console.log("Ocurrio un error: " + err);
    },
    complete: function () {

    }
  });
});

$("#email_unico").change(function () {

  var email = $("#email_unico").val();
  var data = new FormData();
  data.append("email", email)

  $.ajax({
    url: "ajax/ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    before: function () {

    },
    success: function (respuesta) {
      console.log(respuesta);
      if (respuesta == 1) {
        $("#email_unico").val("");
        $("#email_unico").select();
        document.querySelector("div[for='mensaje_error']").innerHTML = "El email de usuario ya existe";
      } else {
        document.querySelector("div[for='mensaje_error']").innerHTML = "";
      }
    },
    error: function (err) {
      console.log("Ocurrio un error: " + err);
    },
    complete: function () {

    }
  });
});



$("#editar_nombre").change(function () {

  var editar = $("#editar_nombre").val();
  var dat = new FormData();
  dat.append("nombre", editar)

  $.ajax({
    url: "ajax/ajax.php",
    method: "POST",
    data: dat,
    cache: false,
    contentType: false,
    processData: false,
    before: function () {

    },
    success: function (respuesta) {
      console.log(respuesta);
      if (respuesta == 1) {
        $("#editar_nombre").val("");
        $("#editar_nombre").select();
        document.querySelector("div[for='mensaje_error_nombre']").innerHTML = "El nombre  de usuario ya existe";
      } else {
        document.querySelector("div[for='mensaje_error']").innerHTML = "";
      }
    },
    error: function (err) {
      console.log("Ocurrio un error: " + err);
    },
    complete: function () {

    }
  });
});






$("#editar_email").change(function () {

  var edi = $("#editar_email").val();
  var da = new FormData();
  da.append("email", edi)

  $.ajax({
    url: "ajax/ajax.php",
    method: "POST",
    data: da,
    cache: false,
    contentType: false,
    processData: false,
    before: function () {

    },
    success: function (respuesta) {
      console.log(respuesta);
      if (respuesta == 1) {
        $("#editar_email").val("");
        $("#editar_email").select();
        document.querySelector("div[for='mensaje_error_email']").innerHTML = "El email de usuario ya existe";
      } else {
        document.querySelector("div[for='mensaje_error']").innerHTML = "";
      }
    },
    error: function (err) {
      console.log("Ocurrio un error: " + err);
    },
    complete: function () {

    }
  });
});


function subir_archivo() {

  var input_file = $("#archivo")[0];

  var file = input_file.files[0];

  if ((typeof file === "object") && (file != null)) {



    var dataa = new FormData();

    dataa.append("file", file);



    $.ajax({

      url: "ajax/ajax.php",

      method: "POST",

      data: dataa,

      cache: false,

      contentType: false,

      processData: false,



      before: function () {

        console.log("Subiendo Archivo");

      },

      success: function (respuesta) {

        console.log(respuesta);

        if (respuesta == "300") {

          console.log("Archivo no permitido");

        } else if (respuesta == "301") {

          console.log("Archivo muy grande")

        } else if (respuesta == "302") {

          console.log("Fallo subir el archivo")

        } else if (respuesta == "303") {

          console.log("Archivo Vacio")

        } else {



        }

      },

      error: function (err) {

        console.log("Ocurrio un error: " + err);

      },

      complete: function () {

        console.log("Archivo Subido")

      }

    });

  }

}


$(document).ready(function () {

  $('#buscador').focus();

  $('.form').hide();



  $('#buscador').on('keyup', function () {

    if ($('#buscador').val()) {

      var buscar = $('#buscador').val();

       console.log(buscar);

      $.ajax({

        url: 'ajax/ajax.php',

        type: 'POST',

        data: { buscar },

        success: function (response) {

          let vehiculos = JSON.parse(response);

          let vista = '';

           console.log(vehiculos);

          vehiculos.forEach(vehiculo => {

            vista += `
            <table class="table table-striped">
            <thead>
              <tr>
                <th> Vehiculo </th>
                <th> Mantenimientos </th>
                <th> Llantas </th>
                <th> Repuestos </th>
                <th> Taller </th>
                <th> Marchamo </th>
                <th> Riteve </th>
              </tr>
            </thead>
            <tbody>
            <tr>
            <td>  ${vehiculo.vehiculo}  </td>
            <td>  ${vehiculo.mantenimientos}  </td>
            <td>  ${vehiculo.llantas}  </td>
            <td>  ${vehiculo.repuestos} </td>
            <td>  ${vehiculo.taller}  </td>
            <td>  ${vehiculo.marchamo}  </td>
            <td>  ${vehiculo.riteve}  </td>
            <td>
               <a href="editar&idEditarVehiculo=' . $value["id"] . '">
               <button type="button" class="btn btn-danger">
               <i class="fas fa-marker"></i>
               </button>
               </a>
            </td>
            <td>
                <a href="informacion_vehiculos&idBorrar=' . $value["id"] . '">
                <button type="button" class="btn btn-warning">
                <i class="fas fa-eraser"></i>
                </button>
                </a>
            </td>
            </tr>
            </tbody>
          </table>
          `;

          })
          $('#datos').html(vista);

          $('.form').show();

          $('.forma').hide();
        }
      })

    } else {

      $('.forma').show();

      $('.form').hide();

    }
  })
})

