<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Serializer;

/**
 * Book
 */
class Book
{
    /**
     * @var string
     */
    private $name_rus;

    /**
     * @var string
     */
    private $name_eng;

    /**
     * @var string
     */
    private $description_rus;

    /**
     * @var string
     */
    private $description_eng;

    /**
     * @var string
     */
    private $scheme;

    /**
     * @var string
	 * @Exclude
     */
    private $videourl;

    /**
     * @var string
	 * @Exclude
     */
    private $thumburl;

    /**
     * @var string
     */
    private $itunesurl_eng;

    /**
     * @var string
     */
    private $itunesurl_rus;


    /**
     * @var string
     */
    private $type;

    /**
     * @var integer
     */
    private $education;

    /**
     * @var string
	 * @Accessor(getter="getThumbAbsolutePath")
     */	
	private $thumbAbsolutePath;

    /**
     * @var string
	 * @Accessor(getter="getVideoAbsolutePath")
     */	
	private $videoAbsolutePath;


    /**
     * @var integer
     */
    private $id;

    /**
     * Set education
     *
     * @param string $education
     * @return Book
     */
    public function setEducation($education)
    {
        $this->education = $education;

        return $this;
    }

    /**
     * Get education
     *
     * @return string 
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Book
     */
    public function setNameEng($name)
    {
        $this->name_eng = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getNameEng()
    {
        return $this->name_eng;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Book
     */
    public function setNameRus($name)
    {
        $this->name_rus = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getNameRus()
    {
        return $this->name_rus;
    }


    /**
     * Set description
     *
     * @param string $description
     * @return Book
     */
    public function setDescriptionRus($description)
    {
        $this->description_rus = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescriptionRus()
    {
        return $this->description_rus;
    }


    /**
     * Set description
     *
     * @param string $description
     * @return Book
     */
    public function setDescriptionEng($description)
    {
        $this->description_eng = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescriptionEng()
    {
        return $this->description_eng;
    }

    /**
     * Set scheme
     *
     * @param string $scheme
     * @return Book
     */
    public function setScheme($scheme)
    {
        $this->scheme = $scheme;

        return $this;
    }

    /**
     * Get scheme
     *
     * @return string 
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * Set videourl
     *
     * @param string $videourl
     * @return Book
     */
    public function setVideourl($videourl)
    {
        $this->videourl = $videourl;

        return $this;
    }

    /**
     * Get videourl
     *
     * @return string 
     */
    public function getVideourl()
    {
        return $this->videourl;
    }

    /**
     * Set thumburl
     *
     * @param string $thumburl
     * @return Book
     */
    public function setThumburl($thumburl)
    {
        $this->thumburl = $thumburl;

        return $this;
    }

    /**
     * Get thumburl
     *
     * @return string 
     */
    public function getThumburl()
    {
        return $this->thumburl;
    }

    /**
     * Set itunesurl
     *
     * @param string $itunesurl
     * @return Book
     */
    public function setItunesurlRus($itunesurl)
    {
        $this->itunesurl_rus = $itunesurl;

        return $this;
    }

    /**
     * Get itunesurl
     *
     * @return string 
     */
    public function getItunesurlRus()
    {
        return $this->itunesurl_rus;
    }

    /**
     * Set itunesurl
     *
     * @param string $itunesurl
     * @return Book
     */
    public function setItunesurlEng($itunesurl)
    {
        $this->itunesurl_eng = $itunesurl;

        return $this;
    }

    /**
     * Get itunesurl
     *
     * @return string 
     */
    public function getItunesurlEng()
    {
        return $this->itunesurl_eng;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Book
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
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
	
	function __toString() {
		return $this->name_rus.' '.$this->name_eng;
	}
		

    /**
     * Set thumb absolute path
     *
     * @param string $type
     * @return Book
     */
    public function setThumbAbsolutePath($path)
    {
        $this->thumbAbsolutePath = $path;

        return $this;
    }

    /**
     * Get thumb absolute path
     *
     * @return string 
     */
    public function getThumbAbsolutePath()
    {
        return $this->thumbAbsolutePath;
    }		
		
    /**
     * Set video absolute path
     *
     * @param string $type
     * @return Book
     */
    public function setVideoAbsolutePath($path)
    {
        $this->videoAbsolutePath = $path;

        return $this;
    }

    /**
     * Get video absolute path
     *
     * @return string 
     */
    public function getVideoAbsolutePath()
    {
        return $this->videoAbsolutePath;
    }			
		
		
	//image
    public $thumb;

    public function getThumbWebPath() {
      return null === $this->thumburl ? null : $this->getUploadDir().'/'.$this->thumburl;
    }

    protected function getUploadRootDir($basepath)
    {
      // the absolute directory path where uploaded documents should be saved
      return $basepath.$this->getUploadDir();
    }

    protected function getUploadDir() {
      // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
      return 'uploads/thumb';
    }

    public function uploadThumb($basepath)
    {
      // the file property can be empty if the field is not required
      if (null === $this->thumb) {
          return;
      }

      if (null === $basepath) {
          return;
      }

      // we use the original file name here but you should
      // sanitize it at least to avoid any security issues

      // move takes the target directory and then the target filename to move to
      $this->thumb->move($this->getUploadRootDir($basepath), $this->thumb->getClientOriginalName());

      // set the path property to the filename where you'ved saved the file
      $this->setThumburl($this->thumb->getClientOriginalName());

      // clean up the file property as you won't need it anymore
      $this->thumb = null;
    }
	
	//video
    public $video;

    public function getVideoWebPath() {
      return null === $this->videourl ? null : $this->getVideoUploadDir().'/'.$this->videourl;
    }

    protected function getVideoUploadRootDir($basepath)
    {
      // the absolute directory path where uploaded documents should be saved
      return $basepath.$this->getVideoUploadDir();
    }

    protected function getVideoUploadDir() {
      // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
      return 'uploads/video';
    }

    public function uploadVideo($basepath)
    {
      // the file property can be empty if the field is not required
      if (null === $this->video) {
          return;
      }

      if (null === $basepath) {
          return;
      }

      // we use the original file name here but you should
      // sanitize it at least to avoid any security issues

      // move takes the target directory and then the target filename to move to
      $this->video->move($this->getVideoUploadRootDir($basepath), $this->video->getClientOriginalName());

      // set the path property to the filename where you'ved saved the file
      $this->setVideourl($this->video->getClientOriginalName());

      // clean up the file property as you won't need it anymore
      $this->video = null;
    }	
}
