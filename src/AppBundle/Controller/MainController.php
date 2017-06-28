<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 26.03.17
 * Time: 20:48
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function homepageAction() {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find(1);
        $user->setPassword('ilike');
        $em->persist($user);
        $em->flush();
        return $this->render('main/homepage.html.twig');
    }
}