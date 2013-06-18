<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/16/13
 * Time: 8:03 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Entity;


/**
 * Class NowPlaying
 * @package All4m\Entity
 * @Entity
 */
class NowPlaying implements TrackInterface
{
    /**
     * @var int
     * @Id
     * @GeneratedValue(strategy="IDENTITY"))
     * @Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @Column(type="string", unique=true)
     */
    private $source;

    /**
     * @var string
     * @Column(type="string")
     */
    private $artist;

    /**
     * @var string
     * @Column(type="string")
     */
    private $title;

    /**
     * @var \DateTime
     * @Column(type="datetime")
     */
    private $updateTime;

    public function __construct()
    {
        $this->updateTime = new \DateTime();
    }

    /**
     * @param string $artist
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    /**
     * @return string
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param \DateTime $updateTime
     */
    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;
    }

    /**
     * @return \DateTime
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }
}