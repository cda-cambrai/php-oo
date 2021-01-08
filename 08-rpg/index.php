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
        use Rpg\Magus;
        use Rpg\Warrior;

        $aragorn = new Warrior('Aragorn');
        $legolas = new Hunter('Legolas');
        $gandalf = new Magus('Gandalf');

        echo $aragorn->attack($legolas); // Enlève X points de vie en fonction de la force (Force x 2)
        echo $legolas->rangedAttack($gandalf); // Enlève X points de vie si le personnage est chasseur (Force x 3)
        echo $gandalf->castSpell($aragorn); // Enlève X points de vie en fonction du mana (Mana x 3)
    ?>


</body>
</html>
