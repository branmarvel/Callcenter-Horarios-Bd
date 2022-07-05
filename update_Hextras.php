<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['idAsignacion_Horas_Extras'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $idAsignacion_Horas_Extras = isset($_POST['idAsignacion_Horas_Extras']) ? $_POST['idAsignacion_Horas_Extras'] : NULL;
        $asignacion = isset($_POST['asignacion']) ? $_POST['asignacion'] : '';
        $motivo = isset($_POST['motivo']) ? $_POST['motivo'] : '';
        $dia = isset($_POST['dia']) ? $_POST['dia'] : date('Y-m-d H:i:s');
        $idempleado_horario = isset($_POST['idempleado_horario']) ? $_POST['idempleado_horario'] : '';

        // Update the record
        $stmt = $pdo->prepare('UPDATE `asignacion_horas_extras` 
        SET `asignacion` = ?, `motivo` = ?, `dia` = ?, `idempleado_horario` = ?
        
        WHERE `asignacion_horas_extras`.`idAsignacion_Horas_Extras` = ?;');
        $stmt->execute([$idAsignacion_Horas_Extras, $asignacion, $motivo, $dia, $idempleado_horario, $_GET['idAsignacion_Horas_Extras' ]]);
        $msg = 'Actualizado Exitosamente!';
    }
    // Get the contact from the asignacion_horas_extras table
    $stmt = $pdo->prepare('SELECT * FROM asignacion_horas_extras WHERE idAsignacion_Horas_Extras = ?');
    $stmt->execute([$_GET['idAsignacion_Horas_Extras']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that idAsignacion_Horas_Extras!');
    }
} else {
    exit('No idAsignacion_Horas_Extras specified!');
}
$stmt2 = $pdo->prepare("SELECT *
FROM `empleado_horario` 
INNER JOIN empleados ON empleados.idEmpleados = empleado_horario.idEmpleados");
$stmt2->execute();

?>

<?=template_header('Read')?>

<div class="content update">
    <h2>Actualizar Horario #<?=$contact['idAsignacion_Horas_Extras']?></h2>
    <form action="update_hextras.php?idAsignacion_Horas_Extras=<?=$contact['idAsignacion_Horas_Extras']?>" method="post">
    <label for="idAsignacion_Horas_Extras">idAsignacion_Horas_Extras</label>
        <label for="asignacion">Hora asignada</label>
        <input type="text" name="idAsignacion_Horas_Extras" placeholder="" value="<?=$contact['idAsignacion_Horas_Extras']?>" id="idAsignacion_Horas_Extras" readonly>
        <input type="time" name="asignacion"  id="asignacion" value="<?=$contact['asignacion']?>" required>
        <label for="motivo">Motivo:</label>
        <textarea id="motivo" value="<?=$contact['motivo']?>" name="motivo" rows="4" cols="50"></textarea>
        <label for=""></label>
        <label for=""></label>
        <label for="idempleado_horario" >Empleado</label >
	
        <?php
echo '<select name="idempleado_horario" id="idempleado_horario" class="selector2" required>';
// For each row from the DB display a new <option>
foreach ($stmt2 as $row) {
    // value attribute is optional if the value and the text is the same
    echo '<option value="'.htmlspecialchars($row['idAsignacion_Horas_Extras']).'">';
    echo htmlspecialchars($row['idempleado_horario']).' ';
    echo htmlspecialchars($row['apellido']).' C.i-';
    echo htmlspecialchars($row['cedula']); // The text to be displayed to the user
    echo '</option>';
}
echo '</select>';
			?>

        <label for="idempleado_horario" ></label >       




        <label for="dia">Fecha de Creacion</label>
        <label for="dia"></label>
        <input type="datetime-local" name="dia" value="<?=date('Y-m-d\TH:i', strtotime($contact['dia']))?>" id="dia" required>
        <label for=""></label>
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>