<?php

namespace LeicesterCivicBusHack\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stop
 */
class Stop
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
     *
     * @ORM\Column(name="atcocode", type="string", length=20)
     */
    private $atcocode;

    /**
     * @var string
     *
     * @ORM\Column(name="commonname", type="string", length=255)
     */
    private $commonname;

	/**
     * @var string
     *
     * @ORM\Column(name="landmark", type="string", length=255)
     */
    private $landmark;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;


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
     * @param integer $atcocode
     * @return Stop
     */
    public function setAtcocode($atcocode)
    {
        $this->atcocode = $atcocode;

        return $this;
    }

    /**
     * Get atcocode
     *
     * @return integer 
     */
    public function getAtcocode()
    {
        return $this->atcocode;
    }

    /**
     * Set naptancode
     *
     * @param string $naptancode
     * @return Stop
     */
    public function setNaptancode($naptancode)
    {
        $this->naptancode = $naptancode;

        return $this;
    }

    /**
     * Get naptancode
     *
     * @return string 
     */
    public function getNaptancode()
    {
        return $this->naptancode;
    }

    /**
     * Set commonname
     *
     * @param string $commonname
     * @return Stop
     */
    public function setCommonname($commonname)
    {
        $this->commonname = $commonname;

        return $this;
    }

    /**
     * Get commonname
     *
     * @return string 
     */
    public function getCommonname()
    {
        return $this->commonname;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return Stop
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return Stop
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set landmark
     *
     * @param string $landmark
     * @return Stop
     */
    public function setLandmark($landmark)
    {
        $this->landmark = $landmark;

        return $this;
    }

    /**
     * Get landmark
     *
     * @return string 
     */
    public function getLandmark()
    {
        return $this->landmark;
    }
}
