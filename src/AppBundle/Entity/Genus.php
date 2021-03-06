<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 26.03.17
 * Time: 21:05
 */

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GenusRepository")
 * @ORM\Table(name="genus")
 */
class Genus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="GenusNote", mappedBy="genus")
     * @ORM\OrderBy({"createdAt"="DESC"})
     */
    private $notes;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */ 
    public function getNotes()
    {
        return $this->notes;
    }
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SubFamily")
     * @ORM\Column(type="string")
     */
    private $subFamily;
    /**
     * @ORM\Column(type="string")
     */
    private $speciesCount;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $fact;
    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished = true;

    /**
     * @return mixed
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * @param mixed $isPublished
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;
    }
    /**
     * @return mixed
     */
    public function getSubFamily()
    {
        return $this->subFamily;
    }

    /**
     * @param mixed $subFamily
     */
    public function setSubFamily($subFamily)
    {
        $this->subFamily = $subFamily;
    }

    /**
     * @return mixed
     */
    public function getSpeciesCount()
    {
        return $this->speciesCount;
    }

    /**
     * @param mixed $speciesCount
     */
    public function setSpeciesCount($speciesCount)
    {
        $this->speciesCount = $speciesCount;
    }

    /**
     * @return mixed
     */
    public function getFact()
    {
        return "**test** " . $this->fact;
    }

    /**
     * @param mixed $fact
     */
    public function setFact($fact)
    {
        $this->fact = $fact;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getUpdateAt() {
        return date('Y-m-d H:i:s', rand(1490056209, 1490556209));
    }
}