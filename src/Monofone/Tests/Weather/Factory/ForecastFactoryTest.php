<?php
/**
 * User: s.rohweder@blage.net
 * Date: 4/10/13
 * Time: 2:09 AM
 * License: MIT
 */

namespace Monofone\Tests\Weather\Factory;


use Monofone\Weather\Factory\DataBlockFactory;
use Monofone\Weather\Factory\DataPointFactory;
use Monofone\Weather\Factory\ForecastFactory;

class ForecastFactoryTest extends \PHPUnit_Framework_TestCase {

    public function testForecastConversion() {
        $data = json_decode($this->getForecastData());
        $dataPointFactory = new DataPointFactory();
        $dataBlockFactory = new DataBlockFactory($dataPointFactory);
        $forecastFactory = new ForecastFactory($dataBlockFactory, $dataPointFactory);

        $forecast = $forecastFactory->convertToForecast($data);

        $this->assertInstanceOf('Monofone\Weather\Forecast', $forecast);
    }


    protected function getForecastData(){
        $data = <<<EOF
{"latitude":37.8267,"longitude":-122.423,"timezone":"Etc/GMT+8","offset":-8,"currently":{"time":1365552592,"summary":"Clear","icon":"clear-day","precipIntensity":0,"temperature":20.04,"windSpeed":8.45,"windBearing":313,"cloudCover":0.12,"humidity":0.38,"pressure":1008.06,"visibility":16.09},"daily":{"summary":"No precipitation for the week; temperatures bottoming out at 21° on Thursday.","icon":"clear-day","data":[{"time":1365494400,"summary":"Breezy until evening.","icon":"wind","sunriseTime":1365515014,"sunsetTime":1365561653,"precipIntensity":0,"temperatureMin":10.94,"temperatureMinTime":1365501600,"temperatureMax":21.27,"temperatureMaxTime":1365544800,"windSpeed":6.47,"windBearing":332,"cloudCover":0.03,"humidity":0.5,"pressure":1008.99,"visibility":16.09},{"time":1365580800,"summary":"Breezy and mostly cloudy starting in the afternoon.","icon":"wind","sunriseTime":1365601326,"sunsetTime":1365648107,"precipIntensity":0,"temperatureMin":10.79,"temperatureMinTime":1365602400,"temperatureMax":21.98,"temperatureMaxTime":1365627600,"windSpeed":4.86,"windBearing":315,"cloudCover":0.19,"humidity":0.68,"pressure":1010.51,"visibility":16.09},{"time":1365667200,"summary":"Breezy in the morning.","icon":"wind","sunriseTime":1365687640,"sunsetTime":1365734562,"precipIntensity":0,"temperatureMin":9.97,"temperatureMinTime":1365685200,"temperatureMax":21.12,"temperatureMaxTime":1365714000,"windSpeed":5.26,"windBearing":309,"cloudCover":0.5,"humidity":0.73,"pressure":1005.87},{"time":1365753600,"summary":"Clear throughout the day.","icon":"clear-day","sunriseTime":1365773954,"sunsetTime":1365821017,"precipIntensity":0,"temperatureMin":9.54,"temperatureMinTime":1365768000,"temperatureMax":22.53,"temperatureMaxTime":1365804000,"windSpeed":3.33,"windBearing":298,"cloudCover":0.03,"humidity":0.69,"pressure":1001.17},{"time":1365840000,"summary":"Partly cloudy until evening.","icon":"partly-cloudy-day","sunriseTime":1365860268,"sunsetTime":1365907472,"precipIntensity":0,"temperatureMin":8.49,"temperatureMinTime":1365850800,"temperatureMax":26.1,"temperatureMaxTime":1365886800,"windSpeed":2.91,"windBearing":308,"cloudCover":0.22,"humidity":0.64,"pressure":996.86},{"time":1365926400,"summary":"Clear throughout the day.","icon":"clear-day","sunriseTime":1365946583,"sunsetTime":1365993928,"precipIntensity":0,"temperatureMin":9.63,"temperatureMinTime":1365940800,"temperatureMax":23.44,"temperatureMaxTime":1365973200,"windSpeed":4.55,"windBearing":308,"cloudCover":0.02,"humidity":0.56,"pressure":996},{"time":1366012800,"summary":"Clear throughout the day.","icon":"clear-day","sunriseTime":1366032899,"sunsetTime":1366080383,"precipIntensity":0,"temperatureMin":7,"temperatureMinTime":1366027200,"temperatureMax":22.8,"temperatureMaxTime":1366059600,"windSpeed":5.04,"windBearing":332,"cloudCover":0,"humidity":0.51,"pressure":997.73},{"time":1366099200,"summary":"Clear throughout the day.","icon":"clear-day","sunriseTime":1366119216,"sunsetTime":1366166838,"precipIntensity":0,"temperatureMin":7.57,"temperatureMinTime":1366113600,"temperatureMax":24.17,"temperatureMaxTime":1366146000,"windSpeed":3.49,"windBearing":353,"cloudCover":0,"humidity":0.41,"pressure":1001.56}]}}
EOF;
        return $data;

    }
}
