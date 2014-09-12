<?php

namespace Intaro\BookBundle\Entity;
use Intaro\BookBundle\Entity\BookCover;
use Intaro\BookBundle\Entity\BookFile;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table()
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=100)
     */
    private $author;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="lastRead", type="DateTime")
     */
    private $lastRead;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allowDownload", type="boolean")
     */
    private $allowDownload;
    
    /**
     * @var BookCover
     * 
     * @ORM\OneToOne(targetEntity="BookCover")
     * @ORM\JoinColumn(name="cover_id", referencedColumnName="id")
     */
    private $cover;
    
    /**
     * @var BookFile
     * 
     * @ORM\OneToOne(targetEntity="BookFile")
     * @ORM\JoinColumn(name="file_id", referencedColumnName="id")
     */
    private $file;

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
     * @param \Intaro\BookBundle\Entity\BookCover $cover
     * 
     * @return Book
     */
    public function setCover(\Intaro\BookBundle\Entity\BookCover $cover = null)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return \Intaro\BookBundle\Entity\BookCover 
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set file
     *
     * @param \Intaro\BookBundle\Entity\BookFile $file
     * 
     * @return Book
     */
    public function setFile(\Intaro\BookBundle\Entity\BookFile $file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return \Intaro\BookBundle\Entity\BookFile 
     */
    public function getFile()
    {
        return $this->file;
    }
}
