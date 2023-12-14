<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Ventas</h5>

                <div class="table-responsive">
                    <button type="button" onclick="cargaProducto()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_venta">
                        Nueva Venta
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">id_producto</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Cantidad</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Total</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Fecha_Venta</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_venta">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_venta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_venta">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id_venta" id="id_venta">                  
                    <div class="form-group">
                        <label for="id_producto">Producto</label>
                      <select name="id_producto" id="id_producto" class="form-control">
                        <option value="0">Seleccione un producto</option>
                      </select>
                    </div>

                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="text" required class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad">
                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="text" required class="form-control" id="total" name="total" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="fecha_venta">Fecha de venta</label>
                        <input type="text" required class="form-control" id="fecha_venta" name="fecha_venta" placeholder="Ingrese la fecha">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="venta.js"></script>