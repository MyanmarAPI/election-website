<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class AnalyticController extends Controller
{

    private $base_url;

    private $api_key;

    private $api_secret;

    protected $user;

    /**
     * Construct Method
     *
     * @return void
     * @author 
     **/
    public function __construct()
    {
        $this->base_url = config('analytics.base_url');
        $this->api_key = config('analytics.X-API-KEY');
        $this->api_secret = config('analytics.X-API-SECRET');

        $this->user = Auth::user();
    }   
    
    public function getDefault()
    {

        $query = [];

        if (!$this->user->isAdmin()) {
            $query['user_id'] = $this->user->id;
        }

        return $this->getAnalyticData('all/today/', $query);

        
    }

    private function getAnalyticData($url, $query = [])
    {
        $client = new Client(['base_uri' => $this->base_url]);

        try {

            $response = $client->get($url, [
                'headers' => [
                    'X-API-KEY' => $this->api_key,
                    'X-API-SECRET' => $this->api_secret
                ],
                'query' => $query
            ]);

        } catch(\Exception $e) {

            return response_error("Internal Server Error.");

        }

        switch ($response->getStatusCode()) {
            case 500:
                return response_error("Internal Server Error.");
                break;

            case 401:
                response_unauthorized();
                break;

            case 404:
                return response_missing();
                break;
            
            case 200:
                return response_ok(json_decode($response->getBody()->getContents()));
                break;
        }

        return response_error("Internal Server Error.");
    }

}
