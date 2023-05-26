(function () {
  //---------- Insertar nuevo registro ZONA AREA ----------
  if (document.querySelector("#formulario")) {
    let frm = document.querySelector("#formulario");
    frm.onsubmit = function (e) {
      e.preventDefault();

      try {
        const data = new FormData(frm);

        $.ajax({
          url: "./mantenedor/insertarZona.php",
          type: "POST",
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
          error: function (error) {
            console.log("Ocurrió un error: " + error);
          },
        });
      } catch (error) {
        console.log("Ocurrió un error: " + error);
      }
      reset();
    };

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

  //-------- Insertar nuevo registro INFRAESTRUCTURA ACCESORIOS-------

  //Mostrar datos de infraestructura con el codigo de zona-

  // if (document.querySelector("#formularioInfra")) {
  //   let frm = document.querySelector("#formularioInfra");
  //   frm.onsubmit = function (e) {
  //     e.preventDefault();

  //     try {
  //       const data = new FormData(frm);

  //       $.ajax({
  //         url: "./mantenedor/insertarInfra.php",
  //         type: "POST",
  //         data: data,
  //         processData: false,
  //         contentType: false,
  //         success: function (response) {
  //           cargarTabla();

  //           if (response.trim() == "1") {
  //             Swal.fire({
  //               title: "Éxito",
  //               text: "La respuesta fue correcta",
  //               icon: "success",
  //               confirmButtonText: "Aceptar",
  //             });
  //           } else {
  //             Swal.fire({
  //               title: "Error",
  //               text: "La respuesta no fue correcta",
  //               icon: "error",
  //               confirmButtonText: "Aceptar",
  //             });
  //           }
  //         },
  //         error: function (error) {
  //           console.log("Ocurrió un error: " + error);
  //         },
  //       });
  //     } catch (error) {
  //       console.log("Ocurrió un error: " + error);
  //     }
  //     reset();
  //   };

  //   function reset() {
  //     let frm = document.querySelector("#formulario");
  //     frm.reset();
  //   }
  // }

  if (document.querySelector("#formularioInfra")) {
    let frm = document.querySelector("#formularioInfra");

    frm.onsubmit = function (e) {
      e.preventDefault();

      let valorSeleccionado = $("#selectInfra").val(); // Obtener el valor seleccionado

      try {
        const data = new FormData(frm);
        data.append("opcionSeleccionada", valorSeleccionado); // Agregar el valor seleccionado al objeto data

        $.ajax({
          url: "./mantenedor/insertarInfra.php",
          type: "POST",
          data: data,
          processData: false,
          contentType: false,
          success: function (response) {
            cargarTablaInfra();

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
          error: function (error) {
            console.log("Ocurrió un error: " + error);
          },
        });
      } catch (error) {
        console.log("Ocurrió un error: " + error);
      }
      reset();
    };

    function reset() {
      let frm = document.querySelector("#formularioInfra");
      frm.reset();
    }
  }

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
