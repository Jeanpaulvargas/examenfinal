<?php

require '../../modelos/paciente.php';

// $nit = $_POST['pac_dpi'];
// $telefono = $_POST['pac_telefono'];

// VALIDAR INFORMACION
$_POST['pac_nombre'] = htmlspecialchars($_POST['pac_nombre']);
$_POST['pac_apellido'] = htmlspecialchars($_POST['pac_apellido']);
$_POST['pac_dpi'] = htmlspecialchars($_POST['pac_dpi']);
$_POST['pac_telefono'] = htmlspecialchars($_POST['pac_telefono']);

if ($_POST['pac_nombre'] == '' || $_POST['pac_apellido'] == '' || $_POST['pac_dpi'] < 0 || $_POST['pac_telefono'] < 0) {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $pacientes = new paciente($_POST);
        $guardar = $pacientes->guardar();
        $resultado = [
            'mensaje' => 'PACIENTE INSERTADO CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR INSERTANDO A LA BD',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }
}


$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= $resultado['detalle'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/paciente/index.php" class="btn btn-primary w-100">Volver al formulario</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>