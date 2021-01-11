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
        use Rpg\Inventory\Sword;
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
        $sword = new Sword('Andùril', 5);

        $aragorn->pick($potion)->pick($sword);
        $legolas->pick($arc);

        $aragorn->consume($potion);
        $aragorn->equip($sword);
        // Ne fais rien car $legolas est un Chasseur
        $legolas->equip($sword);

        // Tableau avec les personnages
        $characters = [$aragorn, $legolas, $gandalf];

        // Gain d'expérience
        $aragorn->attack($legolas);
        $aragorn->attack($legolas); // 1 points d'xp
        $aragorn->attack($legolas); // 0 points d'xp
        $aragorn->attack($legolas); // 0 points d'xp
        $aragorn->attack($legolas); // 0 points d'xp
        $aragorn->attack($legolas); // 0 points d'xp

        $aragorn->attack($gandalf);
        $aragorn->attack($gandalf); // 1 points d'xp

        $pikachu = new Warrior('Pikachu');
        $aragorn->attack($pikachu);
        $aragorn->attack($pikachu); // 1 points d'xp

        // Aragorn doit avoir 2 d'exp
    ?>

    <div class="container">
        <div class="row">
            <?php foreach ($characters as $character) { ?>
                <div class="col-lg-4 bg-dark">
                    <h1><?= $character->getName(); ?></h1>
                    <img src="<?= $character->getImage(); ?>">

                    <span class="health bg-danger text-white p-3">
                        <?= $character->getHealth(); ?>
                    </span>
                    <span class="strength bg-dark text-white p-3 mx-2">
                        <?= $character->getStrength(); ?>
                    </span>
                    <span class="mana bg-primary text-white p-3">
                        <?= $character->getMana(); ?>
                    </span>

                    <!-- Afficher l'inventaire sous forme de liste -->
                    <?= $character->getInventory(); ?>

                    <!-- Affiche le level et l'xp -->
                    <span>Level: <?= $character->getLevel(); ?></span>
                    <span>Exp: <?= $character->getExp(); ?></span>
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
