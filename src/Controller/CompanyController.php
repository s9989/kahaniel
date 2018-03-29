<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\CompanyType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CompanyController extends Controller
{
    /**
     * @param Request $request
     * @Route("/company/new", name="new_company")
     * @return RedirectResponse|Response
     */
    public function new(Request $request)
    {
        $form = $this->createForm(CompanyType::class, new Company());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $company = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($company);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('company/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
