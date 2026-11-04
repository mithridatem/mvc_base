<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?? "" ?></title>
</head>

<body>
    <nav class="container-fluid">
        <ul>
            <li><strong>Acme Corp</strong></li>
        </ul>
        <ul>
            <li><a href="/catalogue">Catalogue de livres</a></li>
            <li><a href="/catalogue?genre=Fantasy">Livres Fantasy</a></li>
            <li><a href="/catalogue?genre=Aventure">Livres Aventure</a></li>
            <li><a href="/catalogue?genre=Polar">Livres Polar</a></li>
            <li><a href="/">Accueil</a></li>
        </ul>
    </nav>
    <main class="container-fluid">

        <h1><?= $data["nomLibrairie"] ?? "" ?></h1>
        <!-- Test si la liste de livres est vide -->
        <?php if (empty($data["livre"])): ?>
            <p>Aucun livre à afficher</p>
        <!-- Sinon on affiche le livre -->
        <?php else : ?>
            <h2><?= $data["livre"]["titre"] ?></h2>
            <h3><?= $data["livre"]["auteur"] ?></h3>
            <h3><?= $data["livre"]["genre"] ?></h3>
        <?php endif ?>
        <a href="/catalogue">Retour au catalogue</a>
    </main>
</body>

</html>