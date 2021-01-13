<?php
// Attention, on part de public/index.php
require '../templates/header.html.php'; ?>

    <div class="container">
        <h1>Liste des conducteurs</h1>
        <table class="table text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Modification</th>
                    <th>Suppression</th>
                </tr>
            </thead>
            <?php foreach ($drivers as $driver) { ?>
                <tr>
                    <td><?= $driver->getId(); ?></td>
                    <td>
                        <a href="index.php?controller=driver&action=show&id=<?= $driver->getId(); ?>">
                            <?= $driver->getFirstname(); ?>
                        </a>
                    </td>
                    <td><?= $driver->getName(); ?></td>
                    <td>
                        <a href="index.php?controller=driver&action=edit&id=<?= $driver->getId(); ?>">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="index.php?controller=driver&action=delete&id=<?= $driver->getId(); ?>">
                            <i class="fa fa-times"></i>
                        </a>
                    </td>
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
