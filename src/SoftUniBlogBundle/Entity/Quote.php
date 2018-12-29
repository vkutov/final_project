<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 12/11/2018
 * Time: 11:16 AM
 */
namespace SoftUniBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quote
 *
 * @ORM\Table(name="quotes")
 * @ORM\Entity(repositoryClass="SoftUniBlogBundle\Repository\QuoteRepository")
 */
class Quote
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
     * @ORM\ManyToOne(targetEntity="SoftUniBlogBundle\Entity\User",inversedBy="quotes")
     *
     */
    private $author;
    /**
     * @var string
     * @ORM\Column(name="verse", type="string", length=255)
     */
    private $verse;
    /**
     * @var string
     * @ORM\Column(name="place")
     */
    private $place;
    /**
     * @var string
     * @ORM\Column(name="image",nullable=true)
     */

    private $image;

    /**
     * @var string
     * @ORM\Column(name="meaning",nullable=false)
     */
    private $meaning;
    /**
     * @var Actor[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Actor",inversedBy="quotes")
     * @ORM\JoinTable(name="actors_quotes",
     *     joinColumns={@ORM\JoinColumn(name="quote_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="actor_id", referencedColumnName="id")}
     * )
     */
    private $actors;
    /**
     * @var Category[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Category",inversedBy="quotes")
     * @ORM\JoinTable(name="cat_quotes",
     *     joinColumns={@ORM\JoinColumn(name="quote_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="cat_id", referencedColumnName="id")}
     * )
     */
    private $categories;
    /**
     * @var Event[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Event",mappedBy="quotes")
     * @ORM\JoinTable(name="events_quotes",
     *     joinColumns={@ORM\JoinColumn(name="quote_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="event_id", referencedColumnName="id")}
     * )
     */
    private $events;
    /**
     * @var Symbol[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Symbol",mappedBy="quotes")
     * @ORM\JoinTable(name="symbols_quotes",
     *     joinColumns={@ORM\JoinColumn(name="quote_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="symbol_id", referencedColumnName="id")}
     * )
     */
    private $symbols;
    /**
     * @var string
     * @ORM\Column(name="relatedQuotes")
     */
    private $relatedQuotes;
    /**
     * @var string
     */
    private $summary;

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
     * @return string
     */
    public function getMeaning()
    {
        return $this->meaning;
    }

    /**
     * @param string $meaning
     */
    public function setMeaning($meaning)
    {
        $this->meaning = $meaning;
    }
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getVerse()
    {
        return $this->verse;
    }

    /**
     * @param User $verse
     */
    public function setVerse($verse)
    {
        $this->verse = $verse;
    }

    /**
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param string $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return string
     */
    public function getRelatedQuotes()
    {
        return $this->relatedQuotes;
    }

    /**
     * @param string $relatedQuotes
     */
    public function setRelatedQuotes($relatedQuotes)
    {
        $this->relatedQuotes = $relatedQuotes;
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
    public function getSummary()
    {
        $this->setSummary();
        return $this->summary;
    }

    public function setSummary()
    {
        if(strlen($this->getMeaning())>50){
            $this->summary = substr($this->getMeaning(), 0,
                    strlen($this->getmeaning()) / 2
                ) . "...";
        }
        else {
            $this->summary = $this->getMeaning();
        }
    }

    /**
     * @return Category[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param Category[] $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return Event[]
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param Event[] $events
     */
    public function setEvents($events)
    {
        $this->events = $events;
    }

    /**
     * @return Symbol[]
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