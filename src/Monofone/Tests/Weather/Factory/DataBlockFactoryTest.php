<?php
namespace Monofone\Tests\Weather\Factory;

use Monofone\Weather\Factory\DataBlockFactory;
use Monofone\Weather\Factory\DataPointFactory;

/**
 * User: s.rohweder@blage.net
 * Date: 4/10/13
 * Time: 1:34 AM
 * License: MIT
 */
class DataBlockFactoryTest extends \PHPUnit_Framework_TestCase {


    public function testDataBlockConversion() {
        $dataPointFactory = new DataPointFactory();
        $dataBlockFactory = new DataBlockFactory($dataPointFactory);

        $data = json_decode($this->getDataBlockData());
        $dataBlock = $dataBlockFactory->convertToDataBlock($data->daily);

        $this->assertInstanceOf('Monofone\Weather\DataBlock', $dataBlock);
        $this->assertEquals($data->daily->summary, $dataBlock->getSummary());
        $this->assertContainsOnlyInstancesOf('Monofone\Weather\DataPoint', $dataBlock->getData());
    }

    /**
     * @return string
     */
    protected function getDataBlockData()
    {
        $data = <<<EOF
{
"daily": {
"summary": "No precipitation for the week; temperatures rising to 25° on Saturday.",
"icon": "clear-day",
"data": [
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
},
{
"time": 1365580800,
"summary": "Breezy overnight.",
"icon": "wind",
"sunriseTime": 1365601326,
"sunsetTime": 1365648107,
"precipIntensity": 0,
"temperatureMin": 11.21,
"temperatureMinTime": 1365598800,
"temperatureMax": 23.3,
"temperatureMaxTime": 1365631200,
"windSpeed": 4.54,
"windBearing": 317,
"cloudCover": 0.17,
"humidity": 0.67,
"pressure": 1010.58,
"visibility": 16.09
},
{
"time": 1365667200,
"summary": "Breezy in the morning.",
"icon": "wind",
"sunriseTime": 1365687640,
"sunsetTime": 1365734562,
"precipIntensity": 0,
"temperatureMin": 10.04,
"temperatureMinTime": 1365685200,
"temperatureMax": 22.28,
"temperatureMaxTime": 1365721200,
"windSpeed": 4.77,
"windBearing": 308,
"cloudCover": 0.5,
"humidity": 0.72,
"pressure": 1004.71
},
{
"time": 1365753600,
"summary": "Partly cloudy overnight.",
"icon": "partly-cloudy-night",
"sunriseTime": 1365773954,
"sunsetTime": 1365821017,
"precipIntensity": 0,
"temperatureMin": 9.17,
"temperatureMinTime": 1365768000,
"temperatureMax": 24.55,
"temperatureMaxTime": 1365800400,
"windSpeed": 2.87,
"windBearing": 295,
"cloudCover": 0.03,
"humidity": 0.67,
"pressure": 999.44
},
{
"time": 1365840000,
"summary": "Partly cloudy until evening.",
"icon": "partly-cloudy-day",
"sunriseTime": 1365860268,
"sunsetTime": 1365907472,
"precipIntensity": 0,
"temperatureMin": 8.67,
"temperatureMinTime": 1365854400,
"temperatureMax": 25.01,
"temperatureMaxTime": 1365886800,
"windSpeed": 3.38,
"windBearing": 301,
"cloudCover": 0.16,
"humidity": 0.63,
"pressure": 996.25
},
{
"time": 1365926400,
"summary": "Clear throughout the day.",
"icon": "clear-day",
"sunriseTime": 1365946583,
"sunsetTime": 1365993928,
"precipIntensity": 0,
"temperatureMin": 8.11,
"temperatureMinTime": 1365940800,
"temperatureMax": 21.87,
"temperatureMaxTime": 1365973200,
"windSpeed": 5.21,
"windBearing": 309,
"cloudCover": 0,
"humidity": 0.55,
"pressure": 996.17
},
{
"time": 1366012800,
"summary": "Clear throughout the day.",
"icon": "clear-day",
"sunriseTime": 1366032899,
"sunsetTime": 1366080383,
"precipIntensity": 0,
"temperatureMin": 6.51,
"temperatureMinTime": 1366027200,
"temperatureMax": 21.36,
"temperatureMaxTime": 1366063200,
"windSpeed": 5.96,
"windBearing": 349,
"cloudCover": 0,
"humidity": 0.45,
"pressure": 998.57
},
{
"time": 1366099200,
"summary": "Clear throughout the day.",
"icon": "clear-day",
"sunriseTime": 1366119216,
"sunsetTime": 1366166838,
"precipIntensity": 0,
"temperatureMin": 8.05,
"temperatureMinTime": 1366113600,
"temperatureMax": 23.09,
"temperatureMaxTime": 1366146000,
"windSpeed": 5.2,
"windBearing": 7,
"cloudCover": 0,
"humidity": 0.36,
"pressure": 1002.1
}
]
}
}
EOF;

        return $data;
    }
}
