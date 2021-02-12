<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function index(): Response
    {
        Article::createArticles();
        return $this->render('article/articles.html.twig', [
            'articles' => Article::$articles
        ]);
    }

    /**
     * @Route("/articles/{titre}", name="show_article")
     */
    public function show($titre): Response
    {
        Article::createArticles();

        $article = Article::getArticleByTitle($titre);
        return $this->render('article/article.html.twig', [
            'article' => $article
        ]);
    }
}
