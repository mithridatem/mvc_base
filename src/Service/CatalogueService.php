<?php

namespace App\Service;

class CatalogueService
{
    //attributs
    private array $livres;

    public function __construct()
    {
        $this->livres = [];
    }

    public function getLivres(string $genre = ""): array
    {
        //Crée le tableau de livre
        $this->livres =  [
            ["id" => 1, "titre" => "Le Petit Prince", "auteur" => "Antoine de Saint-Exupéry", "genre" => "Conte"],
            ["id" => 2, "titre" => "Le Petit Chaperon rouge", "auteur" => "Antoine de Saint-Exupéry", "genre" => "Conte"],
            ["id" => 3, "titre" => "Le Hobbit ", "auteur" => "J. R. R. Tolkien", "genre" => "Fantasy"],
            ["id" => 4, "titre" => "Le Seigneur des anneaux ", "auteur" => "J. R. R. Tolkien", "genre" => "Fantasy"],
            ["id" => 5, "titre" => "L’Île au trésor", "auteur" => "Robert Louis Stevenson", "genre" => "Aventure"],
            ["id" => 6, "titre" => "Le conte de Montécristo", "auteur" => "Robert Louis Stevenson", "genre" => "Aventure"]
        ];

        //test du genre
        if (!empty($genre)) {
            //tableau de livres filtrés
            $livresFiltre = [];
            //reconstruire le tableau de livre
            foreach ($this->livres as $livre) {
                //Tester si un livre posséde le genre (depuis $_GET["genre])
                if ($genre == $livre["genre"]) {
                    //Ajouter le livre au tableau de livres filtrés
                    $livresFiltre[] = $livre;
                }
            }
            //modifier le tableau $this->livres
            $this->livres = $livresFiltre;
        }
        return $this->livres;
    }

    public function findLivreById(int $id): ?array
    {
        
        //Crée le tableau de livre
        $this->livres =  [
            ["id" => 1, "titre" => "Le Petit Prince", "auteur" => "Antoine de Saint-Exupéry", "genre" => "Conte"],
            ["id" => 2, "titre" => "Le Petit Chaperon rouge", "auteur" => "Antoine de Saint-Exupéry", "genre" => "Conte"],
            ["id" => 3, "titre" => "Le Hobbit ", "auteur" => "J. R. R. Tolkien", "genre" => "Fantasy"],
            ["id" => 4, "titre" => "Le Seigneur des anneaux ", "auteur" => "J. R. R. Tolkien", "genre" => "Fantasy"],
            ["id" => 5, "titre" => "L’Île au trésor", "auteur" => "Robert Louis Stevenson", "genre" => "Aventure"],
            ["id" => 6, "titre" => "Le conte de Montécristo", "auteur" => "Robert Louis Stevenson", "genre" => "Aventure"]
        ];
        
        if ($id != 0) {
            //Parcours de la liste des livres
            foreach ($this->livres as $livre) {
                //Tester si un livre existe par son ID (depuis $_GET["id"])
                if ($id == $livre["id"]) {
                   return $livre;
                }
            }
        }

        //sinon on retourne null
        return null;
    }
}
