<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $repoArticle;

    private $repoCategory;

    public function __construct(ArticleRepository $repoArticle, CategoryRepository $repoCategory)
    {
        $this->repoArticle = $repoArticle;
        $this->repoCategory = $repoCategory;
    }

    /**
     * @Route("/", name="home")
     * @param repoArticle ArticleRepository class instance
     */
    public function index(): Response
    {
        $articles = $this->repoArticle->findAll();
        $categories = $this->repoCategory->findAll();

        return $this->render("home/index.html.twig", [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }
    
    /**
     * @Route("/show/{id}", name="show")
     * Symfony comprend tout seul qu'il va devoir aller chercher l'article via l'id reçu en param
     */
    public function show(Article $article): Response
    {        
        if (!$article) {
            return $this->redirectToRoute("home");
        }

        return $this->render("show/index.html.twig", [
            'article' => $article
        ]);
    }

    /**
     * @Route("/showArticles/{id}", name="show_article")
     * Symfony comprend tout seul qu'il va devoir aller chercher l'article via l'id reçu en param
     */
    public function showArticlesFromCategory(Category $category): Response
    {        
        if (!$category) {
            return $this->redirectToRoute("home");
        }

        // $articles = $this->repoArticle->findByCategory( $category->getId()); je me suis fait chier ! 
        $articles = $category->getArticles()->getValues();
        $categories = $this->repoCategory->findAll();

        return $this->render("home/index.html.twig", [
            'categories' => $categories,
            'articles' => $articles
        ]);
    }
}
