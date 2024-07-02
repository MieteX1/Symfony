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

class AboutMePageController extends AbstractController
{
    public function __construct (
        private AboutMeProvider $aboutMeProvider,
        private AboutMeRepository $aboutMeRepository)
    {

    }
    #[Route('/about-me', name: 'aboutMeMain', methods: ['GET'])]
    public function index(): Response
    {
        $form = $this->createForm(AboutMeInfoType::class);
        $data = [];
        $info = $this->aboutMeRepository->findAll();
        if (count($info) > 0) {
            $data = $this->aboutMeProvider->transformAboutData($info);
        }
        return $this->render('about_me_page/index.html.twig', ['info' => $data['info'], 'form' => $form]);
    }
    #[Route('/about-me', name: 'aboutMeAdd', methods: ['POST'])]
    public function addNew(Request $request): Response
    {
        $form = $this->createForm(AboutMeInfoType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newInfo = $form->getData();
            $this->aboutMeRepository->insert($newInfo);
            return $this->redirectToRoute('aboutMeMain');
        }
        return new Response(null, Response::HTTP_BAD_REQUEST);
    }

}
