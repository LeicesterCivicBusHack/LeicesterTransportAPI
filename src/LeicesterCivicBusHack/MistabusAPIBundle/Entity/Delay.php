<?php

namespace LeicesterCivicBusHack\MistabusAPIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Delay
 *
 * @ORM\Table()
 * @ORM\Entity
 * @todo switch to GUID
 */
class Delay implements \JsonSerializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="starttime", type="datetime")
     */
    private $starttime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endtime", type="datetime", nullable=true)
     */
    private $endtime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatetime", type="datetime", nullable=true)
     */
    private $updatetime;

    /**
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    private $location;

	public function __construct() {
		$this->starttime = new \DateTime();
		$this->updatetime = new \DateTime();
	}

	public function jsonSerialize() {
		return([
			'id'=>$this->id,
			'start'=>$this->starttime,
		    'end'=>$this->endtime
		]);
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
     * Set starttime
     *
     * @param \DateTime $starttime
     * @return Delay
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;

        return $this;
    }

    /**
     * Get starttime
     *
     * @return \DateTime 
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * Set endtime
     *
     * @param \DateTime $endtime
     * @return Delay
     */
    public function setEndtime($endtime)
    {
        $this->endtime = $endtime;

        return $this;
    }

    /**
     * Get endtime
     *
     * @return \DateTime 
     */
    public function getEndtime()
    {
        return $this->endtime;
    }


    /**
     * Set location
     *
     * @param \LeicesterCivicBusHack\MistabusAPIBundle\Entity\Location $location
     * @return Delay
     */
    public function setLocation(\LeicesterCivicBusHack\MistabusAPIBundle\Entity\Location $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \LeicesterCivicBusHack\MistabusAPIBundle\Entity\Location 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set updatetime
     *
     * @param \DateTime $updatetime
     * @return Delay
     */
    public function setUpdatetime($updatetime)
    {
        $this->updatetime = $updatetime;

        return $this;
    }

    /**
     * Get updatetime
     *
     * @return \DateTime 
     */
    public function getUpdatetime()
    {
        return $this->updatetime;
    }
}
