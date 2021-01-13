<?php require '../templates/header.html.php'; ?>

<div class="container">
    <h1>Modifier un conducteur</h1>
    <form method="post" action="">
        <?= $form->input('firstname'); ?>
        <?= $validation->getError('firstname'); ?>
        <?= $form->input('name'); ?>
        <?= $validation->getError('name'); ?>
        <button class="btn">Modifier ce conducteur</button>
    </form>
</div>

<?php require '../templates/footer.html.php'; ?>
