<?php

namespace App\Entity;

class User
{
    public $nom;
    public $age;
    public $sexe;
    public $adresse = [];

    public static $users = []; // Accéssible partout, contiendra notre liste d'utilisateur

    /* 
    Le constructeur permet d'instancier une classe (ici User)
    En appelant cette classe un Objet de cette derniere est créé :
    - La classe est comme un moule qui embarque les informations déclarées (public $nom, etc.)
    - Lorsque que cette classe est déclarée un Objet est créé (donc un nouvel utilisateur)
    - Le constructeur porte son nom, en déclarant la classe User, il va remplir les informations déclarées (public $nom)
    */
    public function __construct($nom, $age, $sexe, $adresse)
    {
        // $this fait référence aux élements de l'objet (public $nom, etc.)
        $this->nom = $nom;
        $this->age = $age;
        $this->sexe = $sexe;
        $this->adresse = $adresse;

        /* 
        $this va recevoir la valeur de l'objet créé
        Pour faire référence à une propriété static il faut utiliser self::
        */
        self::$users[] = $this; 
    }

    /**
     * public static nous permet d'appeler cette fonction depuis l'exterieur (visibilité) et de ne pas avoir besoin de l'instancier
     */
    public static function createUser()
    {
        // new permet d'appeler le constructeur de la classe (ici User)
        $user1 = new User("Ethan", 33, true, [
            "rue"   => "3 rue Charcot",
            "cp"    => 75017,
            "ville" => "Paris"
        ]);
        $user2 = new User("Anissa", 20, false, [
            "rue"   => "12 av. Danton",
            "cp"    => 27140,
            "ville" => "Gisors"
        ]);
        $user3 = new User("Alain", 18, true, [
            "rue"   => "1 rue du bois",
            "cp"    => 93420,
            "ville" => "Villepinte"
        ]);
    }

    public function getName($nom)
    {
        foreach (self::$users as $user) {
            if (strtolower($user->nom) === $nom) {
                return $user;
            }
        }
    }
}
