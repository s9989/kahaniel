<?php

namespace App\Controller;

use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository(User::class)->findOneBy([]);

        if (!$user) {

            $user = new User();
            $user->setEmail($request->get('email', 'admin@example.local'));
            $user->setUsername($request->get('username', 'admin'));
            $user->setDiscount($request->get('discount', true));
            $user->setStartDate($request->get('start_date', null));

            $password = $request->get('password', 'admin');
            $password = $encoder->encodePassword($user, $password);

            $user->setPassword($password);

            $em->persist($user);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('home'));
    }
}
