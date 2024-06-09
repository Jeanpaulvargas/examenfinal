<?php 
include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center text-primary mb-4">FORMULARIO DE PACIENTES</h1>
<div class="row justify-content-center">
    <form action="../../controladores/pacientes/guardar.php" method="POST" class="border bg-white shadow-sm rounded p-5 col-lg-6">
        <div class="row mb-4">
            <div class="col">
                <label for="pac_nombre" class="form-label text-dark">Nombre</label>
                <input type="text" name="pac_nombre" id="pac_nombre" class="form-control border-primary" required>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="pac_apellido" class="form-label text-dark">Apellido</label>
                <input type="text" name="pac_apellido" id="pac_apellido" class="form-control border-primary" required>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="pac_telefono" class="form-label text-dark">Teléfono</label>
                <input type="number" name="pac_telefono" id="pac_telefono" class="form-control border-primary" required>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="pac_dpi" class="form-label text-dark">DPI</label>
                <input type="number" name="pac_dpi" id="pac_dpi" class="form-control border-primary" required>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <button type="submit" class="btn btn-primary w-100">Guardar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/pacientes/buscar.php" class="btn btn-outline-primary w-100">Buscar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>
