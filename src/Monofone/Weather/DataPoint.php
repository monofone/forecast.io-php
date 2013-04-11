<?php

namespace Monofone\Weather;

/**
 * User: s.rohweder@blage.net
 * Date: 4/10/13
 * Time: 12:36 AM
 * License: MIT
 */

class DataPoint {
    /**
     * The UNIX time (that is, seconds since midnight GMT on 1 Jan 1970) at which this data point occurs.
     *
     * @var int
     */
    protected $time;

    /**
     *  A human-readable text summary of this data point.
     *
     * @var string
     */
    protected $summary;

    /**
     * A machine-readable text summary of this data point, suitable for selecting an icon for display
     *
     * @var WeatherIcon
     */
    protected $icon;

    /**
     *  The UNIX time (that is, seconds since midnight GMT on 1 Jan 1970) of sunrise and sunset on the given day.
     *
     * @var int
     */
    protected $sunriseTime;

    /**
     * @var int
     */
    protected $sunsetTime;

    /**
     * A numerical value representing the intensity (in inches of liquid water per hour)
     * of precipitation occurring at the given time conditional on probability (that is,
     * assuming any precipitation occurs at all). A very rough guide is that a value of 0
     * corresponds to no precipitation, 0.002 corresponds to very light sprinkling, 0.017
     * corresponds to light precipitation, 0.1 corresponds to moderate precipitation,
     * and 0.4 corresponds to very heavy precipitation.
     *
     * @var float
     */
    protected $precipIntensity;

    /**
     * A numerical value between 0 and 1 (inclusive) representing the probability of
     * precipitation occuring at the given time. (If precipIntensity is zero, then
     * this property would be redundant and will therefore not be defined.)
     *
     * @var float
     */
    protected $precipProbability;

    /**
     *  A string representing the type of precipitation occurring at the given time.
     * If defined, this property will have one of the following values: rain, snow,
     * sleet (which applies to each of freezing rain, ice pellets, and “wintery mix”),
     * or hail. (If precipIntensity is zero, then this property will not be defined.)
     *
     * @var string
     */
    protected $precipType;

    /**
     *  (only defined on daily data points): the amount of snowfall accumulation
     * expected to occur on the given day. (If no accumulation is expected,
     * this property will not be defined.)
     *
     * @var string
     */
    protected $precipAccumulation;

    /**
     * A numerical value representing the temperature at the given time in degrees Fahrenheit.
     *
     * @var float
     */
    protected $temperature;

    /**
     * numerical values representing the minimum and maximumum temperatures
     * (and the UNIX times at which they occur) on the given day in degrees Fahrenheit.
     * @var float
     */
    protected $temperatureMin;

    /**
     * @var float
     */
    protected $temperatureMinTime;

    /**
     * @var float
     */
    protected $temperatureMax;

    /**
     * @var float
     */
    protected $temperatureMaxTime;

    /**
     *  A numerical value representing the wind speed in miles per hour.
     *
     * @var float
     */
    protected $windSpeed;

    /**
     * A numerical value representing the direction that the wind is coming from in
     * degrees, with true north at 0° and progressing clockwise.
     * (If windSpeed is zero, then this value will not be defined.)
     *
     * @var int
     */
    protected $windBearing;

    /**
     * A numerical value between 0 and 1 (inclusive) representing
     * the percentage of sky occluded by clouds. A value of 0
     * corresponds to clear sky, 0.4 to scattered clouds, 0.75 to
     * broken cloud cover, and 1 to completely overcast skies.
     *
     * @var float
     */
    protected $cloudCover;

    /**
     *  A numerical value between 0 and 1 (inclusive) representing the relative humidity.
     *
     * @var float
     */
    protected $humidity;

    /**
     * A numerical value representing the air pressure in millibars.
     *
     * @var int
     */
    protected $pressure;

    /**
     *  A numerical value representing the average visibility in miles, capped at 10 miles.
     *
     * @var int
     */
    protected $visibility;

    /**
     * @param float $cloudCover
     */
    public function setCloudCover($cloudCover)
    {
        $this->cloudCover = $cloudCover;
    }

    /**
     * @return float
     */
    public function getCloudCover()
    {
        return $this->cloudCover;
    }

    /**
     * @param float $humidity
     */
    public function setHumidity($humidity)
    {
        $this->humidity = $humidity;
    }

    /**
     * @return float
     */
    public function getHumidity()
    {
        return $this->humidity;
    }

    /**
     * @param \Monofone\Weather\WeatherIcon $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon->getIcon();
    }

    /**
     * @param string $precipAccumulation
     */
    public function setPrecipAccumulation($precipAccumulation)
    {
        $this->precipAccumulation = $precipAccumulation;
    }

    /**
     * @return string
     */
    public function getPrecipAccumulation()
    {
        return $this->precipAccumulation;
    }

    /**
     * @param float $precipIntensity
     */
    public function setPrecipIntensity($precipIntensity)
    {
        $this->precipIntensity = $precipIntensity;
    }

    /**
     * @return float
     */
    public function getPrecipIntensity()
    {
        return $this->precipIntensity;
    }

    /**
     * @param float $precipProbability
     */
    public function setPrecipProbability($precipProbability)
    {
        $this->precipProbability = $precipProbability;
    }

    /**
     * @return float
     */
    public function getPrecipProbability()
    {
        return $this->precipProbability;
    }

    /**
     * @param string $precipType
     */
    public function setPrecipType($precipType)
    {
        $this->precipType = $precipType;
    }

    /**
     * @return string
     */
    public function getPrecipType()
    {
        return $this->precipType;
    }

    /**
     * @param int $pressure
     */
    public function setPressure($pressure)
    {
        $this->pressure = $pressure;
    }

    /**
     * @return int
     */
    public function getPressure()
    {
        return $this->pressure;
    }

    /**
     * @param string $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param int $sunriseTime
     */
    public function setSunriseTime($sunriseTime)
    {
        $this->sunriseTime = $sunriseTime;
    }

    /**
     * @return int
     */
    public function getSunriseTime()
    {
        return $this->sunriseTime;
    }

    /**
     * @param int $sunsetTime
     */
    public function setSunsetTime($sunsetTime)
    {
        $this->sunsetTime = $sunsetTime;
    }

    /**
     * @return int
     */
    public function getSunsetTime()
    {
        return $this->sunsetTime;
    }

    /**
     * @param float $temperature
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;
    }

    /**
     * @return float
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * @param float $temperatureMax
     */
    public function setTemperatureMax($temperatureMax)
    {
        $this->temperatureMax = $temperatureMax;
    }

    /**
     * @return float
     */
    public function getTemperatureMax()
    {
        return $this->temperatureMax;
    }

    /**
     * @param float $temperatureMaxTime
     */
    public function setTemperatureMaxTime($temperatureMaxTime)
    {
        $this->temperatureMaxTime = $temperatureMaxTime;
    }

    /**
     * @return float
     */
    public function getTemperatureMaxTime()
    {
        return $this->temperatureMaxTime;
    }

    /**
     * @param float $temperatureMin
     */
    public function setTemperatureMin($temperatureMin)
    {
        $this->temperatureMin = $temperatureMin;
    }

    /**
     * @return float
     */
    public function getTemperatureMin()
    {
        return $this->temperatureMin;
    }

    /**
     * @param float $temperatureMinTime
     */
    public function setTemperatureMinTime($temperatureMinTime)
    {
        $this->temperatureMinTime = $temperatureMinTime;
    }

    /**
     * @return float
     */
    public function getTemperatureMinTime()
    {
        return $this->temperatureMinTime;
    }

    /**
     * @param int $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param int $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }

    /**
     * @return int
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param int $windBearing
     */
    public function setWindBearing($windBearing)
    {
        $this->windBearing = $windBearing;
    }

    /**
     * @return int
     */
    public function getWindBearing()
    {
        return $this->windBearing;
    }

    /**
     * @param float $windSpeed
     */
    public function setWindSpeed($windSpeed)
    {
        $this->windSpeed = $windSpeed;
    }

    /**
     * @return float
     */
    public function getWindSpeed()
    {
        return $this->windSpeed;
    }


}