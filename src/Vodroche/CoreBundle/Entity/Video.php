<?php

namespace Vodroche\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vodroche\CoreBundle\Entity\VideoRepository")
 */
class Video
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="speaker", type="string", length=255)
     */
    private $speaker;

    /**
     * @var string
     *
     * @ORM\Column(name="duration", type="string")
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text")
     */
    private $summary;

    /**
     * @var array
     *
     * @ORM\Column(name="note", type="array", nullable=true)
     */
    private $note;

     /**
     * @var text
     *
     * @ORM\Column(name="video", type="text")
     */
    private $video;

    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $thumbnail;

     /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $pdf;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Vodroche\CoreBundle\Entity\Categorie", inversedBy="video")
     *
     */
    private $categorie;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Vodroche\CoreBundle\Entity\Region", inversedBy="video")
     *
     */
    private $region;

    /**
    * @ORM\OneToMany(targetEntity="Vodroche\CoreBundle\Entity\Comment", mappedBy="video")
    */
    private $comments; 


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }


    public function __toString(){
        return $this->getTitle();
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Video
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set speaker
     *
     * @param string $speaker
     * @return Video
     */
    public function setSpeaker($speaker)
    {
        $this->speaker = $speaker;

        return $this;
    }

    /**
     * Get speaker
     *
     * @return string 
     */
    public function getSpeaker()
    {
        return $this->speaker;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     * @return Video
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return Video
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set thumbnail
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $thumbnail
     * @return Video
     */
    public function setThumbnail(\Application\Sonata\MediaBundle\Entity\Media $thumbnail = null)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Get thumbnail
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Set video
     *
     * @param string $video
     * @return Video
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return string 
     */
    public function getVideo()
    {
        return $this->video;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorie = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add categorie
     *
     * @param \Vodroche\CoreBundle\Entity\Categorie $categorie
     * @return Video
     */
    public function addCategorie(\Vodroche\CoreBundle\Entity\Categorie $categorie)
    {
        $this->categorie[] = $categorie;

        return $this;
    }

    /**
     * Remove categorie
     *
     * @param \Vodroche\CoreBundle\Entity\Categorie $categorie
     */
    public function removeCategorie(\Vodroche\CoreBundle\Entity\Categorie $categorie)
    {
        $this->categorie->removeElement($categorie);
    }

    /**
     * Get categorie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set pdf
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $pdf
     * @return Video
     */
    public function setPdf(\Application\Sonata\MediaBundle\Entity\Media $pdf = null)
    {
        $this->pdf = $pdf;

        return $this;
    }

    /**
     * Get pdf
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getPdf()
    {
        return $this->pdf;
    }

    /**
     * Set region
     *
     * @param \Vodroche\CoreBundle\Entity\Region $region
     * @return Video
     */
    public function setRegion(\Vodroche\CoreBundle\Entity\Region $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \Vodroche\CoreBundle\Entity\Region 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Add region
     *
     * @param \Vodroche\CoreBundle\Entity\Region $region
     * @return Video
     */
    public function addRegion(\Vodroche\CoreBundle\Entity\Region $region)
    {
        $this->region[] = $region;

        return $this;
    }

    /**
     * Remove region
     *
     * @param \Vodroche\CoreBundle\Entity\Region $region
     */
    public function removeRegion(\Vodroche\CoreBundle\Entity\Region $region)
    {
        $this->region->removeElement($region);
    }

    /**
     * Set note
     *
     * @param array $note
     * @return Video
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return array 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Add comments
     *
     * @param \Vodroche\CoreBundle\Entity\Comment $comments
     * @return Video
     */
    public function addComment(\Vodroche\CoreBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Vodroche\CoreBundle\Entity\Comment $comments
     */
    public function removeComment(\Vodroche\CoreBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
