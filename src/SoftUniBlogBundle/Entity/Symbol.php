<?php

namespace SoftUniBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Symbol
 *
 * @ORM\Table(name="symbols")
 * @ORM\Entity(repositoryClass="SoftUniBlogBundle\Repository\SymbolRepository")
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="meaning", type="string", length=100, nullable=true)
     */
    private $meaning;

    /**
     * @var array
     *
     * @ORM\Column(name="quotes", type="array")
     */
    private $quotes;

    /**
     * @var array
     *
     * @ORM\Column(name="events", type="array", nullable=true)
     */
    private $events;

    /**
     * @var array
     *
     * @ORM\Column(name="actors", type="array", nullable=true)
     */
    private $actors;

    /**
     * @var array
     *
     * @ORM\Column(name="categories", type="array", nullable=true)
     */
    private $categories;

    /**
     * @var array
     *
     * @ORM\Column(name="relatedSymbols", type="array", nullable=true)
     */
    private $relatedSymbols;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
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
     * @return Symbol
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
     * Set quotes
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
     * Get quotes
     *
     * @return array
     */
    public function getQuotes()
    {
        return $this->quotes;
    }

    /**
     * Set events
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
     * Get events
     *
     * @return array
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Set actors
     *
     * @param array $actors
     *
     * @return Symbol
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
     * Set relatedSymbols
     *
     * @param array $relatedSymbols
     *
     * @return Symbol
     */
    public function setRelatedSymbols($relatedSymbols)
    {
        $this->relatedSymbols = $relatedSymbols;

        return $this;
    }

    /**
     * Get relatedSymbols
     *
     * @return array
     */
    public function getRelatedSymbols()
    {
        return $this->relatedSymbols;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Symbol
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

