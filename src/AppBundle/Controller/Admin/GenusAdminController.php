<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 29.03.17
 * Time: 21:25
 */

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Genus;
use AppBundle\FormType\GenusFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
    public function newAction(Request $request)
    {

        $form = $this->createForm(GenusFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $genus = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($genus);
            $em->flush();

            $this->addFlash('success', 'Genus created');
            return $this->redirectToRoute('new_admin_genus');
        }
        return $this->render('admin/genus/new.html.twig', [
            'genusForm' => $form->createView()
        ]);
    }
}