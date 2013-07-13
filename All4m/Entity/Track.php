<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/16/13
 * Time: 12:33 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Entity;

/**
 * Class Track
 * @package All4m\Video
 * @Entity(repositoryClass="All4m\Repository\TrackRepository");
 */
class Track implements TrackInterface
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
     * @Column(type="string")
     */
    private $artist;

    /**
     * @var string
     * @Column(type="string")
     */
    private $title;

    /**
     * @var int
     * @Column(type="integer")
     */
    private $flags = 0;

    /**
     * @var int
     * @Column(type="integer")
     */
    private $views = 0;

    /**
     * @var int
     * @Column(type="integer")
     */
    private $score = 0;

    /**
     * @var string
     * @Column(type="string", unique=true)
     */
    private $canonicalName;

    /**
     * @var string
     * @Column(type="string", length=16, nullable=true)
     */
    private $youtubeId;

    /**
     * @var \DateTime
     * @Column(type="datetime")
     */
    private $createDate;

    /**
     * @var Spot[]
     * @OneToMany(targetEntity="Spot", mappedBy="track");
     */
    private $spots;

    /**
     * @var int
     * @Column(type="integer")
     */
    private $status = 0;

    public function __construct()
    {
        $this->createDate = new \DateTime();
    }

    /**
     * @param string $artist
     */
    public function setArtist($artist)
    {
        $this->artist = ucwords(strtolower(trim($artist)));
    }

    /**
     * @return string
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param string $canonicalName
     */
    public function setCanonicalName($canonicalName)
    {
        $this->canonicalName = $canonicalName;
    }

    /**
     * @return string
     */
    public function getCanonicalName()
    {
        return $this->canonicalName;
    }

    /**
     * @param \DateTime $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    /**
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param int $flags
     */
    public function setFlags($flags)
    {
        $this->flags = $flags;
    }

    /**
     * @return int
     */
    public function getFlags()
    {
        return $this->flags;
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
     * @param int $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param \All4m\Entity\Spot[] $spots
     */
    public function setSpots($spots)
    {
        $this->spots = $spots;
    }

    /**
     * @return \All4m\Entity\Spot[]
     */
    public function getSpots()
    {
        return $this->spots;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = ucwords(strtolower(trim($title)));
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param int $views
     */
    public function setViews($views)
    {
        $this->views = $views;
    }

    /**
     * @return int
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param string $youtubeId
     */
    public function setYoutubeId($youtubeId)
    {
        $this->youtubeId = $youtubeId;
    }

    /**
     * @return string
     */
    public function getYoutubeId()
    {
        return $this->youtubeId;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param TrackInterFace $track
     * @return Track
     */
    public static function FromTrackInterFace(TrackInterFace $track)
    {
        $ret = new Track();
        $ret->setArtist($track->getArtist());
        $ret->setTitle($track->getTitle());
        $ret->setCanonicalName($track->getCanonicalName());
        return $ret;
    }
}