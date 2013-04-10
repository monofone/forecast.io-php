<?php
namespace Monofone\Weather\Factory;

use Monofone\Weather\Forecast;

/**
 * User: s.rohweder@blage.net
 * Date: 4/10/13
 * Time: 2:02 AM
 * License: MIT
 */
class ForecastFactory {

    /**
     * @var DataBlockFactory
     */
    protected $dataBlockFactory;

    /**
     * @var DataPointFactory
     */
    protected $dataPointFactory;

    /**
     * @param DataBlockFactory $dataBlockFactory
     * @param DataPointFactory $dataPointFactory
     */
    function __construct(DataBlockFactory $dataBlockFactory, DataPointFactory $dataPointFactory)
    {
        $this->dataBlockFactory = $dataBlockFactory;
        $this->dataPointFactory = $dataPointFactory;
    }


    /**
     * @param $data
     * @return Forecast
     */
    public function convertToForecast($data) {
        $forecast = new Forecast();
        $r = new \ReflectionObject($data);
        if($r->hasProperty('currently')) {
            $forecast->setCurrent($this->dataPointFactory->convertToDataPoint($data->currently));
        }

        $dataBlocks = array('daily', 'minutely', 'hourly');
        foreach($dataBlocks as $dataBlock) {
            if($r->hasProperty($dataBlock)) {
                $method = 'set' . ucfirst($dataBlock);
                $forecast->{$method}($this->dataBlockFactory->convertToDataBlock($data->$dataBlock));
            }
        }

        return $forecast;
    }

}