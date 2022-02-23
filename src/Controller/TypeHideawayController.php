<?php

namespace App\Controller;

use App\Entity\TypeHideaway;
use App\Form\TypeHideawayType;
use App\Repository\TypeHideawayRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TypeHideawayController extends AbstractController
{
    /**
     * @Route("/admin/type/hideaway/", name="type_hideaway_index", methods={"GET"})
     */
    public function index(TypeHideawayRepository $typeHideawayRepository): Response
    {
        return $this->render('type_hideaway/index.html.twig', [
            'type_hideaways' => $typeHideawayRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin/type/hideaway/new", name="type_hideaway_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $typeHideaway = new TypeHideaway();
        $form = $this->createForm(TypeHideawayType::class, $typeHideaway);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($typeHideaway);
            $entityManager->flush();

            return $this->redirectToRoute('type_hideaway_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_hideaway/new.html.twig', [
            'type_hideaway' => $typeHideaway,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/admin/type/hideaway/{id}", name="type_hideaway_show", methods={"GET"})
     */
    public function show(TypeHideaway $typeHideaway): Response
    {
        return $this->render('type_hideaway/show.html.twig', [
            'type_hideaway' => $typeHideaway,
        ]);
    }

    /**
     * @Route("/admin/type/hideaway/{id}/edit", name="type_hideaway_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, TypeHideaway $typeHideaway, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TypeHideawayType::class, $typeHideaway);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('type_hideaway_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_hideaway/edit.html.twig', [
            'type_hideaway' => $typeHideaway,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/admin/type/hideaway/{id}", name="type_hideaway_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeHideaway $typeHideaway, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeHideaway->getId(), $request->request->get('_token'))) {
            $entityManager->remove($typeHideaway);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_hideaway_index', [], Response::HTTP_SEE_OTHER);
    }
}
