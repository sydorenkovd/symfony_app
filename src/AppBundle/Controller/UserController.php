<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 29.06.17
 * Time: 22:36
 */

namespace AppBundle\Controller;


use AppBundle\FormType\UserRegistrationForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/register", name="user_register")
     */
    public function registerAction(Request $request){
        $form = $this->createForm(UserRegistrationForm::class);

        $form->handleRequest($request);
        if($form->isValid()) {
            $user = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'Welcome ' . $user->getEmail());
        }





        return $this->render('user/register.html.twig', ['form' => $form->createView()]);
    }
}