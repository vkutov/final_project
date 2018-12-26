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
 * Article
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
     * @ORM\ManyToOne(targetEntity="SoftUniBlogBundle\Entity\User", inversedBy="quotes")
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
     * @ORM\Column(name="meaning")
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
     * @var string
     * @ORM\Column(name="relatedQuotes")
     */
    private $relatedQuotes;
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
}