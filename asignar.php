<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    $idEmpleados = isset($_POST['idEmpleados']) ? $_POST['idEmpleados'] : '';
    $idHorario = isset($_POST['idHorario']) ? $_POST['idHorario'] : '';
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : date("d/m/Y H:i:s");
    // Insert new record into the empleado_horario table
    $stmt = $pdo->prepare('INSERT INTO empleado_horario (`idEmpleados`, `idHorario`, `fecha`) VALUES (?, ?, ?)');
    $stmt->execute([$idEmpleados, $idHorario, $fecha]);
    // Output message
    $msg = 'Creado exitosamente!';
    
}
?>
<?php 
$stmt2 = $pdo->prepare("SELECT `idEmpleados`, `nombre`, `apellido`, `cedula` FROM `empleados` ");
$stmt2->execute();
$stmt3 = $pdo->prepare("SELECT `idHorario`, `hora_inicio`, `hora_final`, `dia_libre_1`, `dia_libre_2` FROM `horario` ");
$stmt3->execute();


?>

<?= template_header('Create') ?>

<div class="content update">
    <h2>Asignar Horarios</h2>
    <form action="asignar.php" method="post">

        <label for="idEmpleados" >Empleado</label >
	
			<?php
echo '<select name="idEmpleados" id="idEmpleados" class="selector2" required>';
// For each row from the DB display a new <option>
foreach ($stmt2 as $row) {
    // value attribute is optional if the value and the text is the same
    echo '<option value="'.htmlspecialchars($row['idEmpleados']).'">';
    echo htmlspecialchars($row['nombre']).' ';
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
        <label for="" ></label >       

        
        </select>
        <label for="" ></label >
        <label for="fecha" >Fecha de asignacion</label>
        <label for="fecha"></label>
        <input type="datetime-local" name="fecha" value="<?= date("d/m/Y H:i:s") ?>" id="fecha" required>

<label for=""></label>
        <input type="submit" value="Crear Horas Extras">
    </form>
    <?php if ($msg) : ?>
        <p><?= $msg ?></p>
    <?php endif; ?>
</div>


<?= template_footer() ?>