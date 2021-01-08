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
        use Rpg\Inventory\Potion;
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
        $potion = new Potion();

        $aragorn->pick($potion)->pick($sword);
        $legolas->pick($arc);

        $aragorn->consume($potion);

        // Tableau avec les personnages
        $characters = [$aragorn, $legolas, $gandalf];
    ?>

    <div class="container">
        <div class="row">
            <?php foreach ($characters as $character) { ?>
                <div class="col-lg-4">
                    <h1><?= $character->getName(); ?></h1>
                    <img src="<?= $character->getImage(); ?>">

                    <span class="health bg-danger text-white p-3">
                        <?= $character->getHealth(); ?>
                    </span>
                    <span class="mana bg-dark text-white p-3 mx-2">
                        <?= $character->getStrength(); ?>
                    </span>
                    <span class="strength bg-primary text-white p-3">
                        <?= $character->getMana(); ?>
                    </span>

                    <!-- Afficher l'inventaire sous forme de liste -->
                    <?= $character->getInventory(); ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <style>
        body{
            background-image: url(https://www.dailymars.net/wp-content/uploads/2014/12/terre-du-milieu.jpg);
            color: white;
        }
        .health, .mana, .strength{
            position: absolute;
            height: 50px;
            width: 50px;
            border:3px solid black;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 20px;
        }

        .health{
            top: 373px;
            left: 40px;
        }

        .mana{
            top: 426px;
            left: 30px;
        }

        .strength{
            top: 480px;
            left: 36px;
        }
    </style>

</body>
</html>
