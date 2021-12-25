<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * je créé une route (donc une page)
     * dans une annotation. Je lui associe l'url "/home" qui
     * est la page d'accueil.
     * Ma route va appeler la méthode home, car l'annotation
     * est placée au dessus de la méthode
     * @Route("/home", name="home")
     */

    public function home(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->findBy([], ['id' => 'DESC'], 3);



        // je veux utiliser un fichier HTML en tant que réponse
        // HTTP
        // pour ça j'appelle la méthode render (issue de l'AbstractController)
        // et je lui passe en premier parametre le nom / le chemin du fichier
        // twig (html) situé dans le dossier template
        //et aussi ma variable .
        return $this->render("home.html.twig", ["articles" => $articles]);
    }

    /**
     * @Route("/admin/search", name="search_articles")
     */
    //je demande à symfony de instancier un objet de la classe Request, et la class BookRepository.
    public function searchArticles(ArticleRepository $articleRepository, Request $request)
    {
        // je récupère ce que tu l'utilisateur a recherché grâce à la classe Request
        $search = $request->query->get('search');


        // je fais ma requête en BDD grâce à la méthode que j'ai créée searchByTitle
        $articles = $articleRepository->searchByTitle($search);

        return $this->render("articles_search.html.twig", ['articles' => $articles]);

    }



}