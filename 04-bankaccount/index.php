<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de compte bancaire en POO</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Gestion de compte bancaire en POO</h1>

        <?php
            /**
             * Nous allons créer un système de gestion de compte bancaire en POO.
             * 
             * On doit donc créer une classe BankAccount.
             * Il y aura 3 propriétés : Un identifiant (unique), un propriétaire (Matthieu) et un montant (float)
             * Dans le constructeur, on initialise l'identifiant et le propriétaire. Le montant est optionnel (0 par défaut).
             */

            $bankAccount01 = new BankAccount(123456, 'Matthieu'); // Matthieu a 0 sur son compte
        ?>

        <div class="card">
            <div class="card-body">
                <?php
                    echo $bankAccount01->getBalance(); // Renvoie 0
                    $bankAccount01->depositMoney(1000); // Matthieu a 1000 sur son compte
                    echo $bankAccount01->getBalance(); // Renvoie 1000
                    $bankAccount01->withdrawMoney(250); // Matthieu a 750 sur son compte
                    echo $bankAccount01->getBalance(); // Renvoie 750

                    // On renvoie une erreur si le montant du compte tombe en dessous de 0
                    $bankAccount01->withdrawMoney(800);
                    $bankAccount01->depositMoney(-2000);

                    // BONUS: Appliquer un système de découvert
                    $bankAccount02 = new BankAccount(123456, 'Matthieu', 800, 50); // On autorise un découvert de 50
                    $bankAccount02->withdrawMoney(850); // Je suis à -50
                    // Cette méthode permet de calculer les agios (à partir de -1)
                    // Potentiellement, on peut passer en dessous de l'autorisé...
                    $bankAccount02->applyFees(); // On retire donc 10% de la somme en négatif (5 si on est à -50)
                ?>
            </div>
        </div>
    </div>
</body>
</html>
