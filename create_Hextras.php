<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $idAsignacion_Horas_Extras = isset($_POST['idAsignacion_Horas_Extras']) && !empty($_POST['idAsignacion_Horas_Extras']) && $_POST['idAsignacion_Horas_Extras'] != 'auto' ? $_POST['idAsignacion_Horas_Extras'] : NULL;
    // Check if POST variable "asignacion" exists, if not default the value to blank, basically the same for all variables
    $asignacion = isset($_POST['asignacion']) ? $_POST['asignacion'] : '';
    $tiempo_descanso = isset($_POST['tiempo_descanso']) ? $_POST['tiempo_descanso'] : '';
    $motivo = isset($_POST['motivo']) ? $_POST['motivo'] : '';
    $idEmpleados = isset($_POST['idEmpleados']) ? $_POST['idEmpleados'] : '';
    $idHorario = isset($_POST['idHorario']) ? $_POST['idHorario'] : '';
    $dia = isset($_POST['dia']) ? $_POST['dia'] : date("d/m/Y H:i:s");
    // Insert new record into the asignacion_horas_extras table
    $stmt = $pdo->prepare('INSERT INTO asignacion_horas_extras VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$idAsignacion_Horas_Extras, $asignacion, $tiempo_descanso, $motivo, $idEmpleados, $idHorario, $dia]);
    // Output message
    $msg = 'Creado exitosamente!';
    
}
?>

<?= template_header('Create') ?>

<div class="content update">
    <h2>Horas extras</h2>
    <form action="create.php" method="post">
        <label for="idAsignacion_Horas_Extras">idAsignacion_Horas_Extras</label>
        <label for="asignacion">Hora de inicio</label>
        <input type="text" name="idAsignacion_Horas_Extras" placeholder="26" value="Auto" id="idAsignacion_Horas_Extras" readonly>
        <input type="time" name="asignacion" placeholder="Cardo Dalisay" id="asignacion" required>
        <label for="tiempo_descanso">Tiempo de	descanso</label>
        <label for="motivo">Hora de salida</label>
        <input type="time" name="tiempo_descanso" id="tiempo_descanso" required>
        <input type="time" name="motivo"  id="motivo" required>
        <label for="idEmpleados"></label>
        <label for="dia"></label>

        <label for="idEmpleados" >Dias libres:</label >
        <select name="idEmpleados" id="idEmpleados" required>
            <option value="" disabled selected>Dia libre 1</option>
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miercoles">Miercoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            <option value="Sabado">Sabado</option>
            <option value="Domingo">Domingo</option>
        </select>        
        <select name="idHorario" id="idHorario" required>
            <option value="" disabled selected>Dia libre 2</option>
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miercoles">Miercoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            <option value="Sabado">Sabado</option>
            <option value="Domingo">Domingo</option>
        </select>
        <label for="dia" >Fecha de Creacion</label>
        <label for="dia"></label>
        <input type="datetime-local" name="dia" value="<?= date("d/m/Y H:i:s") ?>" id="dia" required>

<label for=""></label>
        <input type="submit" value="Crear Horas Extras">
    </form>
    <?php if ($msg) : ?>
        <p><?= $msg ?></p>
    <?php endif; ?>
</div>


<?= template_footer() ?>