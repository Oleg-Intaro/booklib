<?php

namespace Intaro\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Книга
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
     * @var DateTime Дата прочтения
     *
     * @ORM\Column(name="lastRead", type="datetime", nullable=true)
     */
    private $lastRead;

    /**
     * @var boolean Разрешить скачивание
     *
     * @ORM\Column(name="allowDownload", type="boolean")
     */
    private $allowDownload;

    /**
     * @var string Путь до файла
     * 
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @var string Путь до файла обложки
     * 
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coverPath;

    /**
     * @var UploadedFile Файл книги
     */
    private $file;

    /**
     * @var UploadedFile Файл обложки
     */
    private $coverFile;

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
    public function setLastRead(\DateTime $lastRead = null)
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
     * Set path
     *
     * @param string $path
     * 
     * @return Book
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set file
     * 
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     * 
     * @return \Symfony\Component\HttpFoundation\File\UploadedFile
     */
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;

        return $this->file;
    }

    /**
     * Get file
     * 
     * @return \Symfony\Component\HttpFoundation\File\UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set coverFile
     * 
     * @param UploadedFile $coverFile
     * 
     * @return UploadedFile
     */
    public function setCoverFile(UploadedFile $coverFile)
    {
        $this->coverFile = $coverFile;

        return $this->coverFile;
    }

    /**
     * Get coverFile
     * 
     * @return \Symfony\Component\HttpFoundation\File\UploadedFile
     */
    public function getCoverFile()
    {
        return $this->coverFile;
    }

    /**
     * Set coverPath
     *
     * @param string $coverPath
     * 
     * @return Book
     */
    public function setCoverPath($coverPath)
    {
        $this->coverPath = $coverPath;

        return $this;
    }

    /**
     * Get coverPath
     *
     * @return string 
     */
    public function getCoverPath()
    {
        return $this->coverPath;
    }

    /**
     * Возвращает полный путь до директории с файлами книг
     * 
     * @return string
     */
    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    /**
     * Возвращает полный путь до директории с файлами обложек
     * 
     * @return string
     */
    public function getAbsoluteCoverPath()
    {
        return null === $this->coverPath
            ? null
            : $this->getCoverRootDir().'/'.$this->coverPath;
    }

    /**
     * Возвращает относительный путь до директории с файлами книг
     * 
     * @return string
     */
    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    /**
     * Возвращает относительный путь до директории с файлами обложек
     * 
     * @return string
     */
    public function getWebCoverPath()
    {
        return null === $this->coverPath
            ? null
            : $this->getCoverDir().'/'.$this->coverPath;
    }

    /**
     * Возвращает абсолютный путь до директории, в которой будут храниться книги
     * 
     * @return string
     */
    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    /**
     * Возвращает абсолютный путь до директории, в которой будут храниться обложки
     * 
     * @return string
     */
    protected function getCoverRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getCoverDir();
    }

    /**
     * Возвращает директорию, где будут храниться книги
     * 
     * @return string
     */
    protected function getUploadDir()
    {
        return 'uploads/books';
    }

    /**
     * Возвращает директорию, где будут храниться обложки книг
     * 
     * @return string
     */
    protected function getCoverDir()
    {
        return 'uploads/books/covers';
    }

    /**
     * Перемещает файл в директорию соответствующую дате добавления,
     * генерируя уникальное имя файла
     * 
     * @param UploadedFile $file
     * @param type         $rootDir
     * 
     * @return string новое имя файла, содержащие дату
     */
    private function moveFile(UploadedFile $file, $rootDir)
    {
        $date = date('Y/m/d');
        $filename = $this->generateFileName();
        $ext = $file->guessExtension();
        $file->move(
            $rootDir . '/' . $date,
            $filename.'.'.$ext
        );

        return $date.'/'.$filename.'.'.$ext;
    }

    /**
     * Загружает файл книги на сервер
     */
    public function upload()
    {
        // Файла может и не быть, если он не обязателен
        if (null === $this->getFile()) {
            return;
        }
        $this->path = $this->moveFile(
            $this->getFile(),
            $this->getUploadRootDir()
        );
        $this->file = null;
    }

    /**
     * Загружает обложку книги на серер
     */
    public function uploadCover()
    {
        // Файла может и не быть, если он не обязателен
        if (null === $this->getCoverFile()) {
            return;
        }
        $this->coverPath = $this->moveFile(
            $this->getCoverFile(),
            $this->getCoverRootDir()
        );

        $this->coverFile = null;
    }

    /**
     * Удаляет составляющую даты из имени файла
     * 
     * @return string
     */
    public function getDownloadFileName()
    {
        return substr($this->path, 11);
    }

    /**
     * Генерирует уникальное имя файла
     * 
     * @return string sha1
     */
    public function generateFileName()
    {
        return sha1(uniqid(mt_rand(), true));
    }
}
