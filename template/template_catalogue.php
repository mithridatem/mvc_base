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
        <?php if (empty($data["livres"])): ?>
            <p>Aucun livre à afficher</p>
        <?php endif ?>
        <!-- Boucle pour afficher les livres -->
        <?php foreach ($data["livres"] ?? [] as $livre) : ?>
            <h2><?= $livre["titre"] ?></h2>
            <a href="/livre?id=<?= $livre["id"] ?>">Détail</a>
        <?php endforeach ?>
    </main>
</body>

</html>
