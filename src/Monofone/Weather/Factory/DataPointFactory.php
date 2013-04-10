<?php
namespace Monofone\Weather\Factory;
/**
 * User: s.rohweder@blage.net
 * Date: 4/10/13
 * Time: 12:59 AM
 * License: MIT
 */

use Monofone\Weather\DataPoint;
use Monofone\Weather\WeatherIcon;

class DataPointFactory {

    public function convertToDataPoint($data) {
        $dataPoint = new DataPoint();
        $rDataPoint = new \ReflectionClass('Monofone\Weather\DataPoint');
        $r = new \ReflectionObject($data);
        foreach($r->getProperties() as $property) {
            $method = 'set' . ucfirst($property->getName());
            if($rDataPoint->hasMethod($method)) {
                switch($property->getName()) {
                    case 'icon':
                        $dataPoint->$method(new WeatherIcon($data->{$property->getName()}));
                        break;
                    default:
                        $dataPoint->$method($data->{$property->getName()});
                }
            }
        }
        return $dataPoint;
    }
}