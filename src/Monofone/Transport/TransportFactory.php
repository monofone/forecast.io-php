<?php

namespace Monofone\Transport;

/**
 * User: s.rohweder@blage.net
 * Date: 4/9/13
 * Time: 10:36 PM
 * License: MIT
 */

class TransportFactory {

    /**
     * @var TransportInterface
     */
    protected $transport;

    /**
     * @return CurlTransport|FileGetContentsTransport|TransportInterface
     * @throws NoTransportAvailableException
     */
    public function getTransport() {
        $transportResolver = new TransportResolver();
        if($this->transport) {
            return $this->transport;
        }
        switch($transportResolver->resolveTransport()) {
            case 'fopen':
                $this->transport = new FileGetContentsTransport();
                break;
            case 'curl':
                $this->transport = new CurlTransport();
                break;
            default:
                throw new NoTransportAvailableException('no transport found');
        }

        return $this->transport;
    }
}