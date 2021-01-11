<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire en POO</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php
        // Fais un require des classes qu'on utilise (Form)
        spl_autoload_register();

        // On va pouvoir créer un formulaire comme un objet
        $form = new Form($_POST);

        // Ensuite je vais configurer mon formulaire grâce à $form

        // Pour les erreurs, on va créer une nouvelle classe
    ?>

    <form method="post" action="">
        <?= $form->input('email'); ?>
        <?= $form->input('telephone', 'number'); ?>
        <?= $form->input('message'); ?>

        <?= $form->button('Envoyer'); ?>
    </form>

    <?php
        // Si mon formulaire est soumis, j'affiche les données
        if ($form->isSubmit()) {
            // Le getData doit me renvoyer toutes les données du formulaire ($_POST)
            var_dump($form->getData());
        }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
