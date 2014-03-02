<?php

namespace LeicesterCivicBusHack\MistabusAPIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Location implements \JsonSerializable
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
     * @var string
     *
     * @ORM\Column(name="atco", type="string", length=12)
     */
    private $atco;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=44)
     */
    private $name;

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
     * @var string
     *
     * @ORM\Column(name="locality", type="string", length=26)
     */
    private $locality;


	/**
	 * @return array|mixed
	 */
	public function jsonSerialize() {
		return [
			'id'=>$this->id,
			'name'=>$this->name,
			'locality'=>$this->locality,
			'latitude'=>$this->latitude,
			'longitude'=>$this->longitude,
		];
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
     * Set atco
     *
     * @param string $atco
     * @return Location
     */
    public function setAtco($atco)
    {
        $this->atco = $atco;

        return $this;
    }

    /**
     * Get atco
     *
     * @return string 
     */
    public function getAtco()
    {
        return $this->atco;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Location
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return Location
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
     * @return Location
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
     * Set locality
     *
     * @param string $locality
     * @return Location
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get locality
     *
     * @return string 
     */
    public function getLocality()
    {
        return $this->locality;
    }
}
