<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Culture;
use App\Form\CultureType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/cultures')]
class CultureController extends AbstractController
{
    #[Route('', name: 'culture_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $cultures = $entityManager->getRepository(Culture::class)->findBy([], ['id' => 'DESC']);

        return $this->render('culture/index.html.twig', [
            'cultures' => $cultures,
        ]);
    }

    #[Route('/new', name: 'culture_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $culture = new Culture();
        $form = $this->createForm(CultureType::class, $culture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($culture);
            $entityManager->flush();

            return $this->redirectToRoute('culture_index');
        }

        return $this->render('culture/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'culture_show', methods: ['GET'])]
    public function show(Culture $culture): Response
    {
        return $this->render('culture/show.html.twig', [
            'culture' => $culture,
        ]);
    }

    #[Route('/{id}/edit', name: 'culture_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Culture $culture, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CultureType::class, $culture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('culture_index');
        }

        return $this->render('culture/edit.html.twig', [
            'culture' => $culture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'culture_delete', methods: ['POST'])]
    public function delete(Request $request, Culture $culture, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete_culture_'.$culture->getId(), (string) $request->request->get('_token'))) {
            $entityManager->remove($culture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('culture_index');
    }
}
