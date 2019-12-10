<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     *
     * @param Request             $request
     * @param AuthenticationUtils $authenticationUtils
     *
     * @return RedirectResponse|Response
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('home');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        return $this->redirect($this->generateUrl('login'));
    }

    /**
     * @Route("/register", name="register")
     *
     * @param Request                      $request
     * @param UserPasswordEncoderInterface $encoder
     *
     * @return RedirectResponse|Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $form = $this->createForm(RegisterType::class, new User());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();
            $user->hashPassword($encoder);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('login');
        }

        return $this->render('security/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
