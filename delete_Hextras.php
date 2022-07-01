<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the contact idHorario exists
if (isset($_GET['idAsignacion_Horas_Extras'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM asignacion_horas_extras WHERE `idAsignacion_Horas_Extras` = ?');
    $stmt->execute([$_GET['idAsignacion_Horas_Extras']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Hora extra no \'t existe!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM asignacion_horas_extras WHERE `idAsignacion_Horas_Extras` = ?');
            $stmt->execute([$_GET['idAsignacion_Horas_Extras']]);
            $msg = 'Has eliminado un Hora extra!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: read_hextras.php');
            exit;
        }
    }
} else {
    exit('Id no especificado!');
}
?>

<?=template_header('Elimnar Hora extra')?>

<div class="content delete">
    <h2>Eliminar Hora extra #<?=$contact['idAsignacion_Horas_Extras']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
    <p>Seguro que quiere eliminar el Hora extra #<?=$contact['idAsignacion_Horas_Extras']?>?</p>
    <div class="yesno">
        <a href="delete_Hextras.php?idAsignacion_Horas_Extras=<?=$contact['idAsignacion_Horas_Extras']?>&confirm=yes">Si</a>
        <a href="delete_Hextras.php?idAsignacion_Horas_Extras=<?=$contact['idAsignacion_Horas_Extras']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>