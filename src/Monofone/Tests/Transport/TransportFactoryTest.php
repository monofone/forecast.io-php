<?php

namespace Monofone\Tests\Transport;

/**
 * User: s.rohweder@blage.net
 * Date: 4/9/13
 * Time: 10:46 PM
 * License: MIT
 */

use Monofone\Transport\TransportFactory;

class TransportFactoryTest extends \PHPUnit_Framework_TestCase {

    public function testTransportResolving() {
        $transportFactory = new TransportFactory();
        if(ini_get('allow_url_fopen')) {
            $this->assertInstanceOf('Monofone\Transport\FileGetContentsTransport', $transportFactory->getTransport());
        } else {
            $this->assertInstanceOf('Monofone\Transport\CurlTransport', $transportFactory->getTransport());
        }
    }
}
