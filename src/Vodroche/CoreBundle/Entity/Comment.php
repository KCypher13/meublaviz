<?php

namespace Vodroche\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Comment
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
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="Vodroche\CoreBundle\Entity\Video", inversedBy="comment")
     * @ORM\JoinColumn(nullable=false)
     */
    private $video;



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
     * Set content
     *
     * @param string $content
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set video
     *
     * @param \Vodroche\CoreBundle\Entity\Video $video
     * @return Comment
     */
    public function setVideo(\Vodroche\CoreBundle\Entity\Video $video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return \Vodroche\CoreBundle\Entity\Video 
     */
    public function getVideo()
    {
        return $this->video;
    }
}
