<?php

namespace SoftUniBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * Event
 *
 * @ORM\Table(name="events")
 * @ORM\Entity(repositoryClass="SoftUniBlogBundle\Repository\EventRepository")
 */
class Event
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
     * @ORM\Column(name="title", type="string", length=50)
     */
    private $title;

    /**
     * @var "object"
     *
     * @ORM\Column(name="meaning", type="string",length=65532, nullable=false)
     */
    private $meaning;
    /**
     * @var Quote[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Quote",inversedBy="events")
     * @ORM\JoinTable(name="events_quotes",
     *     joinColumns={@ORM\JoinColumn(name="event_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="quote_id", referencedColumnName="id")}
     * )
     */
    private $quotes;
    /**
     * @var Category[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Category",inversedBy="events")
     * @ORM\JoinTable(name="cat_events",
     *     joinColumns={@ORM\JoinColumn(name="event_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="cat_id", referencedColumnName="id")}
     * )
     */
    private $categories;
    /**
     * @var Actor[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Actor",cascade={"persist"})
     * @ORM\JoinTable(name="events_actors",
     *     joinColumns={@ORM\JoinColumn(name="event_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="actor_id", referencedColumnName="id")}
     * )
     */
    private $actors;
    /**
     * @var Symbol[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Symbol",inversedBy="events", cascade={"persist"})
     * @ORM\JoinTable(name="symbols_events",
     *     joinColumns={@ORM\JoinColumn(name="event_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="symbol_id", referencedColumnName="id")}
     * )
     */
    private $symbols;
    /**
     * @var Event[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Event")
     *  @JoinColumn(name="event_id", referencedColumnName="id")
     */
    private $relatedEvents;
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
     * @param string $title
     *
     * @return Event
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
     * @return Event
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
     *
     * @param array $quotes
     *
     * @return Event
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
     * Set categories
     *
     * @param array $categories
     *
     * @return Event
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

    /**
     * @return Actor[]
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * @param Actor[] $actors
     */
    public function setActors($actors)
    {
        $this->actors = $actors;
    }

    /**
     * @return string
     */
    public function getRelatedEvents()
    {
        return $this->relatedEvents;
    }

    /**
     * @param string $relatedEvents
     */
    public function setRelatedEvents($relatedEvents)
    {
        $this->relatedEvents = $relatedEvents;
    }

    /**
     * @return Event[]
     */
    public function getSymbols()
    {
        return $this->symbols;
    }

    /**
     * @param Event[] $symbols
     */
    public function setSymbols($symbols)
    {
        $this->symbols = $symbols;
    }

}