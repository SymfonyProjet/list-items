<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * Affiche la page d'accueil
     * 
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('homepage/home.html.twig');
    }

    /**
     * Affiche tous les utilisateurs
     * 
     * @Route("/utilisateurs", name="users")
     */
    public function users(): Response
    {
        /*
            --PHP procédural-- 
            // $user1 = [
            //     "nom" => "Ethan",
            //     "age" => 33,
            //     "sexe" => true,
            //     "adresse" => [
            //         "rue" => "3 rue Charcot",
            //         "cp" => 75017,
            //         "ville" => "Paris"
            //     ]
            // ];
            // $user2 = [
            //     "nom" => "Anissa",
            //     "age" => 20,
            //     "sexe" => false,
            //     "adresse" => [
            //         "rue" => "12 av. Danton",
            //         "cp" => 27140,
            //         "ville" => "Gisors"
            //     ]
            // ];
            // $user3= [
            //     "nom" => "Alain",
            //     "age" => 18,
            //     "sexe" => true,
            //     "adresse" => [
            //         "rue" => "1 rue du bois",
            //         "cp" => 93420,
            //         "ville" => "Villepinte"
            //     ]
            // ];
            // $users = [
            //     "u1" => $user1,
            //     "u2" => $user2,
            //     "u3" => $user3
            // ];
        */

        /* 
            Appel de la fonction static createUser() créer dans notre classe User() 
            On génère ainsi nos utilisateurs qui remplit la variable $users (tableau déclaré en propriété static dans notre classe)
            Ne pas oublier d'importer la classe User() en utilisant le use en haut de la page
        */
        User::createUser();

        return $this->render('user/index.html.twig', [
            'users' => User::$users //On envoie le tableau $users à la vue
        ]);
    }

    /**
     * Affiche un utilisateur
     * 
     * @Route("/utilisateurs/{nom}", name="show_user")
     */
    public function show($nom)
    {
        User::createUser();
        $user = User::getName($nom);
        
        return $this->render('user/show.html.twig' , [
            'user' => $user
        ]);
    }
}
