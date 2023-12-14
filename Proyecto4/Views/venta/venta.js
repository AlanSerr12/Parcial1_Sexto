//aqui va a estar el codigo de usuarios.model.js

function init() {
  $("#frm_venta").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
  todos();
});

var todos = () => {
  var html = "";
  $.get("../../Controllers/venta.controller.php?op=todos", (res) => {
    console.log(res);
    res = JSON.parse(res);
    $.each(res, (index, valor) => {
      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.id_producto}</td>
                <td>${valor.Cantidad}</td>
                <td>${valor.Total}</td>
                <td>${valor.Fecha_venta}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.id_venta
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.id_venta
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.id_venta
            })'>Ver</button>
            </td></tr>
                `;
    });
    $("#tabla_venta").html(html);
  });
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_venta")[0]);
  var ruta = "";
  var id_venta = document.getElementById("id_venta").value;
  if (id_venta > 0) {
    ruta = "../../Controllers/venta.controller.php?op=actualizar";
  } else {
    ruta = "../../Controllers/venta.controller.php?op=insertar";
  }
  $.ajax({
    url: ruta,
    type: "POST",
    data: dato,
    contentType: false,
    processData: false,
    success: function (res) {
      res = JSON.parse(res);
      if (res == "ok") {
        Swal.fire("venta", "Registrado con éxito", "success");
        todos();
        limpia_Cajas();
      } else {
        Swal.fire("venta", "Error al guardo, intente mas tarde", "error");
      }
    },
  });
};

var cargaProducto = () => {
  return new Promise((resolve, reject) => {
    $.post("../../Controllers/producto.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      var html = "";
      $.each(res, (index, val) => {
        html += `<option value="${val.id_producto}"> ${val.Nombre}</option>`;
      });
      $("#id_producto").html(html);
      resolve();
    }).fail((error) => {
      reject(error);
    });
  });
};

var editar = async (id_venta) => {
  await cargaProducto();
  $.post(
    "../../Controllers/venta.controller.php?op=uno",
    { id_venta: id_venta },
    (res) => {
      res = JSON.parse(res);

      $("#id_venta").val(res.id_venta);
      $("#id_producto").val(res.id_producto);
      $("#Cantidad").val(res.Cantidad);
      $("#Total").val(res.Total);
      $("#Fecha_venta").val(res.Fecha_venta);

   
    }
  );
  $("#Modal_venta").modal("show");
};

var eliminar = (id_venta) => {
  Swal.fire({
    title: "Venta",
    text: "Esta seguro de eliminar la venta",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/venta.controller.php?op=eliminar",
        { id_venta: id_venta },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("venta", "Venta Eliminada", "success");
            todos();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      );
    }
  });

  limpia_Cajas();
};

var limpia_Cajas = () => {
  document.getElementById("id_venta").value = "";
  document.getElementById("id_producto").value = "";
  document.getElementById("Cantidad").value = "";
  document.getElementById("Total").value = "";
  document.getElementById("Fecha_venta").value = "";
  $("#Modal_venta").modal("hide");
};
init();
