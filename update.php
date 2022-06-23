<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['idHorario'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $idHorario = isset($_POST['idHorario']) ? $_POST['idHorario'] : NULL;
        $hora_inicio = isset($_POST['hora_inicio']) ? $_POST['hora_inicio'] : '';
        $tiempo_descanso = isset($_POST['tiempo_descanso']) ? $_POST['tiempo_descanso'] : '';
        $hora_final = isset($_POST['hora_final']) ? $_POST['hora_final'] : '';
        $dia_libre_1 = isset($_POST['dia_libre_1']) ? $_POST['dia_libre_1'] : '';
        $dia_libre_2 = isset($_POST['dia_libre_2']) ? $_POST['dia_libre_2'] : '';
        $fecha_reg = isset($_POST['fecha_reg']) ? $_POST['fecha_reg'] : date('Y-m-d H:i:s');
        // Update the record
        $stmt = $pdo->prepare('UPDATE horario SET idHorario = ?, hora_inicio = ?, tiempo_descanso = ?, hora_final = ?, dia_libre_1 = ?, dia_libre_2 = ?, fecha_reg = ? WHERE idHorario = ?');
        $stmt->execute([$idHorario, $hora_inicio, $tiempo_descanso, $hora_final, $dia_libre_1,$dia_libre_2, $fecha_reg, $_GET['idHorario']]);
        $msg = 'Actualizado Exitosamente!';
    }
    // Get the contact from the horario table
    $stmt = $pdo->prepare('SELECT * FROM horario WHERE idHorario = ?');
    $stmt->execute([$_GET['idHorario']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that idHorario!');
    }
} else {
    exit('No idHorario specified!');
}
?>

<?=template_header('Read')?>

<div class="content update">
    <h2>Actualizar Horario #<?=$contact['idHorario']?></h2>
    <form action="update.php?idHorario=<?=$contact['idHorario']?>" method="post">
        <label for="idHorario">idHorario</label>
        <label for="hora_inicio">Hora de inicio</label>
        <input type="text" name="idHorario" placeholder="1" value="<?=$contact['idHorario']?>" id="id" readonly>
        <input type="time" name="hora_inicio"  value="<?=$contact['hora_inicio']?>" id="hora_inicio" required>
        <label for="tiempo_descanso">Tiempo de	descanso</label>
        <label for="hora_final">Hora de salida</label>
        <input type="time" name="tiempo_descanso"  value="<?=$contact['tiempo_descanso']?>" id="tiempo_descanso" required>
        <input type="time" name="hora_final" placeholder="2025550143" value="<?=$contact['hora_final']?>" id="hora_final" required>

        <label for="dia_libre_1"></label>
        <label for="fecha_reg"></label>

        <label for="dia_libre_1" >Dias libres:</label >
        <select name="dia_libre_1" id="dia_libre_1" value="<?=$contact['dia_libre_1']?>" required>
            <option value="" disabled selected>Dia libre 1</option>
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miercoles">Miercoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            <option value="Sabado">Sabado</option>
            <option value="Domingo">Domingo</option>
        </select>        
        <select name="dia_libre_2" id="dia_libre_2" value="<?=$contact['dia_libre_2']?>" required>
            <option value="" disabled selected>Dia libre 2</option>
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miercoles">Miercoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            <option value="Sabado">Sabado</option>
            <option value="Domingo">Domingo</option>
        </select>



        <label for="fecha_reg">Fecha de Creacion</label>
        <label for="fecha_reg"></label>
        <input type="datetime-local" name="fecha_reg" value="<?=date('Y-m-d\TH:i', strtotime($contact['fecha_reg']))?>" id="fecha_reg" required>
        <label for=""></label>
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>