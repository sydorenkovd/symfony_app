<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 26.03.17
 * Time: 20:48
 */

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function homepageAction() {
        $roles = $this->getUser()->getRoles();
        return $this->render('main/homepage.html.twig', ['roles' => $roles]);
    }
}