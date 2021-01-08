<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php
        spl_autoload_register();

        use Rpg\Hunter;
        use Rpg\Inventory\Item;
        use Rpg\Magus;
        use Rpg\Warrior;

        $aragorn = new Warrior('Aragorn');
        $legolas = new Hunter('Legolas');
        $gandalf = new Magus('Gandalf');

        echo $aragorn->attack($legolas); // Enlève X points de vie en fonction de la force (Force x 2)
        echo $legolas->rangedAttack($gandalf); // Enlève X points de vie si le personnage est chasseur (Force x 3)
        echo $gandalf->castSpell($aragorn); // Enlève X points de vie en fonction du mana (Mana x 3)

        // Les personnages peuvent ramasser des objets
        $potion = new Item('Potion');
        $sword = new Item('Andùril');
        $arc = new Item('Arc');

        $aragorn->pick($potion)->pick($sword);
        $legolas->pick($arc);

        // Tableau avec les personnages
        $characters = [$aragorn, $legolas, $gandalf];
    ?>

    <div class="container">
        <div class="row">
            <?php foreach ($characters as $character) { ?>
                <div class="col-lg-4">
                    <h1><?= $character->getName(); ?></h1>
                    <img src="<?= $character->getImage(); ?>">

                    <span class="rounded-circle bg-danger text-white p-3">
                        <?= $character->getHealth(); ?>
                    </span>
                    <span class="rounded-circle bg-dark text-white p-3 mx-2">
                        <?= $character->getStrength(); ?>
                    </span>
                    <span class="rounded-circle bg-primary text-white p-3">
                        <?= $character->getMana(); ?>
                    </span>

                    <!-- Afficher l'inventaire sous forme de liste -->
                    <?= $character->getInventory(); ?>
                </div>
            <?php } ?>
        </div>
    </div>

</body>
</html>
