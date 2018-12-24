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
     * @var array
     *
     * @ORM\Column(name="quotes", type="array")
     */
    private $quotes;

    /**
     * @var array
     *
     * @ORM\Column(name="actors", type="array")
     */
    private $actors;

    /**
     * @var array
     *
     * @ORM\Column(name="events", type="array", nullable=true)
     */
    private $events;

    /**
     * @var array
     *
     * @ORM\Column(name="symbols", type="array", nullable=true)
     */
    private $symbols;

    /**
     * @var array
     *
     * @ORM\Column(name="relatedCategories", type="array", nullable=true)
     */
    private $relatedCategories;

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
    public function setRelatedCategories($relatedCategories)
    {
        $this->relatedCategories = $relatedCategories;

        return $this;
    }

    /**
     * Get relatedCategories
     *
     * @return array
     */
    public function getRelatedCategories()
    {
        return $this->relatedCategories;
    }

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
}

