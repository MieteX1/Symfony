<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\ContactFormType;
use Symfony\Component\Routing\Attribute\Route;
use App\VO\Message;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contactMe')]
    public function contact(Request $request): Response
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $message = new Message($data['name'], $data['lastname'], $data['email'], $data['message']);
        }
        return $this->render('contact_form/index.html.twig', ['form' => $form]);
    }
}
