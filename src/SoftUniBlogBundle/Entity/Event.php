<?php

namespace SoftUniBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var string
     *
     * @ORM\Column(name="meaning", type="string", length=255, nullable=false)
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
     * @var Actor[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Actor",inversedBy="events")
     * @ORM\JoinTable(name="events_actors",
     *     joinColumns={@ORM\JoinColumn(name="event_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="actor_id", referencedColumnName="id")}
     * )
     */
    private $actors;
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
     * @var Event[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Symbol",mappedBy="events")
         * @ORM\JoinTable(name="symbols_events",
         *     joinColumns={@ORM\JoinColumn(name="event_id", referencedColumnName="id")},
         *     inverseJoinColumns={@ORM\JoinColumn(name="symbol_id", referencedColumnName="id")}
         * )
     */
    private $symbols;
    /**
     * @var string
     * @ORM\Column(name="relatedEvents")
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

    /**
     * @return string
     */
    public function getSummary()
    {
        if (strlen($this->meaning) > 50) {
            $this->setSummary();
        }
        return $this->summary;
    }

    public function setSummary()
    {
        $this->summary = substr($this->getMeaning(), 0,
                strlen($this->getmeaning()) / 2
            ) . "...";
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