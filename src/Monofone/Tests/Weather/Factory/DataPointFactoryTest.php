<?php
namespace Monofone\Tests\Weather\Factory;
/**
 * User: s.rohweder@blage.net
 * Date: 4/10/13
 * Time: 1:08 AM
 * License: MIT
 */

use Monofone\Weather\Factory\DataPointFactory;

class DataPointFactoryTest extends \PHPUnit_Framework_TestCase {

    public function testDataPointConversion() {
        $factory = new DataPointFactory();
        $dataClass = json_decode($this->getDataPointData());
        $dataPoint = $factory->convertToDataPoint($dataClass);

        $this->assertInstanceOf('Monofone\Weather\DataPoint', $dataPoint);
        $this->assertEquals($dataClass->sunriseTime, $dataPoint->getSunriseTime());
        $this->assertInstanceOf('Monofone\Weather\WeatherIcon', $dataPoint->getIcon());
    }

    protected function getDataPointData() {
    $data = <<<EOF
{
"time": 1365494400,
"summary": "Breezy until evening.",
"icon": "wind",
"sunriseTime": 1365515014,
"sunsetTime": 1365561653,
"precipIntensity": 0,
"temperatureMin": 10.94,
"temperatureMinTime": 1365501600,
"temperatureMax": 21.28,
"temperatureMaxTime": 1365548400,
"windSpeed": 6.58,
"windBearing": 332,
"cloudCover": 0.01,
"humidity": 0.5,
"pressure": 1009.06,
"visibility": 16.09
}
EOF;

        return $data;
    }
}
