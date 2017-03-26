<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 26.03.17
 * Time: 13:18
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GenusController extends Controller
{
    /**
     * @Route("/genus/{genusName}")
     */
    public function showAction($genusName)
    {
       $fact = "fact is quete *important* for us";
        $fact = $this->get('markdown.parser')->transform($fact);
        $cahe = $this->get('doctrine_cache.providers.my_markdown_cache');
        $key = md5($fact);
        if($cahe->contains($key)) {
            $fact = $cahe->fetch($key);
        } else {
            sleep(1);
            $fact = $this->get('markdown.parser')->transform($fact);
            $cahe->save($key, $fact);
        }
        return $this->render('genus/show.html.twig', [
            'name' => $genusName,
            'fact' => $fact
        ]);
    }

    /**
     * @Route("/genus/{genusName}/notes", name="genus_notes")
     * @Method("GET")
     */
    public function getNotesAction() {
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