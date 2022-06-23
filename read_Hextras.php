<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;

// Prepare the SQL statement and get records from our asignacion_horas_extras table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM asignacion_horas_extras ORDER BY idAsignacion_Horas_Extras LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$asignacion_horas_extras = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of asignacion_horas_extras, this is so we can determine whether there should be a next and previous button
$num_asignacion_horas_extras = $pdo->query('SELECT COUNT(*) FROM asignacion_horas_extras')->fetchColumn();
?>

<?=template_header('Read')?>

<div class="content read">
	<h2>Lista de Horas extras</h2>
	<a href="create.php" class="create-contact">    Crear Horas Extras</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Fecha asignada</td>
                <td>Motivo </td>
                <td>Empleado</td>
                <td>Horario</td>
                <td>Fecha creado</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($asignacion_horas_extras as $contact): ?>
            <tr>
                <td><?=$contact['idAsignacion_Horas_Extras']?></td>
                <td><?=$contact['asignacion']?></td>
                <td><?=$contact['motivo']?></td>
                <td><?=$contact['idEmpleados']?></td>
                <td><?=$contact['idHorario']?></td>
                <td><?=$contact['dia']?></td>
                <td class="actions">
                    <a href="update.php?idAsignacion_Horas_Extras=<?=$contact['idAsignacion_Horas_Extras']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?idAsignacion_Horas_Extras=<?=$contact['idAsignacion_Horas_Extras']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_asignacion_horas_extras): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>