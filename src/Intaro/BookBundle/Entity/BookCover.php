<?php

namespace Intaro\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BookCover
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class BookCover
{
    /**
     * Максимально допустимый размер файла 5MB
     */
    const ALLOWED_SIZE = 5120;
    
    /**
     * Корневая директория с обложками книг
     */
    const DIRECTORY = 'Uploads/Books/Covers/';
    
    /**
     * @var array Массив разрешённых расширений файлов
     */
    public static $allowedTypes = array(
        'jpg',
        'jpeg',
        'png',
    );
    
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
     * @ORM\Column(name="alias", type="string", length=32)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="fileExt", type="string", length=10)
     */
    private $fileExt;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="dateAded", type="DateTime")
     */
    private $dateAded;


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
     * Set alias
     *
     * @param string $alias
     * 
     * @return BookCover
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set fileExt
     *
     * @param string $fileExt
     * 
     * @return BookCover
     */
    public function setFileExt($fileExt)
    {
        $this->fileExt = $fileExt;

        return $this;
    }

    /**
     * Get fileExt
     *
     * @return string 
     */
    public function getFileExt()
    {
        return $this->fileExt;
    }

    /**
     * Set dateAded
     *
     * @param \DateTime $dateAded
     * 
     * @return BookCover
     */
    public function setDateAded(\DateTime $dateAded)
    {
        $this->dateAded = $dateAded;

        return $this;
    }

    /**
     * Get dateAded
     *
     * @return \DateTime 
     */
    public function getDateAded()
    {
        return $this->dateAded;
    }
    
    /**
     * Проверяет есть ли расширение книги $type
     * среди разрешённых расширений 
     * 
     * @param mixed $type Расширение файла
     * 
     * @return bool true если есть
     */
    public function isAllowedType($type)
    {
        return in_array(strlower($type), self::$allowedTypes);
    }
    
    /**
     * Генерирует путь до файла на основе дате его добавления
     * 
     * @return string
     */
    public function getPath()
    {
        return self::DIRECTORY
            . $this->dateAded->format('Y') . '/'
            . $this->dateAded->format('m') . '/'
            . $this->dateAded->format('d') . '/'
        ;
    }
    
    /**
     * Генерирует уникальное имя файла из 32х символов
     * 
     * @return string
     */
    public function genarateAlias()
    {
        return md5(microtime() . rand(0, 9999));
    }
}
