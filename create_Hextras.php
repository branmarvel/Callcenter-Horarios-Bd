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
    $motivo = isset($_POST['motivo']) ? $_POST['motivo'] : '';
    $dia = isset($_POST['dia']) ? $_POST['dia'] : date("d/m/Y H:i:s");
    $idEmpleados = isset($_POST['idEmpleados']) ? $_POST['idEmpleados'] : '';
    $idHorario = isset($_POST['idHorario']) ? $_POST['idHorario'] : '';
    // Insert new record into the asignacion_horas_extras table
    $stmt = $pdo->prepare('INSERT INTO asignacion_horas_extras  (`idAsignacion_Horas_Extras`, `asignacion`, `motivo`, `dia`, `idEmpleados`, `idHorario`)  VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$idAsignacion_Horas_Extras, $asignacion, $motivo, $dia, $idEmpleados, $idHorario ]);
    // Output message
    $msg = 'Creado exitosamente!';
    
}
?>
<?php 
$stmt2 = $pdo->prepare("SELECT *
FROM `empleado_horario` 
INNER JOIN empleados ON empleados.idEmpleados = empleado_horario.idEmpleados");
$stmt2->execute();
$stmt3 = $pdo->prepare("SELECT *
FROM `empleado_horario` 
INNER JOIN horario ON horario.idHorario = empleado_horario.idHorario ");
$stmt3->execute();

?>

<?= template_header('Create') ?>

<div class="content update">
    <h2>Horas extras</h2>
    <form action="create_hextras.php" method="post">
        <label for="idAsignacion_Horas_Extras">idAsignacion_Horas_Extras</label>
        <label for="asignacion">Hora asignada</label>
        <input type="text" name="idAsignacion_Horas_Extras" placeholder="" value="Auto" id="idAsignacion_Horas_Extras" readonly>
        <input type="time" name="asignacion" placeholder="Cardo Dalisay" id="asignacion" required>
        <label for="motivo">Motivo:</label>
        <textarea id="motivo" name="motivo" rows="4" cols="50"></textarea>
        <label for=""></label>
        <label for="dia"></label>
        <label for="idEmpleados" >Empleado</label >
	
			<?php
echo '<select name="idEmpleados" id="idEmpleados" class="selector2" required>';
// For each row from the DB display a new <option>
foreach ($stmt2 as $row) {
    // value attribute is optional if the value and the text is the same
    echo '<option value="'.htmlspecialchars($row['idEmpleados']).'">';
    echo htmlspecialchars($row['idEmpleados']).' ';
    echo htmlspecialchars($row['apellido']).' C.i-';
    echo htmlspecialchars($row['cedula']); // The text to be displayed to the user
    echo '</option>';
}
echo '</select>';
			?>
 <label for="idHorario" >Horario</label >

            			<?php
echo '<select name="idHorario" id="idHorario" class="selector2" required>';
// For each row from the DB display a new <option>
foreach ($stmt3 as $row) {
    // value attribute is optional if the value and the text is the same
    echo '<option value="'.htmlspecialchars($row['idHorario']).'">';
    echo htmlspecialchars($row['idHorario']).' Hora de inicio: ';
    echo htmlspecialchars($row['hora_inicio']).' Hora final: ';
    echo htmlspecialchars($row['hora_final']).' Dias libres: ';
    echo htmlspecialchars($row['dia_libre_1']).' ';
    echo htmlspecialchars($row['dia_libre_2']).' ';
    echo '</option>';
}
echo '</select>';
			?>
        <label for="idEmpleados" ></label >       

        
        </select>
        <label for="idEmpleados" ></label >
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