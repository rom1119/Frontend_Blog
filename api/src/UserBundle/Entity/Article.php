<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\ArticleRepository")
 */
abstract class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Title", type="text")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="Content", type="text")
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="Category", type="integer")
     */
    private $category;

    /**
     * @var int
     *
     * @ORM\Column(name="Author", type="integer")
     */
    private $author;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date")
     */
    private $date;

    /**
     * @var array
     *
     * @ORM\Column(name="Tags", type="array", nullable=true)
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var int
     *
     * @ORM\Column(name="Views", type="integer")
     */
    private $views;

    /**
     * @var array
     *
     * @ORM\Column(name="Comments", type="json_array", nullable=true)
     */
    private $comments;

    /**
     * @var int
     *
     * @ORM\Column(name="Likes", type="integer", nullable=true)
     */
    private $likes;

    /**
     * @var int
     *
     * @ORM\Column(name="Unlikes", type="integer", nullable=true)
     */
    private $unlikes;

    /**
     * @var int
     *
     * @ORM\Column(name="Rating", type="integer", nullable=true)
     */
    private $rating;

    /**
     * @var int
     *
     * @ORM\Column(name="Published", type="boolean")
     */
    private $published;


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
     * Set title
     *
     * @param string $title
     * @return Article
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
     * Set content
     *
     * @param string $content
     * @return Article
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
     * Set category
     *
     * @param integer $category
     * @return Article
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return integer 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set author
     *
     * @param integer $author
     * @return Article
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return integer 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Article
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set tags
     *
     * @param array $tags
     * @return Article
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return array 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Article
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set views
     *
     * @param integer $views
     * @return Article
     */
    public function setViews($views)
    {
        $this->views = $views;

        return $this;
    }

    /**
     * Get views
     *
     * @return integer 
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Set comments
     *
     * @param array $comments
     * @return Article
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return array 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set likes
     *
     * @param integer $likes
     * @return Article
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;

        return $this;
    }

    /**
     * Get likes
     *
     * @return integer 
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Set unlikes
     *
     * @param integer $unlikes
     * @return Article
     */
    public function setUnlikes($unlikes)
    {
        $this->unlikes = $unlikes;

        return $this;
    }

    /**
     * Get unlikes
     *
     * @return integer 
     */
    public function getUnlikes()
    {
        return $this->unlikes;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     * @return Article
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
    }
}
