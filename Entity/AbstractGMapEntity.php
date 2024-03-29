<?php

/*
 * This file is part of the ASBO package.
 *
 * (c) De Ron Malian <deronmalian@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Asbo\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Represent an abstract Gmap Entity
 *
 * @author De Ron Malian <deronmalian@gmail.com>
 *
 * @ORM\MappedSuperclass
 */
abstract class AbstractGMapEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    protected $address;

    /**
     * @var string
     *
     * @ORM\Column(name="locality", type="string", length=255, nullable=true)
     */
    protected $locality;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    protected $country;

    /**
     * @var float Latitude of the position
     *
     * @ORM\Column(name="lat", type="float", nullable=true)
     */
    protected $lat;

    /**
     * @var float Longitude of the position
     *
     * @ORM\Column(name="lng", type="float", nullable=true)
     */
    protected $lng;

    /**
     * Sets the address
     *
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Returns the address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the locality
     *
     * @param string $locality
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;
    }

    /**
     * Returns the locality
     *
     * @return string
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * Sets the country
     *
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * Returns the country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Returns the latitude
     *
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Sets the latitude
     *
     * @param string|float $lat
     */
    public function setLat($lat)
    {
        if (is_string($lat)) {
            $lat = floatval($lat);
        }
        $this->lat = $lat;
    }

    /**
     * Returns the longitude
     *
     * @return float
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Sets the longitude
     *
     * @param string|float $lng
     */
    public function setLng($lng)
    {
        if (is_string($lng)) {
            $lng = floatval($lng);
        }
        $this->lng = $lng;
    }
}
