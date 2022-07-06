
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
    $idempleado_horario = isset($_POST['idempleado_horario']) ? $_POST['idempleado_horario'] : '';
  
    // Insert new record into the asignacion_horas_extras table
    $stmt = $pdo->prepare('INSERT INTO asignacion_horas_extras  (`idAsignacion_Horas_Extras`, `asignacion`, `motivo`, `dia`, `idempleado_horario`)  VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$idAsignacion_Horas_Extras, $asignacion, $motivo, $dia, $idempleado_horario ]);
    // Output message
    $msg = 'Creado exitosamente!';
    
}
?>
<?php 
$stmt2 = $pdo->prepare("SELECT *
FROM `empleado_horario` 
INNER JOIN empleados ON empleados.idEmpleados = empleado_horario.idEmpleados");
$stmt2->execute();

?>

<?= template_header('Create') ?>

<div class="content update">
    <h2>Horas extras</h2>
    <form action="create_hextras.php" method="post">
        <label for="idAsignacion_Horas_Extras">idAsignacion_Horas_Extras</label>
        <label for="asignacion">Hora asignada</label>
        <input type="text" name="idAsignacion_Horas_Extras" placeholder="" value="Auto" id="idAsignacion_Horas_Extras" readonly>    
        <input type="datetime-local" name="asignacion" value="<?php echo date('Y-m-d\TH:i:s'); ?>" id="asignacion" required min="<?php echo date('Y-m-d\TH:i:s'); ?>">
        <label for="motivo">Motivo:</label>
        <textarea id="motivo" name="motivo" rows="4" cols="50" required="required"></textarea>
        <label for=""></label>
        <label for="dia"></label>
        <label for="idEmpleados" >Empleado</label >
	
			<?php
echo '<select name="idempleado_horario" id="idempleado_horario" class="selector2" required>';
// For each row from the DB display a new <option>
foreach ($stmt2 as $row) {
    // value attribute is optional if the value and the text is the same
    echo '<option value="'.htmlspecialchars($row['idempleado_horario']).'">';
    echo htmlspecialchars($row['idEmpleados']).' ';
    echo htmlspecialchars($row['apellido']).' C.i-';
    echo htmlspecialchars($row['cedula']); // The text to be displayed to the user
    echo '</option>';
}
echo '</select>';
			?>
        <label for="idEmpleados" ></label >       

        
        </select>
        <label for="idEmpleados" ></label >
        <label for="dia" >Fecha de creacion</label>
        <label for="dia"></label>
        <input type="datetime-local" name="dia" value="<?php echo date('Y-m-d\TH:i:s'); ?>" id="dia" required readonly>
        

<label for=""></label>
        <input type="submit" value="Crear Horas Extras">
    </form>
    <?php if ($msg) : ?>
        <p><?= $msg ?></p>
    <?php endif; ?>
</div>


<?= template_footer() ?>