<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Form\InvoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class InvoiceController extends Controller
{
    /**
     * @param Request $request
     * @Route("/invoice/new", name="new_invoice")
     * @return RedirectResponse|Response
     */
    public function new(Request $request)
    {
        $form = $this->createForm(InvoiceType::class, new Invoice());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $invoice = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($invoice);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('invoice/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
