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

  //-------- Insertar nuevo registro INFRAESTRUCTURA ACCESORIOS-------
  if (document.querySelector("#formularioInfra")) {
    let frm = document.querySelector("#formularioInfra");
    frm.onsubmit = function (e) {
      e.preventDefault();
      fntGuardarInfra();
      resetInfra();
    };

    async function fntGuardarInfra() {
      try {
        const data = new FormData(frm);
        let res = await fetch("./mantenedor/insertarInfra.php", {
          method: "POST",
          body: data,
        });

        let responseContent = await res.text();
        // console.log(responseContent);
        cargarTablaInfra();

        if (responseContent.trim() === "1") {
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

    function resetInfra() {
      let frm = document.querySelector("#formularioInfra");
      frm.reset();
    }
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
