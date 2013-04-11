<?php
namespace Monofone\Tests\Weather;

use Monofone\Geocoding\Position;
use Monofone\Weather\ForecastIOConnector;
use Monofone\Weather\RequestConfiguration;

/**
 * User: s.rohweder@blage.net
 * Date: 4/11/13
 * Time: 8:51 PM
 * License: MIT
 */
class ForecastIOConnectorTest extends \PHPUnit_Framework_TestCase {

    protected $geocoderMock;

    protected $weatherTransportMock;

    public function setUp() {
        parent::setUp();
        $this->geocoderMock = $this->getMock('\Monofone\Geocoding\GeocoderInterface');
        $this->geocoderMock->expects($this->once())
            ->method('decodeLocation')
            ->with($this->equalTo('kiel,germany'))
            ->will($this->returnValue(new Position('54.3232927','10.1227652')));
        $this->weatherTransportMock = $this->getMock('Monofone\Transport\TransportInterface');
    }
    public function testValidForecastRequest() {

        $this->weatherTransportMock->expects($this->once())
            ->method('fetch')
            ->with($this->equalTo('https://api.forecast.io/forecast/apikey/54.3232927,10.1227652?units=si&exclude=alerts%2Cdaily%2Cflags%2Chourly%2Cminutely'))
            ->will($this->returnValue($this->getDefaultTestData()));

        $configuration = new RequestConfiguration('apikey');
        $forecastConnector = new ForecastIOConnector($configuration, $this->weatherTransportMock, $this->geocoderMock);
        $forecast = $forecastConnector->getByLocation('kiel,germany');
        $this->assertInstanceOf('Monofone\Weather\Forecast', $forecast);
        $this->assertEquals('cloudy', $forecast->getCurrent()->getIcon());
    }

    protected function getDefaultTestData() {
        $data = <<<EOF
{"latitude":54.3232927,"longitude":10.1227652,"timezone":"Europe/Berlin","offset":2,"currently":{"time":1365707266,"summary":"Overcast","icon":"cloudy","precipIntensity":0.002,"precipProbability":0.06,"precipType":"rain","temperature":40.36,"windSpeed":8.01,"windBearing":104,"cloudCover":0.99,"humidity":0.98,"pressure":994.97}}
EOF;
        return $data;

    }
}
