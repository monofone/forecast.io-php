<?php

namespace Monofone\Geocoding;

/**
 * User: s.rohweder@blage.net
 * Date: 4/9/13
 * Time: 11:18 PM
 * License: MIT
 */

/**
 * Describes a position by Latitude and Longitude
 */
class Position {

    /**
     * @var string
     */
    protected $latitude;

    /**
     * @var string
     */
    protected $longitude;

    /**
     * @param string $latitude
     * @param string $longitude
     */
    function __construct($latitude = 0, $longitude = 0)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }


    /**
     * @param string $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param string $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }


}