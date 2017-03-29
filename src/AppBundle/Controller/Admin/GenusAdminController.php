<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 29.03.17
 * Time: 21:25
 */

namespace AppBundle\Controller\Admin;

use AppBundle\FormType\GenusFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class GenusAdminController
 * @package AppBundle\Controller\Admin
 * @Route("/admin")
 */
class GenusAdminController extends Controller
{
    /**
     * @Route("/genus", name="genus_admin_index")
     */
    public function indexAction() {

    }
    /**
     * @Route("/genus/new", name="new_admin_genus")
     */
    public function newAction()
    {
        $form = $this->createForm(GenusFormType::class);
        return $this->render('admin/genus/new.html.twig', [
            'genusForm' => $form->createView()
        ]);
    }
}