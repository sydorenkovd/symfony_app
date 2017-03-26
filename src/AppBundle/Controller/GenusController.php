<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 26.03.17
 * Time: 13:18
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Genus;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GenusController extends Controller
{
    /**
     * @Route("/genus/new")
     */
    public function newAction()
    {
        $genus = new Genus();
        $genus->setName('Octopus'.rand(1,100));
        $genus->setSubFamily('Family'.rand(1,100));
        $genus->setSpeciesCount('Speciaes'.rand(1,100));
        $em = $this->getDoctrine()->getManager();
        $em->persist($genus);
        $em->flush();
        return new Response('<html><body>Genus created</body></html>');
    }

    /**
     * @Route("/genus")
     */
    public function listAction() {
        $em = $this->getDoctrine()->getManager();
        $genuses = $em->getRepository('AppBundle:Genus')->findAllPublishedOrderedBySize();
        return $this->render('genus/list.html.twig', compact('genuses'));
    }
    /**
     * @Route("/genus/{genusName}", name="genus_show")
     */
    public function showAction($genusName)
    {
        $genus = $this->getDoctrine()->getRepository('AppBundle:Genus')->findOneBy(['name' => $genusName]);
        if(!$genus) {
            throw $this->createNotFoundException('No genus found');
        }
        $fact = "fact is quete *important* for us";
        $fact = $this->get('markdown.parser')->transform($fact);
//        $cahe = $this->get('doctrine_cache.providers.my_markdown_cache');
//        $key = md5($fact);
//        if ($cahe->contains($key)) {
//            $fact = $cahe->fetch($key);
//        } else {
//            sleep(1);
//            $fact = $this->get('markdown.parser')->transform($fact);
//            $cahe->save($key, $fact);
//        }
        $this->get('logger')->info('Showing genus'. $genusName);
        return $this->render('genus/show.html.twig', [
            'genus' => $genus
        ]);
    }

    /**
     * @Route("/genus/{genusName}/notes", name="genus_notes")
     * @Method("GET")
     */
    public function getNotesAction()
    {
        $notes = [
            ['id' => 1, 'username' => 'Sydorenkovd'],
            ['id' => 2, 'username' => 'Sydorenkovd2'],
            ['id' => 3, 'username' => 'Sydorenkovd3'],
        ];
        $data = [
            'notes' => $notes
        ];
        return new JsonResponse($data);
    }

}