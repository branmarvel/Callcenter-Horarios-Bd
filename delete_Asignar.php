<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the contact idHorario exists
if (isset($_GET['idEmpleados '])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM empleado_horario WHERE `idEmpleados ` = ? AND `empleado_horario`.`idHorario` = ?');
    $stmt->execute([$_GET['idEmpleados']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Horario asignado no \'t existe!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM empleado_horario WHERE `empleado_horario`.`idEmpleados` = ? AND `empleado_horario`.`idHorario` = ?');
            $stmt->execute([$_GET['idEmpleados']]);
            $msg = 'Has eliminado un Horario asignado!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: read_asignar.php');
            exit;
        }
    }
} else {
    exit('Id no especificado!');
}
?>

<?=template_header('Elimnar Horario asignado')?>

<div class="content delete">
    <h2>Eliminar Horario asignado #<?=$contact['idEmpleados ']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
    <p>Seguro que quiere eliminar el Horario asignado #<?=$contact['idEmpleados ']?>?</p>
    <div class="yesno">
        <a href="delete_asignar.php?idEmpleados =<?=$contact['idEmpleados ']?>&confirm=yes">Si</a>
        <a href="delete_asignar.php?idEmpleados =<?=$contact['idEmpleados ']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>