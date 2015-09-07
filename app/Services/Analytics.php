<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;

/**
 * Application Analytics Wrapper.
 * 
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Analytics
{
    private $client;

    private $baseUrl;

    private $apiKey;

    private $apiSecret;

    /**
     * Create new analytics instance.
     *
     * @param \GuzzleHttp\Client $client
     * @param array  $options
     */
    public function __construct(Client $client, array $options)
    {
        $this->client = $client;

        foreach ($options as $key => $value) {
           if ( property_exists($this, $key)) {
                $this->{$key} = $value;
           }
        }
    }

    /**
     * Get all analytics data.
     *
     * @param  array  $query
     * @return \GuzzleHttp\Psr7\Response
     */
    public function all(array $query = [])
    {
        return $this->get(null, $query);
    }

    /**
     * Get analytics data by hourly.
     *
     * @param  array  $query
     * @return \GuzzleHttp\Psr7\Response
     */
    public function hourly(array $query = [])
    {
        return $this->get('hourly', $query);
    }

    /**
     * Get analytics data by daily.
     *
     * @param  array  $query
     * @return \GuzzleHttp\Psr7\Response
     */
    public function daily(array $query = [])
    {
        return $this->get('daily', $query);
    }

    /**
     * Get analytics data by monthly.
     *
     * @param  array  $query
     * @return \GuzzleHttp\Psr7\Response
     */
    public function monthly(array $query = [])
    {
        return $this->get('monthly', $query);
    }

    /**
     * Get analytics data.
     *
     * @param  null|string $type
     * @param  array  $query
     * @return \GuzzleHttp\Psr7\Response
     */
    public function get($type = null, array $query = [])
    {
        return $this->send($this->buildUrl($type, $query));
    }

    /**
     * Get analytics data for total hits.
     *
     * @param  array  $query
     * @return \GuzzleHttp\Psr7\Response
     */
    public function totalHits(array $query = [])
    {
        return $this->send($this->buildUrl('total-hits', $query));
    }

    /**
     * Build url for analytics request.
     *
     * @param string $path
     * @param  array  $query
     * @return string
     */
    private function buildUrl($path, array $query = [])
    {
        $url = $this->baseUrl;

        if ( is_null($path)) {
            $url .= 'all/today';
        } else {
            $url .= $path;
        }

        if ( ! empty($query)) {
            $url .= '?' . http_build_query($query);
        }

        return $url;
    }

    /**
     * Send request to analytics api.
     *
     * @param  string  $url
     * @return \GuzzleHttp\Psr7\Response
     */
    private function send($url)
    {
        try {
            $response = $this->client->get($url, [
                'headers' => [
                    'X-API-KEY' => $this->apiKey,
                    'X-API-SECRET' => $this->apiSecret
                ]
            ]);
        } catch (Exception $e) {dd($e);
            return $e;
        }
        
        return $response;
    }
}