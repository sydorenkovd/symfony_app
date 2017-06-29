<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 26.03.17
 * Time: 13:18
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Genus;
use AppBundle\Entity\GenusNote;
use AppBundle\Service\MarkdownTransformer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class GenusController
 * @package AppBundle\Controller
 * @Security("is_granted('ROLE_USERS')")
 */
class GenusController extends Controller
{
    /**
     * @Route("/genus/new")
     */
    public function newAction()
    {
        $genus = new Genus();
        $genusNote = new GenusNote();
        $genusNote->setGenus($genus);
        $genusNote->setUsername('Heilo');
        $genusNote->setNote('Heilo talk');
        $genusNote->setUserAvatarFilename('Heilo.png');


        $genus->setName('Octopus'.rand(1,100));
        $genus->setSubFamily('Family'.rand(1,100));
        $genus->setSpeciesCount('Speciaes'.rand(1,100));
        $em = $this->getDoctrine()->getManager();
        $em->persist($genus);
        $em->persist($genusNote);
        $em->flush();
        return new Response('<html><body>Genus created</body></html>');
    }

    /**
     * @Route("/genus", name="listGenus")
     */
    public function listAction() {
        $em = $this->getDoctrine()->getManager();
        $genuses = $em->getRepository('AppBundle:Genus')->findAllPublishedOrderedByRecentActive();
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

        $transformer = $this->get('app.markdown_transformer');
        $fact = $transformer->parse($genus->getFact());
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
        
        $recentNotes = $this->getDoctrine()->getRepository('AppBundle:GenusNote')
            ->findAllRecentNotesForGenus($genus);
        return $this->render('genus/show.html.twig', [
            'genus' => $genus,
            'fact' => $fact,
            'recentNotesCount' => count($recentNotes)
        ]);
    }

    /**
     * @Route("/genus/{name}/notes", name="genus_notes")
     * @Method("GET")
     */
    public function getNotesAction(Genus $genus)
    {
        $notes = [];
        foreach ($genus->getNotes() as $note) {
            $notes[] = [
                'id' => $note->getId(),
                'username' => $note->getUsername(),
                'note' => $note->getNote(),
            ];
        }
        $data = [
            'notes' => $notes
        ];
        return new JsonResponse($data);
    }

}