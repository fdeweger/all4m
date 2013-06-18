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
class Spot
{
    /**
     * @var int
     * @Id
     * @GeneratedValue(strategy="AUTO"))
     * @Column(type="integer")
     */
    private $id;
    /**
     * @var string
     * @Column(type="string", length=3)
     */
    private $source;
    /**
     * @var \DateTime
     * @Column(type="datetime")
     */
    private $createDate;
    /**
     * @var Track
     * @ManyToOne(targetEntity="Track", inversedBy="spots")
     * @JoinColumns({
     *   @JoinColumn(name="track_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $track;

    public function __construct()
    {
        $this->createDate = new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param \DateTime $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return \All4m\Entity\Track
     */
    public function getTrack()
    {
        return $this->track;
    }

    /**
     * @param \All4m\Entity\Track $track
     */
    public function setTrack($track)
    {
        $this->track = $track;
    }
}