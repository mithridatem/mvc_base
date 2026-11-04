<?php

namespace App\Controller;

//Import du service
use App\Service\HomeService;
use App\Service\CatalogueService;

class HomeController
{

    private HomeService $homeService;
    private CatalogueService $catalogueService;

    public function __construct()
    {
        //$this->homeService = $homeService;
        $this->homeService = new HomeService();
        $this->catalogueService = new CatalogueService();
    }

    //Méthode qui retourne le template_home.php avec la méthode render
    public function home(): mixed
    {
        //Récupération du nom en GET
        $nom = $this->homeService->getNomUrl();
        //stockage dans le tableu $data
        $data["nom"] = $nom;
        //retourne le template_home.php avec les données
        return $this->render("home", "Accueil", $data);
    }

    //Méthode pour retourner la page Accueil manuel
    public function accueil(): void
    {
        //Variable pour passer le titre au template
        $title = "Accueil";
        include __DIR__ . "/../../template/template_accueil.php";
    }

    public function catalogue(): mixed
    {
        //Titre de la librairie
        $data["nomLibrairie"] = "La Petite Librairie";
        //Tableau de livres

        //tester si la super globale $_GET["genre"] existe
        $data["livres"] = $this->catalogueService->getLivres($_GET["genre"] ?? "");

        //retour du template
        return $this->render("catalogue", "Catalogue", $data);
    }

    public function livre(): mixed
    {
        //Récupération du livre par son ID ($_GET["id"])
        $data["livre"] = $this->catalogueService->findLivreById(is_numeric($_GET["id"]) ?? $_GET["id"] ?? 0);

        //retour du template
        return $this->render("livre", "Livre", $data);
    }

    //Méthode qui va retourner les templates
    private function render(string $template, ?string $title, array $data = []): mixed
    {
        return include __DIR__ . "/../../template/template_" . $template . ".php";
    }
}
