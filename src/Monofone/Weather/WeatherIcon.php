<?php

namespace Monofone\Weather;

/**
 * User: s.rohweder@blage.net
 * Date: 4/10/13
 * Time: 12:09 AM
 * License: MIT
 */

class WeatherIcon {

    const CLEAR_DAY = 'clear-day';
    const CLEAR_NIGHT = 'clear-night';
    const RAIN = 'rain';
    const SNOW = 'snow';
    const SLEET = 'sleet';
    const WIND = 'wind';
    const FOG = 'fog';
    const CLOUDY = 'cloudy';
    const PARTLY_CLOUDY_DAY = 'partly-cloudy-day';
    const PARTLY_CLOUDY_NIGHT = 'partly-cloudy-night';

    protected $icon;

    function __construct($icon)
    {
        $r = new \ReflectionClass(__CLASS__);
        $constants = $r->getConstants();
        if(!in_array($icon, array_values($constants))) {
            throw new InvalidWeatherIconException('The weather Icon "' . $icon . '" is not a valid weather icon, valid icons are: ' . implode('|', array_values($constants)));
        }
        $this->icon = $icon;
    }

    public function getIcon()
    {
        return $this->icon;
    }


}