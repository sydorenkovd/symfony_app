<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 26.03.17
 * Time: 22:53
 */
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Genus;

class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $em)
    {
        $genus = new Genus();
        $genus->setName('Octopus'.rand(1,100));
        $genus->setSubFamily('Family'.rand(1,100));
        $genus->setSpeciesCount('Speciaes'.rand(1,100));
        $em->persist($genus);
        $em->flush();
    }
}