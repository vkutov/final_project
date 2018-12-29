<?php

namespace SoftUniBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="SoftUniBlogBundle\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\ManyToOne(targetEntity="SoftUniBlogBundle\Entity\User")
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
     * @var Actor[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Actor",mappedBy="categories")
     * @ORM\JoinTable(name="cat_actors",
     *     joinColumns={@ORM\JoinColumn(name="cat_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="actor_id", referencedColumnName="id")}
     * )
     */
    private $actors;
    /**
     * @var Quote[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Quote"), mappedBy="categories"
     */
    private $quotes;
    /**
     * @var Event[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Event", mappedBy="categories")
     * @ORM\JoinTable(name="cat_events",
     *     joinColumns={@ORM\JoinColumn(name="cat_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="quote_id", referencedColumnName="id")}
     * )
     */
    private $events;

    /**
     * @var Symbol[]
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Symbol",mappedBy="categories")
         * @ORM\JoinTable(name="symbols_cat",
         *     joinColumns={@ORM\JoinColumn(name="cat_id", referencedColumnName="id")},
         *     inverseJoinColumns={@ORM\JoinColumn(name="symbol_id", referencedColumnName="id")}
         * )
     */
    private $symbols;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;
    /**
     * @var string
     */
    private $summary;

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
     * @return Category
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
     * @return Category
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
     * Set quotes
     *
     * @param array $quotes
     *
     * @return Category
     */
    public function setQuotes($quotes)
    {
        $this->quotes = $quotes;

        return $this;
    }

    /**
     * Get quotes
     *
     * @return array
     */
    public function getQuotes()
    {
        return $this->quotes;
    }

    /**
     * Set actors
     *
     * @param array $actors
     *
     * @return Category
     */
    public function setActors($actors)
    {
        $this->actors = $actors;

        return $this;
    }

    /**
     * Get actors
     *
     * @return array
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Set events
     *
     * @param array $events
     *
     * @return Category
     */
    public function setEvents($events)
    {
        $this->events = $events;

        return $this;
    }

    /**
     * Get events
     *
     * @return array
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Set symbols
     *
     * @param array $symbols
     *
     * @return Category
     */
    public function setSymbols($symbols)
    {
        $this->symbols = $symbols;

        return $this;
    }

    /**
     * Get symbols
     *
     * @return array
     */
    public function getSymbols()
    {
        return $this->symbols;
    }

    /**
     * Set relatedCategories
     *
     * @param array $relatedCategories
     *
     * @return Category
     */
//    public function setRelatedCategories($relatedCategories)
//    {
//        $this->relatedCategories = $relatedCategories;
//
//        return $this;
//    }
//
//    /**
//     * Get relatedCategories
//     *
//     * @return array
//     */
//    public function getRelatedCategories()
//    {
//        return $this->relatedCategories;
//    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Category
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
        if(strlen($this->meaning) > 50){
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
}

