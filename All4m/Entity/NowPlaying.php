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
class NowPlaying
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
     * @var Track
     * @OneToOne(targetEntity="Track")
     */
    private $track;

    /**
     * @var DateTime
     * @Column(type="datetime")
     */
    private $updateTime;

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
     * @param \All4m\Entity\Track $track
     */
    public function setTrack($track)
    {
        $this->track = $track;
    }

    /**
     * @return \All4m\Entity\Track
     */
    public function getTrack()
    {
        return $this->track;
    }

    /**
     * @param \All4m\Entity\DateTime $updateTime
     */
    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;
    }

    /**
     * @return \All4m\Entity\DateTime
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }
}