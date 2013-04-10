<?php
namespace Monofone\Weather\Factory;
/**
 * User: s.rohweder@blage.net
 * Date: 4/10/13
 * Time: 1:31 AM
 * License: MIT
 */

use Monofone\Weather\DataBlock;
use Monofone\Weather\WeatherIcon;

class DataBlockFactory
{

    /**
     * @var DataPointFactory
     */
    protected $dataPointFactory;

    /**
     * @param null|string $dataPointFactory
     */
    function __construct(DataPointFactory $dataPointFactory)
    {
        $this->dataPointFactory = $dataPointFactory;
    }

    /**
     * @param $data
     */
    public function convertToDataBlock($data)
    {
        $dataBlock = new DataBlock();
        $dataBlock->setIcon(new WeatherIcon($data->icon));
        $dataBlock->setSummary($data->summary);

        foreach($data->data as $dataPointData) {
            $dataBlock->addData($this->dataPointFactory->convertToDataPoint($dataPointData));
        }

        return $dataBlock;
    }

}