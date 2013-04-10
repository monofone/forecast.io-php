<?php
namespace Monofone\Tests\Geocoding;


use Monofone\Geocoding\GoogleGeocoding;

/**
 * User: s.rohweder@blage.net
 * Date: 4/9/13
 * Time: 11:26 PM
 * License: MIT
 */
class GoogleGeocodingTest extends \PHPUnit_Framework_TestCase {

    public function testGoogleGeocoding() {
        $mockTransport = $this->getMock('\Monofone\Transport\TransportInterface');
        $mockTransport->expects($this->once())
            ->method('fetch')
            ->with($this->equalTo('http://maps.googleapis.com/maps/api/geocode/json?address=kiel%2Cgermany&sensor=false'))
            ->will($this->returnValue($this->getApiResponse()));

        $geocoding = new GoogleGeocoding($mockTransport);
        $position = $geocoding->decodeLocation('kiel,germany');
        $this->assertEquals('54.3232927', $position->getLatitude());
        $this->assertEquals('10.1227652', $position->getLongitude());
    }

    /**
     * returns json for kiel,germany
     */
    protected function getApiResponse() {
$data = <<<EOF
{
"results": [
{
"address_components": [
{
"long_name": "Kiel",
"short_name": "Kiel",
"types": [
"locality",
"political"
]
},
    {
        "long_name": "Schleswig-Holstein",
"short_name": "SH",
"types": [
        "administrative_area_level_1",
        "political"
    ]
},
    {
        "long_name": "Germany",
"short_name": "DE",
"types": [
        "country",
        "political"
    ]
}
],
"formatted_address": "Kiel, Germany",
"geometry": {
    "bounds": {},
"location": {
        "lat": 54.3232927,
"lng": 10.1227652
},
"location_type": "APPROXIMATE",
"viewport": {}
},
"types": [
    "locality",
    "political"
]
}
],
"status": "OK"
}

EOF;
        return $data;
    }
}