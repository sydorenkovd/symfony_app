<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NewTable
 *
 * @ORM\Table(name="new_table")
 * @ORM\Entity
 */
class NewTable
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="genus_id", type="integer", nullable=true)
     */
    private $genusId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return NewTable
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set genusId
     *
     * @param integer $genusId
     *
     * @return NewTable
     */
    public function setGenusId($genusId)
    {
        $this->genusId = $genusId;

        return $this;
    }

    /**
     * Get genusId
     *
     * @return integer
     */
    public function getGenusId()
    {
        return $this->genusId;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
