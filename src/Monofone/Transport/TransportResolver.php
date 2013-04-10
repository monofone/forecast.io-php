<?php

namespace Monofone\Transport;

/**
 * User: s.rohweder@blage.net
 * Date: 4/9/13
 * Time: 10:29 PM
 * License: MIT
 */

class TransportResolver {

    /**
     * returns which transport to use
     *
     * @return bool|string
     */
    public function resolveTransport() {
        $transport = false;
        if(ini_get('allow_url_fopen')) {
            $transport = 'fopen';
        } else if(function_exists('curl_init')){
            $transport = 'curl';
        } else {
            $transport = false;
        }

        return $transport;
    }
}