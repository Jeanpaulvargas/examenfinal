<?php

require '../../modelos/paciente.php';

$_GET['pac_pacienteid'] = filter_var(base64_decode($_GET['pac_pacienteid']), FILTER_SANITIZE_NUMBER_INT);
$paciente = new Paciente();

$pacienteRegistrado = $paciente->buscarId($_GET['pac_pacienteid']);

include_once '../../vistas/templates/header.php'; ?>
<h1 class="text-center">MODIFICAR DE PACIENTE</h1>
<div class="row justify-content-center">
    <form action="../../controladores/pacientes/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="pac_pacienteid" id="pac_pacienteid" class="form-control" required value="<?= $pacienteRegistrado['pac_pacienteid'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_nombre">NOMBRE</label>
                <input type="text" name="pac_nombre" id="pac_nombre" class="form-control" required value="<?= $pacienteRegistrado['pac_nombre'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_apellido">APELLIDO</label>
                <input type="text" name="pac_apellido" id="pac_apellido" class="form-control" required value="<?= $pacienteRegistrado['pac_apellido'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_telefono">TELEFONO</label>
                <input type="text" name="pac_telefono" id="pac_telefono" class="form-control" required value="<?= $pacienteRegistrado['pac_telefono'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_dpi">DPI</label>
                <input type="text" name="pac_dpi" id="pac_dpi" class="form-control" required value="<?= $pacienteRegistrado['pac_dpi'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-warning w-100">Modificar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/pacientes/buscar.php" class="btn btn-secondary w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>