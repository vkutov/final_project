<?php

namespace SoftUniBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * Actor
 *
 * @ORM\Table(name="symbols")
 * @ORM\Entity(repositoryClass="SoftUniBlogBundle\Repository\ActorRepository")
 */
class Symbol
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
     * @ORM\ManyToOne(targetEntity="SoftUniBlogBundle\Entity\User" ,inversedBy="actors")
     *
     */
    private $author;
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var "object"
     *
     * @ORM\Column(name="meaning", type="string",length=65532,  nullable=false)
     */
    private $meaning;
    /**
     * @var Quote[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Quote",cascade={"persist"})
     * @ORM\JoinTable(name="symbols_quotes",
     *     joinColumns={@ORM\JoinColumn(name="symbol_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="quote_id", referencedColumnName="id")}
     * )
     */
    private $quotes;
    /**
     * @var Actor[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Actor", cascade={"persist"})
     * @ORM\JoinTable(name="symbols_actors",
     *     joinColumns={@ORM\JoinColumn(name="symbol_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="actor_id", referencedColumnName="id")}
     * )
     */
    private $actors;
    /**
     * @var Category[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Category",inversedBy="symbols")
     * @ORM\JoinTable(name="symbols_cat",
     *     joinColumns={@ORM\JoinColumn(name="symbol_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="cat_id", referencedColumnName="id")}
     * )
     */
    private $categories;
    /**
     * @var Event[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Event",cascade={"persist"})
     * @ORM\JoinTable(name="symbols_events",
     *     joinColumns={@ORM\JoinColumn(name="symbol_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="event_id", referencedColumnName="id")}
     * )
     */
    private $events;
    /**
     * @var Symbol[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Symbol")
     *  @JoinColumn(name="symbol_id", referencedColumnName="id")
     */
    private $relatedSymbols;
    /**
     * @var string
     */
    private $summary;
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
     * @param string $name
     *
     * @return Symbol
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set meaning
     *
     * @param string $meaning
     *
     * @return Symbol
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
     * @return Symbol
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
     * @return Symbol
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
     * @return Symbol
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
     * @param string $relatedSymbols
     */
    public function setRelatedSymbols($relatedSymbols)
    {
        $this->relatedSymbols = $relatedSymbols;

        return $this;
    }

    /**
     * @return string
     */
    public function getRelatedSymbols()
    {
        return $this->relatedSymbols;
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
    /**
     * @return string
     */
    public function getSummary()
    {
        $this->setSummary();
        return $this->summary;
    }

    public function setSummary()
    {
        if(strlen($this->getMeaning())>80){
            $this->summary = substr($this->getMeaning(), 0,
                    strlen($this->getmeaning()) / 2
                ) . "...";
        }
        else {
            $this->summary = $this->getMeaning();
        }
    }
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * @param Quote[] $actors
     */
    public function setActors($actors)
    {
        $this->actors = $actors;
    }

}

