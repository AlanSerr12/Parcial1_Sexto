//aqui va a estar el codigo de usuarios.model.js

function init(){
    $("#frm_producto").on("submit", function(e){
        guardaryeditar(e);
    });
}


$().ready(()=>{
    todos();
});

var todos = () =>{
    var html = "";
    $.get("../../Controllers/producto.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      $.each(res, (index, valor) => {
       
        html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.Nombre}</td>
                <td>${valor.Precio}</td>
                <td>${valor.Stock}</td>
                <td>${valor.Proveedor}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.id_producto
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.id_producto
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.id_producto
            })'>Ver</button>
            </td></tr>
                `;
      });
      $("#tabla_producto").html(html);
    });
  };

  var guardaryeditar=(e)=>{
    e.preventDefault();
    var dato = new FormData($("#frm_producto")[0]);
    var ruta = '';
    var id_producto = document.getElementById("id_producto").value
    if(id_producto > 0){
     ruta = "../../Controllers/producto.controller.php?op=actualizar"
    }else{
        ruta = "../../Controllers/producto.controller.php?op=insertar"
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
            Swal.fire("Producto", "Registrado con éxito" , "success");
            todos();
            limpia_Cajas();
          } else {
            Swal.fire("Producto", "Error al guardo, intente mas tarde", "error");
          }
        },
      });
  }

  var editar = (id_producto)=>{
  
    $.post(
      "../../Controllers/producto.controller.php?op=uno",
      { id_producto: id_producto },
      (res) => {
        res = JSON.parse(res);
        $("#id_producto").val(res.id_producto);
        $("#Nombre").val(res.Nombre);
        $("#Precio").val(res.Precio);
        $("#Stock").val(res.Stock);
        $("#Proveedor").val(res.Proveedor);
    
      }
    );
    $("#Modal_Producto").modal("show");
    
  }


  var eliminar = (id_producto)=>{
    Swal.fire({
        title: "Producto",
        text: "Esta seguro de eliminar el producto",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Eliminar",
      }).then((result) => {
        if (result.isConfirmed) {
          $.post(
            "../../Controllers/producto.controller.php?op=eliminar",
            { id_producto: id_producto },
            (res) => {
              res = JSON.parse(res);
              if (res === "ok") {
                Swal.fire("Producto", "Producto Eliminado", "success");
                todos();
              } else {
                Swal.fire("Error", res, "error");
              }
            }
          );
        }
      });
  
      limpia_Cajas();
}
  
  var limpia_Cajas = ()=>{
    document.getElementById("id_producto").value = "";
    document.getElementById("Nombre").value = "";
    document.getElementById("Precio").value = "";
    document.getElementById("Stock").value = "";
    document.getElementById("Proveedor").value = "";
    $("#Modal_Producto").modal("hide");
  
  }

  var ver = (id_producto) => {
  
    document.getElementById("id_producto").value = id_producto;   
}
  init();