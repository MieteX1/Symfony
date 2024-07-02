<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\AboutMeInfoType;
use App\Form\ArticleType;
use App\Repository\AboutMeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Services\AboutMeProvider;
use App\Services\ArticlesProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ArticleRepository;

class AboutMeController extends AbstractController
{
    public function __construct (
        private AboutMeProvider $aboutMe,
        private AboutMeRepository $repo)
    {

    }
    #[Route('/aboutMe', name: 'aboutMe', methods: ['GET'])]
    public function main(): Response
    {
        $form = $this->createForm(AboutMeInfoType::class);
        $dane = [];
        $info = $this->repo->findAll();
        if (count($info) > 0) {
            $dane = $this->aboutMe->transformAboutData($info);
        }
        return $this->render('about_me/index.html.twig', ['info' => $dane['info'], 'form' => $form]);
    }
    #[Route('/aboutMe', name: 'AddaboutMe', methods: ['POST'])]
    public function add(Request $request): Response
    {
        $form = $this->createForm(AboutMeInfoType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newData = $form->getData();
            $this->repo->insert($newData);
            return $this->redirectToRoute('aboutMe');
        }
        return new Response(null, Response::HTTP_BAD_REQUEST);
    }

}
