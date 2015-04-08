<?php

namespace Meublaviz\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meuble
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Meublaviz\CoreBundle\Entity\MeubleRepository")
 */
class Meuble
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $photo;

     /**
     *
     * @ORM\ManyToMany(targetEntity="Meublaviz\CoreBundle\Entity\Tag", inversedBy="meuble")
     *
     */
    private $tag;

    /**
    * @ORM\ManyToMany(targetEntity="Meublaviz\CoreBundle\Entity\Demenagement", inversedBy="meuble")
    */
    private $demenagement; 


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Meuble
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
     * Set description
     *
     * @param string $description
     * @return Meuble
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
        $this->demenagement = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set photo
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $photo
     * @return Meuble
     */
    public function setPhoto(\Application\Sonata\MediaBundle\Entity\Media $photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Add tag
     *
     * @param \Meublaviz\CoreBundle\Entity\Tag $tag
     * @return Meuble
     */
    public function addTag(\Meublaviz\CoreBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Meublaviz\CoreBundle\Entity\Tag $tag
     */
    public function removeTag(\Meublaviz\CoreBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Add demenagement
     *
     * @param \Meublaviz\CoreBundle\Entity\Demenagement $demenagement
     * @return Meuble
     */
    public function addDemenagement(\Meublaviz\CoreBundle\Entity\Demenagement $demenagement)
    {
        $this->demenagement[] = $demenagement;

        return $this;
    }

    /**
     * Remove demenagement
     *
     * @param \Meublaviz\CoreBundle\Entity\Demenagement $demenagement
     */
    public function removeDemenagement(\Meublaviz\CoreBundle\Entity\Demenagement $demenagement)
    {
        $this->demenagement->removeElement($demenagement);
    }

    /**
     * Get demenagement
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDemenagement()
    {
        return $this->demenagement;
    }
}
