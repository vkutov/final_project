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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50)
     */
    private $title;

    /**
     * @var array
     *
     * @ORM\Column(name="quotes", type="array")
     */
    private $quotes;

    /**
     * @var array
     *
     * @ORM\Column(name="categories", type="array")
     */
    private $categories;

    /**
     * @var array
     *
     * @ORM\Column(name="symbols", type="array")
     */
    private $symbols;

    /**
     * @var array
     *
     * @ORM\Column(name="relatedEvents", type="array", nullable=true)
     */
    private $relatedEvents;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
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
     * Set quotes
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
     * Get quotes
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
     * Set symbols
     *
     * @param array $symbols
     *
     * @return Event
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
     * Set relatedEvents
     *
     * @param array $relatedEvents
     *
     * @return Event
     */
    public function setRelatedEvents($relatedEvents)
    {
        $this->relatedEvents = $relatedEvents;

        return $this;
    }

    /**
     * Get relatedEvents
     *
     * @return array
     */
    public function getRelatedEvents()
    {
        return $this->relatedEvents;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Event
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
}

