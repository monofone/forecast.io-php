<?php

namespace Monofone\Weather;

/**
 * User: s.rohweder@blage.net
 * Date: 4/10/13
 * Time: 12:14 AM
 * License: MIT
 */

class RequestConfiguration {

    const UNIT_DECIMAL = 'si';

    const UNIT_US = 'us';

    const UNIT_UK = 'uk';

    /**
     * exclude current values
     */
    const EX_CURRENTLY = 'currently';

    /**
     * exclude minute values
     */
    const EX_MINUTELY = 'minutely';

    /**
     * exclude hourly values
     */
    const EX_HOURLY = 'hourly';

    /**
     * exclude daily values
     */
    const EX_DAILY = 'daily';

    /**
     * exclude governmental alerts
     */
    const EX_ALERTS = 'alerts';

    /**
     * exclude flags
     */
    const EX_FLAGS = 'flags';

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $units;

    /**
     * @var array
     */
    protected $excludes;

    /**
     * @var int
     */
    protected $time;

    /**
     * @param string $apiKey
     */
    function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->init();
    }

    /**
     * set defaults for configuration
     */
    protected function init() {
        $this->units = self::UNIT_DECIMAL;

        // exclude all except currently
        $this->excludes = array(
            self::EX_ALERTS,
            self::EX_DAILY,
            self::EX_FLAGS,
            self::EX_HOURLY,
            self::EX_MINUTELY
        );
    }

    /**
     * @param string $exclude
     */
    public function addExclude($exclude) {
        $r = new \ReflectionClass(__CLASS__);
        $constants = $r->getConstants();
        if(!in_array($exclude, array_values($constants))) {
            throw new InvalidConfigurationOption(spintf('The "%s" is not a valid exclusion block', $exclude ));
        }

        if(!in_array($exclude, $this->excludes)) {
            $this->excludes[] = $exclude;
        }
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $units
     */
    public function setUnits($units)
    {
        $this->units = $units;
    }

    /**
     * @return array
     */
    public function getExclude()
    {
        return implode(',', $this->excludes);
    }

    /**
     * @return string
     */
    public function getUnits()
    {
        return $this->units;
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
}