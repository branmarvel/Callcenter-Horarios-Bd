<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $idHorario = isset($_POST['idHorario']) && !empty($_POST['idHorario']) && $_POST['idHorario'] != 'auto' ? $_POST['idHorario'] : NULL;
    // Check if POST variable "hora_inicio" exists, if not default the value to blank, basically the same for all variables
    $hora_inicio = isset($_POST['hora_inicio']) ? $_POST['hora_inicio'] : '';
    $tiempo_descanso = isset($_POST['tiempo_descanso']) ? $_POST['tiempo_descanso'] : '';
    $hora_final = isset($_POST['hora_final']) ? $_POST['hora_final'] : '';
    $dia_libre_1 = isset($_POST['dia_libre_1']) ? $_POST['dia_libre_1'] : '';
    $dia_libre_2 = isset($_POST['dia_libre_2']) ? $_POST['dia_libre_2'] : '';
    $fecha_reg = isset($_POST['fecha_reg']) ? $_POST['fecha_reg'] : date("d/m/Y H:i:s");
    // Insert new record into the horario table
    $stmt = $pdo->prepare('INSERT INTO horario VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$idHorario, $hora_inicio, $tiempo_descanso, $hora_final, $dia_libre_1, $dia_libre_2, $fecha_reg]);
    // Output message
    $msg = 'Creado exitosamente!';
    
}
?>

<?= template_header('Create') ?>

<div class="content update">
    <h2>Crear Horario</h2>
    <form action="create.php" method="post">
        <label for="idHorario">idHorario</label>
        <label for="hora_inicio">Hora de inicio</label>
        <input type="text" name="idHorario" placeholder="26" value="Auto" id="idHorario" readonly>
        <input type="time" name="hora_inicio" placeholder="Cardo Dalisay" id="hora_inicio" required>
        <label for="tiempo_descanso">Tiempo de	descanso</label>
        <label for="hora_final">Hora de salida</label>
        <input type="time" name="tiempo_descanso" id="tiempo_descanso" required>
        <input type="time" name="hora_final"  id="hora_final" required>
        <label for="dia_libre_1"></label>
        <label for="fecha_reg"></label>

        <label for="dia_libre_1" >Dias libres:</label >
        <select name="dia_libre_1" id="dia_libre_1" required>
            <option value="" disabled selected>Dia libre 1</option>
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miercoles">Miercoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            <option value="Sabado">Sabado</option>
            <option value="Domingo">Domingo</option>
        </select>        
        <select name="dia_libre_2" id="dia_libre_2" required>
            <option value="" disabled selected>Dia libre 2</option>
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miercoles">Miercoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            <option value="Sabado">Sabado</option>
            <option value="Domingo">Domingo</option>
        </select>
        <label for="fecha_reg" >Fecha de Creacion</label>
        <label for="fecha_reg"></label>
        <input type="datetime-local" name="fecha_reg" value="<?php echo date('Y-m-d\TH:i:s'); ?>" id="fecha_reg" required readonly>

<label for=""></label>
        <input type="submit" value="Crear horario">
    </form>
    <?php if ($msg) : ?>
        <p><?= $msg ?></p>
    <?php endif; ?>
</div>


<?= template_footer() ?>