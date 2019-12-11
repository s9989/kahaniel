<?php

namespace App\Controller;

use App\Entity\Document;
use App\Form\DocumentType;
use App\Repository\DocumentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/panel/document")
 */
class DocumentController extends AbstractController
{
    /**
     * @param Request $request
     * @Route("/new", name="new_document")
     *
     * @return RedirectResponse|Response
     */
    public function new(Request $request)
    {
        $document = new Document();
        $form = $this->createForm(DocumentType::class, $document);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $document = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($document);
            $entityManager->flush();

            return $this->redirectToRoute('documents');
        }

        return $this->render('document/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @Route("/edit/{id}", name="edit_document")
     * @return RedirectResponse|Response
     */
    public function edit(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $document = $entityManager->getRepository(Document::class)->find($request->get('id'));

        $form = $this->createForm(DocumentType::class, $document);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $document = $form->getData();

            $entityManager->persist($document);
            $entityManager->flush();

            return $this->redirectToRoute('documents');
        }

        return $this->render('document/edit.html.twig', [
            'form' => $form->createView(),
            'document' => $document,
        ]);
    }

    /**
     * @param Request $request
     * @Route("/show/{id}", name="show_document")
     * @return Response
     *
     * @throws NotFoundHttpException
     */
    public function show(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $document = $entityManager->getRepository(Document::class)->find($request->get('id'));

        if (!$document) {
            throw $this->createNotFoundException();
        }

        return $this->render('document/show.html.twig', [
            'document' => $document,
        ]);
    }

    /**
     * @param Request $request
     * @Route("/delete/{id}", name="delete_document")
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $document = $entityManager->getRepository(Document::class)->find($request->get('id'));

        $entityManager->remove($document);
        $entityManager->flush();

        return $this->redirectToRoute('documents');
    }

    /**
     * @Route("/list", name="documents")
     * @return Response
     */
    public function list()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $documents = $entityManager->getRepository(Document::class)->findAll();

        return $this->render('document/list.html.twig', [
            'collection' => DocumentRepository::groupByMonth($documents),
        ]);
    }

}
