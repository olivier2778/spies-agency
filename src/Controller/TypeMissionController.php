<?php

namespace App\Controller;

use App\Entity\TypeMission;
use App\Form\TypeMissionType;
use App\Repository\TypeMissionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TypeMissionController extends AbstractController
{
    /**
     * @Route("/type/mission/", name="type_mission_index", methods={"GET"})
     */
    public function index(TypeMissionRepository $typeMissionRepository): Response
    {
        return $this->render('type_mission/index.html.twig', [
            'type_missions' => $typeMissionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin/type/mission/new", name="type_mission_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $typeMission = new TypeMission();
        $form = $this->createForm(TypeMissionType::class, $typeMission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($typeMission);
            $entityManager->flush();

            return $this->redirectToRoute('type_mission_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_mission/new.html.twig', [
            'type_mission' => $typeMission,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/type/mission/{id}", name="type_mission_show", methods={"GET"})
     */
    public function show(TypeMission $typeMission): Response
    {
        return $this->render('type_mission/show.html.twig', [
            'type_mission' => $typeMission,
        ]);
    }

    /**
     * @Route("/admin/type/mission/{id}/edit", name="type_mission_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, TypeMission $typeMission, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TypeMissionType::class, $typeMission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('type_mission_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_mission/edit.html.twig', [
            'type_mission' => $typeMission,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/admin/type/mission/{id}", name="type_mission_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeMission $typeMission, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeMission->getId(), $request->request->get('_token'))) {
            $entityManager->remove($typeMission);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_mission_index', [], Response::HTTP_SEE_OTHER);
    }
}
