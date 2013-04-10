<?php

namespace Monofone\Transport;

/**
 * User: s.rohweder@blage.net
 * Date: 4/9/13
 * Time: 10:43 PM
 * License: MIT
 */

class CurlTransport implements TransportInterface {

    /**
     * @param string $url
     * @return string
     */
    public function fetch($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
    }
}