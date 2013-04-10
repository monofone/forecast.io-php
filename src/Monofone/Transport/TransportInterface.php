<?php

namespace Monofone\Transport;

/**
 * User: s.rohweder@blage.net
 * Date: 4/9/13
 * Time: 10:18 PM
 * License: MIT
 */

/**
 * Defines the transport way for requests
 */
interface TransportInterface {

    /**
     * @param string $url
     * @return string
     */
    public function fetch($url);

}