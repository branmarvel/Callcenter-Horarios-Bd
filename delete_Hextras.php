<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the contact idHorario exists
if (isset($_GET['idHorario'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM horario WHERE idHorario = ?');
    $stmt->execute([$_GET['idHorario']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Horario no \'t existe!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM horario WHERE idHorario = ?');
            $stmt->execute([$_GET['idHorario']]);
            $msg = 'Has eliminado un horario!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('Id no especificado!');
}
?>

<?=template_header('Elimnar horario')?>

<div class="content delete">
    <h2>Eliminar Horario #<?=$contact['idHorario']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
    <p>Seguro que quiere eliminar el horario #<?=$contact['idHorario']?>?</p>
    <div class="yesno">
        <a href="delete.php?idHorario=<?=$contact['idHorario']?>&confirm=yes">Si</a>
        <a href="delete.php?idHorario=<?=$contact['idHorario']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>