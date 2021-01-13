<?php
// Attention, on part de public/index.php
require '../templates/header.html.php'; ?>

    <div class="container">
        <h1>Liste des conducteurs</h1>
        <table class="table">
            <?php foreach ($drivers as $driver) { ?>
                <tr>
                    <td><?= $driver->getId(); ?></td>
                    <td><?= $driver->getFirstname(); ?></td>
                    <td><?= $driver->getName(); ?></td>
                </tr>
            <?php } ?>
        </table>

        <form method="post" action="index.php?controller=driver&action=list">
            <?= $form->input('firstname'); ?>
            <?= $validation->getError('firstname'); ?>
            <?= $form->input('name'); ?>
            <?= $validation->getError('name'); ?>
            <button class="btn">Ajouter ce conducteur</button>
        </form>
    </div>

<?php require '../templates/footer.html.php'; ?>
