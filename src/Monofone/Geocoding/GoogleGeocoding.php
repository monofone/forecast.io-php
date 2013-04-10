<?php

namespace Monofone\Geocoding;

use Monofone\Transport\TransportInterface;

/**
 * User: s.rohweder@blage.net
 * Date: 4/9/13
 * Time: 11:17 PM
 * License: MIT
 */
class GoogleGeocoding implements GeocoderInterface{

    const GEOCODE_API = 'http://maps.googleapis.com/maps/api/geocode/json?address={LOCATION}&sensor=false';
    /**
     * @var \Monofone\Transport\TransportInterface
     */
    protected $transport;

    /**
     * @param \Monofone\Transport\TransportInterface $transport
     */
    function __construct(TransportInterface $transport)
    {
        $this->transport = $transport;
    }

    /**
     * @param string $location
     */
    public function decodeLocation($location) {
        $url = $this->buildUrl($location);
        $response = json_decode($this->transport->fetch($url));
        if($response->status == 'OK') {
            $location = $response->results[0]->geometry->location;
            return new Position($location->lat, $location->lng);
        } else {
            return new Position();
        }

    }

    /**
     * @param string $location
     *
     * @return string
     */
    protected function buildUrl($location) {
        return str_replace('{LOCATION}', str_replace(' ', '+', urlencode($location)), self::GEOCODE_API);
    }
}