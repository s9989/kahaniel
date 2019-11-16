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
 * @Route("/panel")
 */
class DocumentController extends AbstractController
{
    /**
     * @param Request $request
     * @Route("/document/new/profit", name="new_profit")
     * @return RedirectResponse|Response
     */
    public function newProfit(Request $request)
    {
        return $this->new($request, Document::PROFIT_TYPE);
    }

    /**
     * @param Request $request
     * @Route("/document/new/cost", name="new_cost")
     * @return RedirectResponse|Response
     */
    public function newCost(Request $request)
    {
        return $this->new($request, Document::COST_TYPE);
    }

    /**
     * @param Request $request
     * @param $type
     *
     * @return RedirectResponse|Response
     */
    private function new(Request $request, $type)
    {
        $document = new Document();
        $document->setType($type);
        $form = $this->createForm(DocumentType::class, $document);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $document = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($document);
            $entityManager->flush();

            return $this->redirectToRoute($type == Document::PROFIT_TYPE ? 'profit_documents' : 'cost_documents');
        }

        return $this->render('document/new.html.twig', [
            'form' => $form->createView(),
            'type' => $type,
        ]);
    }

    /**
     * @param Request $request
     * @Route("/document/edit/{id}", name="edit_document")
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

            return $this->redirectToRoute($document->getType() == Document::PROFIT_TYPE ? 'profit_documents' : 'cost_documents');
        }

        return $this->render('document/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @Route("/document/show/{id}", name="show_document")
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
            'type' => $document->getType(),
        ]);
    }

    /**
     * @param Request $request
     * @Route("/document/delete/{id}", name="delete_document")
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $document = $entityManager->getRepository(Document::class)->find($request->get('id'));

        $type = $document->getType();

        $entityManager->remove($document);
        $entityManager->flush();

        return $this->redirectToRoute($type == Document::PROFIT_TYPE ? 'profit_documents' : 'cost_documents');
    }

    /**
     * @param int $type
     * @return Response
     */
    private function list($type)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $documents = $entityManager->getRepository(Document::class)->findBy(['type' => $type]);

        return $this->render('document/list.html.twig', [
            'collection' => DocumentRepository::groupByMonth($documents),
            'type' => $type,
        ]);
    }

    /**
     * @Route("/document/list/profits", name="profit_documents")
     * @return Response
     */
    public function listProfits()
    {
        return $this->list(Document::PROFIT_TYPE);
    }

    /**
     * @Route("/document/list/costs", name="cost_documents")
     * @return Response
     */
    public function listCosts()
    {
        return $this->list(Document::COST_TYPE);
    }
}
