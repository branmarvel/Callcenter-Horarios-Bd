<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;

// Prepare the SQL statement and get records from our empleado_horario table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT *
FROM empleado_horario 
JOIN empleados ON empleados.idEmpleados = empleado_horario.idEmpleados
ORDER BY empleado_horario.idEmpleados LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$empleado_horario = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of empleado_horario, this is so we can determine whether there should be a next and previous button
$num_empleado_horario = $pdo->query('SELECT COUNT(*) FROM empleado_horario')->fetchColumn();


$join_empleado = $pdo->query('SELECT COUNT(*) FROM empleado_horario')->fetchColumn();
?>



<?=template_header('Read')?>

<div class="content read">
	<h2>Lista de Horarios asignados</h2>
	<a href="asignar.php" class="create-contact"> Asignar horarios</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nombre de Empleado</td>
                <td>Apellido de Empleado</td>
                <td>Cedula de Empleado</td>
                <td>idHorario</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleado_horario as $contact2): ?>
            <tr>
                <td><?=$contact2['idEmpleados']?></td>
                <td><?=$contact2['nombre']?></td>
                <td><?=$contact2['apellido']?></td>
                <td><?=$contact2['cedula']?></td>
                <td><?=$contact2['idHorario']?></td>

                <td class="actions">
                    <a href="update_asignar.php?idEmpleados=<?=$contact2['idEmpleados']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete_Asignar.php?idEmpleados=<?=$contact2['idEmpleados']?>&idHorario=<?=$contact2['idHorario']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read_asignar.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_empleado_horario): ?>
		<a href="read_asignar.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>