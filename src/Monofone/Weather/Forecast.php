<?php
namespace Monofone\Weather;
/**
 * User: s.rohweder@blage.net
 * Date: 4/10/13
 * Time: 2:00 AM
 * License: MIT
 */

class Forecast {

    /**
     * @var DataPoint
     */
    protected $current;

    /**
     * @var DataBlock
     */
    protected $daily;

    /**
     * @var DataBlock
     */
    protected $minutely;

    /**
     * @var DataBlock
     */
    protected $hourly;

    /**
     * @param \Monofone\Weather\DataPoint $current
     */
    public function setCurrent($current)
    {
        $this->current = $current;
    }

    /**
     * @return \Monofone\Weather\DataPoint
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * @param \Monofone\Weather\DataBlock $daily
     */
    public function setDaily($daily)
    {
        $this->daily = $daily;
    }

    /**
     * @return \Monofone\Weather\DataBlock
     */
    public function getDaily()
    {
        return $this->daily;
    }

    /**
     * @param \Monofone\Weather\DataBlock $hourly
     */
    public function setHourly($hourly)
    {
        $this->hourly = $hourly;
    }

    /**
     * @return \Monofone\Weather\DataBlock
     */
    public function getHourly()
    {
        return $this->hourly;
    }

    /**
     * @param \Monofone\Weather\DataBlock $minutely
     */
    public function setMinutely($minutely)
    {
        $this->minutely = $minutely;
    }

    /**
     * @return \Monofone\Weather\DataBlock
     */
    public function getMinutely()
    {
        return $this->minutely;
    }


}