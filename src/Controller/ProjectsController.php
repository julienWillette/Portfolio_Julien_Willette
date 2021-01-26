<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use App\Repository\ProjectsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/")
 */
class ProjectsController extends AbstractController
{
    /**
     * @Route("/", name="project_index", methods={"GET", "POST"})
     */
    public function index(ProjectsRepository $projectsRepository, Request $request): Response
    {
        $contact = new Contact();
        $contactForm = $this->createForm(ContactFormType::class, $contact);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
        }
        return $this->render('projects/index.html.twig', [
            'contact' => $contact,
            'contactForm' => $contactForm->createView(),
            'projects' => $projectsRepository->findAll(),
        ]);
    }
}