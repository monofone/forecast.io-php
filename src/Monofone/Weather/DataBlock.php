<?php

namespace Monofone\Weather;

/**
 * User: s.rohweder@blage.net
 * Date: 4/10/13
 * Time: 12:49 AM
 * License: MIT
 */

class DataBlock {

    /**
     *  A human-readable text summary of this data block.
     *
     * @var string
     */
    protected $summary;

    /**
     * A machine-readable text summary of this data block
     *
     * @var WeatherIcon
     */
    protected $icon;

    /**
     *  An array of data point objects, ordered by time, which
     * together describe the weather conditions at the requested
     * location over time.
     *
     * @var array
     */
    protected $data;

    /**
     *
     */
    function __construct()
    {
        $this->data = array();
    }


    /**
     * @param DataPoint $data
     */
    public function addData(DataPoint $data) {
        $this->data[] = $data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \Monofone\Weather\WeatherIcon $icon
     */
    public function setIcon(WeatherIcon $icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return \Monofone\Weather\WeatherIcon
     */
    public function getIcon()
    {
        return $this->icon;
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


}