<?php

namespace Blog\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity
 */
class Comment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * @var Post
     *
     * @ORM\ManyToOne(targetEntity="Post")
     */
    private $postId;



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content.
     *
     * @param string $content
     *
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set postId.
     *
     * @param Post $postId
     *
     * @return Comment
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;
    
        return $this;
    }

    /**
     * Get postId.
     *
     * @return Post
     */
    public function getPostId()
    {
        return $this->postId;
    }
}
