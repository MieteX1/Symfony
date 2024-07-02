<?php

namespace App\Controller;
use App\Services\ArticleProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

class MainPageController extends AbstractController
{
    public function __construct (
        private ArticleProvider $articleProvider,
        private ArticleRepository $articleRepository)
    {
        
    }
    #[Route('/', name: 'mainPage')]
    public function index(): Response
    {
        $latestArticle = $this->articleRepository->getLastArticle();
        if ($latestArticle) {
            $latestArticle = $this->articleProvider->provideArticleData($latestArticle);
        }
        return $this->render('main_page/index.html.twig', ['article' => $latestArticle]);
    }
}
