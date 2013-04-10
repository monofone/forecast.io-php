<?php

namespace Monofone\Geocoding;

use Monofone\Transport\TransportInterface;

/**
 * User: s.rohweder@blage.net
 * Date: 4/9/13
 * Time: 11:09 PM
 * License: MIT
 */
interface GeocoderInterface {

    /**
     * @param string $location
     */
    public function decodeLocation($location);
}