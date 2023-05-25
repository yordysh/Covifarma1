(function () {
  //---------- Insertar nuevo registro ZONA AREA ----------
  if (document.querySelector("#formulario")) {
    let frm = document.querySelector("#formulario");
    frm.onsubmit = function (e) {
      e.preventDefault();
      fntGuardar();
      reset();
    };

    async function fntGuardar() {
      try {
        const data = new FormData(frm);
        let res = await fetch("./mantenedor/insertarZona.php", {
          method: "POST",
          body: data,
        });
        // console.log(res);
        cargarTabla();

        let responseContent = await res.text();
        // console.log(responseContent);
        cargarTabla();

        if (responseContent.trim() == "1") {
          Swal.fire({
            title: "Éxito",
            text: "La respuesta fue correcta",
            icon: "success",
            confirmButtonText: "Aceptar",
          });
        } else {
          Swal.fire({
            title: "Error",
            text: "La respuesta no fue correcta",
            icon: "error",
            confirmButtonText: "Aceptar",
          });
        }
      } catch (error) {
        console.log("Ocurrió un error: " + error);
      }
    }

    function reset() {
      let frm = document.querySelector("#formulario");
      frm.reset();
    }
  }

  // Cargar registros ZONA AREA
  $(document).ready(function () {
    // Cargar la tabla al cargar la página
    cargarTabla();
  });
  function cargarTabla() {
    $.ajax({
      url: "mantenedor/tablaZona.php",
      type: "GET",
      success: function (data) {
        $("#tablaAlmacenes").html(data);
      },
      error: function (xhr, status, error) {
        console.error("Error al cargar los datos de la tabla:", error);
      },
    });
  }

  //---------------- Editar ZONA AREA ---------------
//   $(document).ready(function() {
//     $('#tbalmacen').Tabledit({
//         deleteButton: false,
//         editButton: false,
//         columns: {
//             identifier: [0, 'id'],
//             editable: [
//                 [2, 'nombreArea']
//             ]
//         },
//         hideIdentifier: true,
//         url: 'mantenedor/js/mantenedor.js',
//         onSuccess: function(data, textStatus, jqXHR) {
//             if (data.success) {
//                 console.log(data);
//                 Swal.fire('¡Éxito!', 'Se ha editado exitosamente', 'success');
//             }
//         }

//     });
// });



  //-------- Insertar nuevo registro INFRAESTRUCTURA ACCESORIOS-------
  // if (document.querySelector("#formularioInfra")) {
  //   let frm = document.querySelector("#formularioInfra");
  //   frm.onsubmit = function (e) {
  //     e.preventDefault();
  //     fntGuardarInfra();
  //     resetInfra();
  //   };

  //   async function fntGuardarInfra() {
  //     try {
  //       const data = new FormData(frm);
  //       let res = await fetch("./mantenedor/insertarInfra.php", {
  //         method: "POST",
  //         body: data,
  //       });

  //       let responseContent = await res.text();
  //       // console.log(responseContent);
  //       cargarTablaInfra();

  //       if (responseContent.trim() === "1") {
  //         Swal.fire({
  //           title: "Éxito",
  //           text: "La respuesta fue correcta",
  //           icon: "success",
  //           confirmButtonText: "Aceptar",
  //         });
  //       } else {
  //         Swal.fire({
  //           title: "Error",
  //           text: "La respuesta no fue correcta",
  //           icon: "error",
  //           confirmButtonText: "Aceptar",
  //         });
  //       }
  //     } catch (error) {
  //       console.log("Ocurrió un error: " + error);
  //     }
  //   }

  //   function resetInfra() {
  //     let frm = document.querySelector("#formularioInfra");
  //     frm.reset();
  //   }
  // }

  //Mostrar datos de infraestructura con el codigo de zona-

// $(document).ready(function () {
//  cargarSelect();
// });

// function cargarSelect(){
//   $('#selectInfra').change(function() {
//     var valorSeleccionado = $(this).val();
//     console.log(valorSeleccionado);

//     // Enviar el valor seleccionado al servidor utilizando AJAX
//     $.ajax({
//       url: './mantenedor/insertarInfra.php',
//       type: 'POST',
//       data: { opcionSeleccionada: valorSeleccionado },
//       success: function(response) {
//         // Manejar la respuesta del servidor aquí
//         console.log(response);
//       },
//       error: function(xhr, status, error) {
//         // Manejar errores de AJAX aquí
//         console.log(error);
//       }
//     });
//   });
// }
if (document.querySelector("#formularioInfra")) {
  let frm = document.querySelector("#formularioInfra");
  frm.onsubmit = function (e) {
    e.preventDefault();
    fntGuardarInfra();
    sele ();
    reset();
  };

  function fntGuardarInfra() {
    try {
      const data = new FormData(frm);

      $.ajax({
        url: "./mantenedor/insertarInfra.php",
        method: "POST",
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
          cargarTabla();

          if (response.trim() == "1") {
            Swal.fire({
              title: "Éxito",
              text: "La respuesta fue correcta",
              icon: "success",
              confirmButtonText: "Aceptar",
            });
          } else {
            Swal.fire({
              title: "Error",
              text: "La respuesta no fue correcta",
              icon: "error",
              confirmButtonText: "Aceptar",
            });
          }
        },
        error: function (xhr, status, error) {
          console.log("Ocurrió un error: " + error);
        },
      });
    } catch (error) {
      console.log("Ocurrió un error: " + error);
    }
  }

  function reset() {
    let frm = document.querySelector("#formulario");
    frm.reset();
  }
function sele (){  
  $('#selectInfra').change(function() {
  var valorSeleccionado = $(this).val();
  console.log(valorSeleccionado);

  // Enviar el valor seleccionado al servidor utilizando AJAX
  $.ajax({
    url: './mantenedor/insertarInfra.php',
    type: 'POST',
    data: { opcionSeleccionada: valorSeleccionado },
    success: function(response) {
      // Manejar la respuesta del servidor aquí
      console.log(response);
    },
    error: function(xhr, status, error) {
      // Manejar errores de AJAX aquí
      console.log(error);
    }
  });
});}


  cargarTablaInfra();
}




  // Cargar registros INFRAESTRUCTURA ACCESORIOS
  $(document).ready(function () {
    // Cargar la tabla al cargar la página
    cargarTablaInfra();
  });
  function cargarTablaInfra() {
    $.ajax({
      url: "mantenedor/tablaInfraestructura.php",
      type: "GET",
      success: function (data) {
        $("#tablaInfra").html(data);
      },
      error: function (xhr, status, error) {
        console.error("Error al cargar los datos de la tabla:", error);
      },
    });
  }



})();
