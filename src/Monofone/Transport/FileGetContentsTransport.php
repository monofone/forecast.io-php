<?php

namespace Monofone\Transport;

/**
 * User: s.rohweder@blage.net
 * Date: 4/9/13
 * Time: 10:27 PM
 * License: MIT
 */

class FileGetContentsTransport implements TransportInterface{

    /**
     * @param string $url
     * @return string
     */
    public function fetch($url)
    {
        return file_get_contents($url);
    }
}