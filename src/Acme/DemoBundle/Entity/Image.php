<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Exclude;

/**
 * Image
 */
class Image
{
    /**
     * @var string
	 * @Exclude	
     */
    private $imageurl;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Acme\DemoBundle\Entity\Book
     */
    private $book;

    /**
     * @var string
	 * @Accessor(getter="getImageAbsolutePath")
     */	
	private $imageAbsolutePath;


    /**
     * Set imageurl
     *
     * @param string $imageurl
     * @return Image
     */
    public function setImageurl($imageurl)
    {
        $this->imageurl = $imageurl;

        return $this;
    }

    /**
     * Get imageurl
     *
     * @return string 
     */
    public function getImageurl()
    {
        return $this->imageurl;
    }

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
     * Set book
     *
     * @param \Acme\DemoBundle\Entity\Book $book
     * @return Image
     */
    public function setBook(\Acme\DemoBundle\Entity\Book $book = null)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return \Acme\DemoBundle\Entity\Book 
     */
    public function getBook()
    {
        return $this->book;
    }
	
    /**
     * Set image absolute path
     *
     * @param string $type
     * @return Book
     */
    public function setImageAbsolutePath($path)
    {
        $this->imageAbsolutePath = $path;

        return $this;
    }

    /**
     * Get image absolute path
     *
     * @return string 
     */
    public function getImageAbsolutePath()
    {
        return $this->imageAbsolutePath;
    }
	
	//image
    public $image;

    public function getImageWebPath() {
      return null === $this->imageurl ? null : $this->getUploadDir().'/'.$this->imageurl;
    }

    protected function getUploadRootDir($basepath)
    {
      // the absolute directory path where uploaded documents should be saved
      return $basepath.$this->getUploadDir();
    }

    protected function getUploadDir() {
      // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
      return 'uploads/image';
    }

    public function uploadImage($basepath)
    {
      // the file property can be empty if the field is not required
      if (null === $this->image) {
          return;
      }

      if (null === $basepath) {
          return;
      }

      // we use the original file name here but you should
      // sanitize it at least to avoid any security issues

      // move takes the target directory and then the target filename to move to
      $this->image->move($this->getUploadRootDir($basepath), $this->image->getClientOriginalName());

      // set the path property to the filename where you'ved saved the file
      $this->setImageurl($this->image->getClientOriginalName());

      // clean up the file property as you won't need it anymore
      $this->image = null;
    }
}
