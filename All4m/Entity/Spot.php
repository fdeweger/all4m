<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/16/13
 * Time: 1:26 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Entity;

/**
 * Class Spot
 * @package All4m\Entity
 * @Entity
 */
class Spot {
    /**
     * @var int
     * @Id
     * @GeneratedValue(strategy="IDENTITY"))
     * @Column(type="integer")
     */
    private $id;

    /**
     * @var Track
     * @ManyToOne(targetEntity="Track", inversedBy="spots")
     */
    private $track;

    /**
     * @var string
     * @Column(type="string", length=3)
     */
    private $source;

    /**
     * @var datetime
     * @Column(type="datetime")
     */
    private $date;

    /**
     * @param \All4m\Entity\datetime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return \All4m\Entity\datetime
     */
    public function getDate()
    {
        return $this->date;
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
}