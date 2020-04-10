<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{

    /**
     * @Route("/", name="content_index", methods={"GET"})
     */
    public function index(ContactRepository $contactRepository): Response
    {
       $contact = $this->getContact();
        return $this->render('contact.html.twig', [
            'contacts' => $contact
        ]);
    }   

     /**
     * @Route("/new", name="contact_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('contact_index');
        }
        return $this->render('contact/new.html.twig', [
            'contact' => $content,
            'form' => $form->createView(),
        ]);
    }
}
