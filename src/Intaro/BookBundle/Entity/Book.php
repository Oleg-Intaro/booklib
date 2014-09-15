<?php

namespace Intaro\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity
 */
class Book
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string Название книги
     *
     * @ORM\Column(name="title", type="string", length=100)
     */
    private $title;

    /**
     * @var string Автор книги
     *
     * @ORM\Column(name="author", type="string", length=100)
     */
    private $author;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="lastRead", type="datetime")
     */
    private $lastRead;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allowDownload", type="boolean")
     */
    private $allowDownload;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="cover", type="string", length=100)
     */
    private $cover;
    
    /**
     * @var string 
     * 
     * @ORM\Column(name="document", type="string", length=100)
     */
    private $document;

    /**
     * Get id
     *
     * @return integer 
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
     * @return Book
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
     * Set author
     *
     * @param string $author
     * 
     * @return Book
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set lastRead
     *
     * @param \DateTime $lastRead
     * 
     * @return Book
     */
    public function setLastRead(\DateTime $lastRead)
    {
        $this->lastRead = $lastRead;

        return $this;
    }

    /**
     * Get lastRead
     *
     * @return \DateTime 
     */
    public function getLastRead()
    {
        return $this->lastRead;
    }

    /**
     * Set allowDownload
     *
     * @param boolean $allowDownload
     * 
     * @return Book
     */
    public function setAllowDownload($allowDownload)
    {
        $this->allowDownload = $allowDownload;

        return $this;
    }

    /**
     * Get allowDownload
     *
     * @return boolean 
     */
    public function getAllowDownload()
    {
        return $this->allowDownload;
    }

    /**
     * Set cover
     *
     * @param string $cover
     * @return Book
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return string 
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set document
     *
     * @param string $document
     * @return Book
     */
    public function setDocument($document)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return string 
     */
    public function getDocument()
    {
        return $this->document;
    }
}
