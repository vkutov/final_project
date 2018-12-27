<?php

namespace SoftUniBlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Actor
 *
 * @ORM\Table(name="actors")
 * @ORM\Entity(repositoryClass="SoftUniBlogBundle\Repository\ActorRepository")
 */
class Actor
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
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="SoftUniBlogBundle\Entity\User", inversedBy="quotes")
     *
     */
    private $author;
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="meaning", type="string", length=255, nullable=true)
     */
    private $meaning;
    /**
     * @var Quote[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Quote",inversedBy="actors")
     * @ORM\JoinTable(name="actors_quotes",
     *     joinColumns={@ORM\JoinColumn(name="actor_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="quote_id", referencedColumnName="id")}
     * )
     */

    private $quotes;

    /**
     * @var ArrayCollection|Quote[]
     *
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Event", mappedBy="author")
     */
    private $events;

    /**
     * @var ArrayCollection|Quote[]
     *
     * @ORM\OneToMany(targetEntity="SoftUniBlogBundle\Entity\Quote", mappedBy="author")
     */
    private $categories;
    /**
     * @var string
     * @ORM\Column(name="relatedActors")
     */
    private $relatedActors;
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", nullable=true)
     */
    private $image;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Actor
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
     * Set meaning
     *
     * @param string $meaning
     *
     * @return Actor
     */
    public function setMeaning($meaning)
    {
        $this->meaning = $meaning;

        return $this;
    }

    /**
     * Get meaning
     *
     * @return string
     */
    public function getMeaning()
    {
        return $this->meaning;
    }

    /**
     * Set strifes
     *
     * @param array $quotes
     *
     * @return Actor
     */
    public function setQuotes($quotes)
    {
        $this->quotes = $quotes;

        return $this;
    }

    /**
     * Get strifes
     *
     * @return array
     */
    public function getQuotes()
    {
        return $this->quotes;
    }

    /**
     * Set holidays
     *
     * @param array $events
     *
     * @return Actor
     */
    public function setEvents($events)
    {
        $this->events = $events;

        return $this;
    }

    /**
     * Get holidays
     *
     * @return array
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Set categories
     *
     * @param array $categories
     *
     * @return Actor
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get categories
     *
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param string $relatedActors
     */
    public function setRelatedActors($relatedActors)
    {
        $this->relatedActors = $relatedActors;

        return $this;
    }

    /**
     * @return string
     */
    public function getRelatedActors()
    {
        return $this->relatedActors;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param User $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }
}

