<?php

namespace App\Entity;

class Article
{
    // Lorsque les attributs sont en private il faut déclarer des getters et des setters
    private $image;
    private $titre;
    private $contenu;

    public static $articles = [];

    public function __construct($image, $titre, $contenu)
    {
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->image = $image;
        self::$articles[] = $this;
    }

    // Un getter retourne simplement la valeur de l'attribut déclaré en private plus haut
    public function getTitre()
    {
        return $this->titre;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function getImage()
    {
        return $this->image;
    }

    /* 
        Un setter permet de modifier la valeur d'un attribut déclaré en private plus haut
        Cela permet de combiner les fonction des setters ex:
        $articles = new Article();
        $articles->setTitre('Un superbe titre')->setContenu('Un super contenu');
    */
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
        return $this;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public static function createArticles()
    {
        new Article("thermo", "L'été sera chaud", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque voluptatem saepe excepturi voluptas repellat velit natus quis incidunt quae non iste nihil temporibus quas animi, facere unde distinctio, tempora impedit ex blanditiis. A, ullam corporis. Totam accusamus ea quae nobis magni culpa sed maiores sit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque voluptatem saepe excepturi voluptas repellat velit natus quis incidunt quae non iste nihil temporibus quas animi, facere unde distinctio, tempora impedit ex blanditiis. A, ullam corporis. Totam accusamus ea quae nobis magni culpa sed maiores sit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque voluptatem saepe excepturi voluptas repellat velit natus quis incidunt quae non iste nihil temporibus quas animi, facere unde distinctio, tempora impedit ex blanditiis. A, ullam corporis. Totam accusamus ea quae nobis magni culpa sed maiores sit.");
        new Article("curcuma", "Le pouvoir du curcuma", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque voluptatem saepe excepturi voluptas repellat velit natus quis incidunt quae non iste nihil temporibus quas animi, facere unde distinctio, tempora impedit ex blanditiis. A, ullam corporis. Totam accusamus ea quae nobis magni culpa sed maiores sit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque voluptatem saepe excepturi voluptas repellat velit natus quis incidunt quae non iste nihil temporibus quas animi, facere unde distinctio, tempora impedit ex blanditiis. A, ullam corporis. Totam accusamus ea quae nobis magni culpa sed maiores sit.");
        new Article("stade", "L'équipe de France championne du monde", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque voluptatem saepe excepturi voluptas repellat velit natus quis incidunt quae non iste nihil temporibus quas animi, facere unde distinctio, tempora impedit ex blanditiis. A, ullam corporis. Totam accusamus ea quae nobis magni culpa sed maiores sit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque voluptatem saepe excepturi voluptas repellat velit natus quis incidunt quae non iste nihil temporibus quas animi, facere unde distinctio, tempora impedit ex blanditiis. A, ullam corporis. Totam accusamus ea quae nobis magni culpa sed maiores sit.");
    }

    public static function getArticleByTitle($titre)
    {
        foreach (self::$articles as $article) {
            $slug = $article->titre;
            $search = array(
                "é"," ","'"
            );
            $replace = array(
                "e","-","-"
            );
            // On remplace les valeurs passées au tableau $search par les valeurs du tableau $replace
            //   $search["0" => "é"] par $replace["0" => "e"]
            $slug = str_replace($search, $replace, $slug);
            // On passe le slug en minuscule
            $slug = strtolower($slug);

            if (($slug === $titre)) {
                return $article;
            }
        }
    }
}
