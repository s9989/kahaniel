<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\CompanyType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/panel/company")
 */
class CompanyController extends AbstractController
{

    /**
     * @param Request $request
     * @Route("/show/{id}", name="show_company")
     * @return Response
     *
     * @throws NotFoundHttpException
     */
    public function show(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $company = $entityManager->getRepository(Company::class)->find($request->get('id'));

        if (!$company) {
            throw $this->createNotFoundException();
        }

        return $this->render('company/show.html.twig', [
            'company' => $company,
        ]);
    }


    /**
     * @param Request $request
     * @Route("/new", name="new_company")
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

            $this->addFlash('success', 'Dodano nową firmę');
            return $this->redirectToRoute('companies');
        }

        return $this->render('company/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @Route("/edit/{id}", name="edit_company")
     * @return RedirectResponse|Response
     */
    public function edit(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $company = $entityManager->getRepository(Company::class)->find($request->get('id'));

        $form = $this->createForm(CompanyType::class, $company);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $company = $form->getData();

            $entityManager->persist($company);
            $entityManager->flush();

            $this->addFlash('success', 'Zapisano zmiany');
            return $this->redirectToRoute('companies');
        }

        return $this->render('company/edit.html.twig', [
            'form' => $form->createView(),
            'company' => $company,
        ]);
    }

    /**
     * @param Request $request
     * @Route("/delete/{id}", name="delete_company")
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $company = $entityManager->getRepository(Company::class)->find($request->get('id'));

        $entityManager->remove($company);
        $entityManager->flush();

        $this->addFlash('error', 'Usunięto firmę');
        return $this->redirectToRoute('companies');
    }

    /**
     * @param Request $request
     * @Route("/list", name="companies")
     * @return Response
     */
    public function list(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $companies = $entityManager->getRepository(Company::class)->findAll();

        return $this->render('company/list.html.twig', [
            'companies' => $companies
        ]);
    }
}
