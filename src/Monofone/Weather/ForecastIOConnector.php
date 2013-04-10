<?php

namespace Monofone\Weather;

use Monofone\Geocoding\GeocoderInterface;
use Monofone\Geocoding\Position;
use Monofone\Transport\TransportInterface;
use Monofone\Transport\TransportResolver;
use Monofone\Weather\Factory\DataBlockFactory;
use Monofone\Weather\Factory\DataPointFactory;
use Monofone\Weather\Factory\ForecastFactory;

/**
 * User: s.rohweder@blage.net
 * Date: 4/10/13
 * Time: 12:01 AM
 * License: MIT
 */
class ForecastIOConnector {

    const API_URL_NOW = 'https://api.forecast.io/forecast/{APIKEY}/{LAT},{LNG}';

    const API_URL_TIME = 'https://api.forecast.io/forecast/{APIKEY}/{LAT},{LNG},{TIME}';

    /**
     * @var \Monofone\Transport\TransportInterface
     */
    protected $transport;

    /**
     * @var \Monofone\Geocoding\GeocoderInterface
     */
    protected $geocoder;

    /**
     * @var RequestConfiguration
     */
    protected $configuration;

    /**
     * @var ForecastFactory
     */
    protected $forecastFactory;

    /**
     * @param TransportInterface $transport
     */
    function __construct(RequestConfiguration $configuration, TransportInterface $transport = NULL, GeocoderInterface $geocoder = NULL)
    {

        if(!$transport) {
            $transportResolver = new TransportResolver();
            $this->transport = $transportResolver->resolveTransport();
        } else {
            $this->transport = $transport;
        }
        $this->configuration = $configuration;
        $this->geocoder = $geocoder;
        $dataPointFactory = new DataPointFactory();
        $dataBlockFactory = new DataBlockFactory($dataPointFactory);
        $this->forecastFactory = new ForecastFactory($dataBlockFactory, $dataPointFactory);
    }

    /**
     * @param $location
     * @return Forecast
     * @throws NoGeocoderException
     */
    public function getByLocation($location) {
        if(!$this->geocoder) {
            throw new NoGeocoderException('No Geocoder defined, set one via constructor');
        }
        $position = $this->geocoder->decodeLocation($location);

        return $this->getByPosition($position);
    }

    /**
     * @param Position $position
     * @return Forecast
     */
    public function getByPosition(Position $position) {
        $data = $this->doRequest($position);

        return $this->forecastFactory->convertToForecast($data);
    }

    /**
     * @param Position $position
     * @return mixed
     */
    protected function doRequest(Position $position) {
        $url = $this->buildUrl($position);
        $data = $this->transport->fetch($url);

        return json_decode($data);
    }

    /**
     * @param Position $position
     * @return string
     */
    protected function buildUrl(Position $position) {
        if($this->configuration->getTime()) {
            $url = str_replace('{TIME}', $this->configuration->getTime(), self::API_URL_TIME);
        }else{
            $url = self::API_URL_NOW;
        }
        $url = str_replace('{APIKEY}', $this->configuration->getApiKey(), $url);
        $url = str_replace('{LAT}', $position->getLatitude(), $url);
        $url = str_replace('{LNG}', $position->getLongitude(), $url);
        $url .= '?' . http_build_query(array('units' => $this->configuration->getUnits(), 'exclude' => $this->configuration->getExclude()));

        return $url;
    }

    /**
     * @param \Monofone\Geocoding\GeocoderInterface $geocoder
     */
    public function setGeocoder($geocoder)
    {
        $this->geocoder = $geocoder;
    }


}