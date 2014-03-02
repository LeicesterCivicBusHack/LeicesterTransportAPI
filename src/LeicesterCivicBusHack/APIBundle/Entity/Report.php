<?php

namespace LeicesterCivicBusHack\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Report
 */
class Report
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
	 * @var integer
	 * @ORM\Column(name="atcocode", type="string", length=20)
	 */
	private $atcocode;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="starttime", type="datetime")
	 */
	private $starttime;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="endtime", type="datetime", nullable=true)
	 */
	private $endtime;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="company", type="string", length=50)
	 */
	private $company;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="route", type="string", length=50)
	 */
	private $route;




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
     * Set atcocode
     *
     * @param string $atcocode
     * @return Report
     */
    public function setAtcocode($atcocode)
    {
        $this->atcocode = $atcocode;

        return $this;
    }

    /**
     * Get atcocode
     *
     * @return string 
     */
    public function getAtcocode()
    {
        return $this->atcocode;
    }

    /**
     * Set starttime
     *
     * @param \DateTime $starttime
     * @return Report
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
     * @return Report
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
     * Set company
     *
     * @param string $company
     * @return Report
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set route
     *
     * @param string $route
     * @return Report
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string 
     */
    public function getRoute()
    {
        return $this->route;
    }
}
