<?php require '../templates/header.html.php'; ?>

<div class="container">
    <h1>
        <?= $driver->getFirstname(); ?>
        <?= $driver->getName(); ?>
    </h1>

    <a href="index.php?controller=driver&action=list">
        Retour à la liste
    </a>
</div>

<?php require '../templates/footer.html.php'; ?>
