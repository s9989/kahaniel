<?php

namespace App\Controller;

use App\Entity\Document;
use App\Entity\Position;
use App\Form\PositionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/panel/position")
 */
class PositionController extends AbstractController
{

    /**
     * @param Request $request
     * @Route("/show/{id}", name="show_position")
     * @return Response
     *
     * @throws NotFoundHttpException
     */
    public function show(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $position = $entityManager->getRepository(Position::class)->find($request->get('id'));

        if (!$position) {
            throw $this->createNotFoundException();
        }

        return $this->render('position/show.html.twig', [
            'position' => $position,
            'document' => $position->getDocument(),
        ]);
    }


    /**
     * @param Request $request
     * @Route("/new/{document_id}", name="new_position")
     * @return RedirectResponse|Response
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $document = $entityManager->getRepository(Document::class)->find($request->get('document_id'));

        if (!$document) {
            throw $this->createNotFoundException();
        }

        $form = $this->createForm(PositionType::class, new Position());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $position = $form->getData();
            $position->setDocument($document);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($position);
            $entityManager->flush();

            $this->addFlash('success', 'Dodano nową pozycję');
            return $this->redirectToRoute('positions', ['document_id' => $position->getDocument()->getId() ]);
        }

        return $this->render('position/new.html.twig', [
            'form' => $form->createView(),
            'document' => $document,
        ]);
    }

    /**
     * @param Request $request
     * @Route("/edit/{id}", name="edit_position")
     * @return RedirectResponse|Response
     */
    public function edit(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $position = $entityManager->getRepository(Position::class)->find($request->get('id'));

        $form = $this->createForm(PositionType::class, $position);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $position = $form->getData();

            $entityManager->persist($position);
            $entityManager->flush();

            $this->addFlash('success', 'Zapisano zmiany');
            return $this->redirectToRoute('positions', ['document_id' => $position->getDocument()->getId() ]);
        }

        return $this->render('position/edit.html.twig', [
            'form' => $form->createView(),
            'position' => $position,
            'document' => $position->getDocument(),
        ]);
    }

    /**
     * @param Request $request
     * @Route("/delete/{id}", name="delete_position")
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $position = $entityManager->getRepository(Position::class)->find($request->get('id'));

        $documentId = $position->getDocument()->getId();

        $entityManager->remove($position);
        $entityManager->flush();

        $this->addFlash('error', 'Usunięto pozycję');
        return $this->redirectToRoute('positions', ['document_id' => $documentId ]);
    }

    /**
     * @param Request $request
     * @Route("/list/{document_id}", name="positions")
     * @return Response
     */
    public function list(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $document = $entityManager->getRepository(Document::class)->find($request->get('document_id'));

        if (!$document) {
            throw $this->createNotFoundException();
        }

        $positions = $entityManager->getRepository(Position::class)->findByDocument($document);

        return $this->render('position/list.html.twig', [
            'positions' => $positions,
            'document' => $document,
        ]);
    }
}
