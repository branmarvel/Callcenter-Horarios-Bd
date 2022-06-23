<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;

// Prepare the SQL statement and get records from our horario table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM horario ORDER BY idHorario LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$horario = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of horario, this is so we can determine whether there should be a next and previous button
$num_horario = $pdo->query('SELECT COUNT(*) FROM horario')->fetchColumn();
?>

<?=template_header('Read')?>

<div class="content read">
	<h2>Lista de Horario</h2>
	<a href="create.php" class="create-contact">    Crear Horario</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Hora de inicio</td>
                <td>Tiempo de descanso</td>
                <td>Hora de salida</td>
                <td>Dia libre 1</td>
                <td>Dia libre 2</td>
                <td>Fecha creado</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($horario as $contact): ?>
            <tr>
                <td><?=$contact['idHorario']?></td>
                <td><?=$contact['hora_inicio']?></td>
                <td><?=$contact['tiempo_descanso']?></td>
                <td><?=$contact['hora_final']?></td>
                <td><?=$contact['dia_libre_1']?></td>
                <td><?=$contact['dia_libre_2']?></td>
                <td><?=$contact['fecha_reg']?></td>
                <td class="actions">
                    <a href="update.php?idHorario=<?=$contact['idHorario']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?idHorario=<?=$contact['idHorario']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_horario): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>