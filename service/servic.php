<?php
// Simulation d'une liste de services 
$services = [
    ["nom" => "Développement Web", "description" => "Création de sites internet sur mesure."],
    ["nom" => "Maintenance FTTH", "description" => "Fiabilisation et suivi des réseaux optiques."],
    ["nom" => "Support Technique", "description" => "Assistance et dépannage informatique."]
];

// Gestion d'un éventuel formulaire soumis 
$messageConfirmation = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom_service'])) {
    $nouveauService = htmlspecialchars($_POST['nom_service']);
    // Ici, tu pourrais insérer le service dans ta base de données (ex: PDO / MySQL)
    $messageConfirmation = "Le service '$nouveauService' a bien été pris en compte !";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Services</title>
    
    </style>
</head>
<body>

    <h1>Nos Services</h1>

    <?php if (!empty($messageConfirmation)): ?>
        <p class="success"><?php echo $messageConfirmation; ?></p>
    <?php endif; ?>

    <!-- Affichage dynamique de la liste des services -->
    <div class="services-list">
        <?php foreach ($services as $srv): ?>
            <div class="service-card">
                <h3><?php echo htmlspecialchars($srv['nom']); ?></h3>
                <p><?php echo htmlspecialchars($srv['description']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Formulaire d'ajout rapide -->
    <form method="POST" action="">
        <h3>Ajouter un service</h3>
        <label for="nom_service">Nom du service :</label>
        <input type="text" id="nom_service" name="nom_service" required>
        <input type="submit" value="Ajouter">
    </form>

</body>
</html>