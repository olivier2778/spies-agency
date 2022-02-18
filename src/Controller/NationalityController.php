<?php

namespace App\Controller;

use App\Entity\Nationality;
use App\Form\NationalityType;
use App\Repository\NationalityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class NationalityController extends AbstractController
{
    /**
     * @Route("/nationality/", name="nationality_index", methods={"GET"})
     */
    public function index(NationalityRepository $nationalityRepository): Response
    {
        return $this->render('nationality/index.html.twig', [
            'nationalities' => $nationalityRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin/nationality/new", name="nationality_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $nationality = new Nationality();
        $form = $this->createForm(NationalityType::class, $nationality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($nationality);
            $entityManager->flush();

            return $this->redirectToRoute('nationality_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nationality/new.html.twig', [
            'nationality' => $nationality,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/nationality/{id}", name="nationality_show", methods={"GET"})
     */
    public function show(Nationality $nationality): Response
    {
        return $this->render('nationality/show.html.twig', [
            'nationality' => $nationality,
        ]);
    }

    /**
     * @Route("/admin/nationality/{id}/edit", name="nationality_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Nationality $nationality, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NationalityType::class, $nationality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('nationality_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nationality/edit.html.twig', [
            'nationality' => $nationality,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/admin/nationality/{id}", name="nationality_delete", methods={"POST"})
     */
    public function delete(Request $request, Nationality $nationality, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nationality->getId(), $request->request->get('_token'))) {
            $entityManager->remove($nationality);
            $entityManager->flush();
        }

        return $this->redirectToRoute('nationality_index', [], Response::HTTP_SEE_OTHER);
    }
}
